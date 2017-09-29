<?php

namespace FH\Bundle\AppBundle\Controller;

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

    public function __construct(SpotifyWebAPI $spotifyApi, Session $session, UrlGeneratorInterface $urlGenerator)
    {
        $this->api = $spotifyApi;
        $this->session = $session;
        $this->urlGenerator = $urlGenerator;
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
//            'scope' => [
//                ''
//            ]
        ];

        return new RedirectResponse(
            $this->session->getAuthorizeUrl($options)
        );
    }

    public function appAction(Request $request, string $token)
    {
        $this->api->setAccessToken($token);

        try {
            $test = $this->api->getRecommendations([
                'seed_genres' => ['country']
            ]);
        } catch (SpotifyWebAPIException $exception) {
            dump($exception);
            die(__FILE__ . ' at line: ' . __LINE__); //@todo remove
        }

        echo '<pre>';
        print_r($test);
        die(__FILE__ . ' at line: ' . __LINE__);
        echo "<pre>";
        print_r($this->api->me());
        die(__FILE__ . ' at line: ' . __LINE__); //@todo remove
    }
}
