<?php

namespace FH\Bundle\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

/**
 * Builds all menus needed for the app.
 *
 * @author Patrick van Oostrom <patrick@freshheads.com>
 */
class MenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * Constructor.
     *
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Creates main menu.
     *
     * @return ItemInterface
     */
    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'home']);
        $menu->addChild('Menu item 1', ['uri' => '#']);
        $menu->addChild('Menu item 2', ['uri' => '#']);

        return $menu;
    }
}
