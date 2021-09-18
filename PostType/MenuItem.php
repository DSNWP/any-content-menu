<?php

declare(strict_types = 1);

// phpcs:ignore
namespace AnyContentMenu\PostType;

use const AnyContentMenu\TEXTDOMAIN;

class MenuItem
{

    public const NAME = 'anycontentmenuitem';

    /** @return mixed[] */
    public function getPostTypeArgs(): array
    {
        return [
            'label' => __('Menu item', TEXTDOMAIN),
            'labels' => $this->getLabels(),
            'menu_icon' => 'dashicons-menu',
            'description' => __('Menu items', TEXTDOMAIN),
            'public' => false,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'menu_position' => 5,
            'hierarchical' => false,
            'supports' => [ 'title', 'editor', 'revisions' ],
            'has_archive' => false,
            'show_in_rest' => true,
        ];
    }

    /** @return string[] */
    private function getLabels(): array
    {
        return [
            'name' => __('Menu items', TEXTDOMAIN),
            'singular_name' => __('Menu item', TEXTDOMAIN),
            'menu_name' => __('Menu items', TEXTDOMAIN),
            'all_items' => __('All menu items', TEXTDOMAIN),
            'add_new' => __('New menu item', TEXTDOMAIN),
            'add_new_item' => __('Add new menu item', TEXTDOMAIN),
            'edit_item' => __('Edit menu item', TEXTDOMAIN),
            'new_item' => __('New menu item', TEXTDOMAIN),
            'view_item' => __('View menu item', TEXTDOMAIN),
            'search_items' => __('Search menu items', TEXTDOMAIN),
            'not_found' => __('No menu items were found', TEXTDOMAIN),
            'not_found_in_trash' => __('No menu items were found in trash', TEXTDOMAIN),
        ];
    }

    public function register(): void
    {
        register_post_type(self::NAME, $this->getPostTypeArgs());
    }

}
