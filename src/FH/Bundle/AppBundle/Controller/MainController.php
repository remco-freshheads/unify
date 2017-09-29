<?php

namespace FH\Bundle\AppBundle\Controller;

use FH\Bundle\AppBundle\Entity\Genre;
use FH\Bundle\AppBundle\Entity\GenreRepository;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\SpotifyWebAPIException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MainController
{
    private $api;
    private $session;
    private $urlGenerator;
    private $genreRepository;

    public function __construct(SpotifyWebAPI $spotifyApi, Session $session, UrlGeneratorInterface $urlGenerator, GenreRepository $genreRepository)
    {
        $this->api = $spotifyApi;
        $this->session = $session;
        $this->urlGenerator = $urlGenerator;
        $this->genreRepository = $genreRepository;
    }

    public function homeAction(Request $request): RedirectResponse
    {
        if ($request->query->has('code')) {
            $this->session->requestAccessToken(
                $request->query->get('code')
            );

            return new RedirectResponse(
                $this->urlGenerator->generate(
                    'app',
                    [
                        'token' => $this->session->getAccessToken()
                    ]
                )
            );
        }

        $options = [
            'scope' => [
                'playlist-read-private',
                'playlist-read-collaborative',
                'playlist-modify-private',
                'playlist-modify-public'
            ]
        ];

        return new RedirectResponse(
            $this->session->getAuthorizeUrl($options)
        );
    }

    public function appAction(Request $request, string $token)
    {
        $this->api->setAccessToken($token);

        try {
            $recommendations = $this->api->getRecommendations([
                'seed_genres' => ['country']
            ]);
        } catch (SpotifyWebAPIException $exception) {
            dump($exception);
            die(__FILE__ . ' at line: ' . __LINE__); //@todo remove
        }

        echo '<pre>';
        print_r($recommendations);
        die(__FILE__ . ' at line: ' . __LINE__);
        echo "<pre>";
        print_r($this->api->me());
        die(__FILE__ . ' at line: ' . __LINE__); //@todo remove
    }
    
    public function updatePlaylistAction(Request $request, string $token)
    {
        $this->api->setAccessToken($token);

        $userId = 1123160395;
        $playlist = '19IJ7aaEqVzTBaYtZb5Ij3';

        $currentTracks = $this->api->getUserPlaylistTracks($userId, $playlist)->items;

        $tracksToDelete = array_map(
            function ($track) {
                return [ 'id' => $track->track->id ];
            },
            $currentTracks
        );

        $this->api->deleteUserPlaylistTracks($userId, $playlist, $tracksToDelete);


        $tracksToAdd = array_map(
            function($track) {
                return $track->uri;
            },
            $this->api->search('rock', 'track')->tracks->items
        );

        $this->api->addUserPlaylistTracks($userId, $playlist, $tracksToAdd);

        die('hier');
    }
}
