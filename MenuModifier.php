<?php

declare(strict_types = 1);

// phpcs:ignore
namespace AnyContentMenu;

use AnyContentMenu\PostType\MenuItem;

class MenuModifier
{

    private const WP_FILTER = 'walker_nav_menu_start_el';

    public function init(): void
    {
        add_filter(self::WP_FILTER, [ $this, 'renderMenuItem' ], 5, 2);
    }

    /**
     * Filters a menu item's starting output.
     *
     * @param string $itemOutput The menu item's starting HTML output.
     * @param \WP_Post|\WPML_LS_Menu_Item|object $item Menu item data object.
     * @throws \Exception
     */
    public function renderMenuItem(string $itemOutput, $item): string
    {
        if ($item->object === MenuItem::NAME) {
            $itemOutput = preg_replace(
                '/<a\s(.+?)>.+<\/a>/is',
                $this->getPostContent($item->object_id),
                $itemOutput
            );
        }

        return $itemOutput;
    }

    private function getPostContent(string $objectId): string
    {
        $content = get_the_content(null, false, $objectId);

        if ($content === '') {
            throw new \Exception(sprintf('Menu item %s not found', $objectId));
        }

        // phpcs:ignore
        $content = apply_filters('the_content', $content);
        return str_replace(']]>', ']]&gt;', $content);
    }

}
