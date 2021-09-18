<?php

declare(strict_types = 1);

// phpcs:ignore
namespace AnyContentMenu;

use AnyContentMenu\PostType\MenuItem;

class Controller
{

    public function init(): void
    {
        add_action('init', [ $this, 'loadTranslation' ]);
        add_action('init', [ $this, 'registerPostType' ]);
    }

    public function loadTranslation(): void
    {
        load_plugin_textdomain(
            TEXTDOMAIN,
            false,
            'any-content-menu/languages'
        );
    }

    public function registerPostType(): void
    {
        $menuItemPostType = new MenuItem();
        $menuItemPostType->register();

        $menuModifier = new MenuModifier();
        $menuModifier->init();
    }

}
