<?php

/**
 * Any Content Menu
 *
 * @package any-content-menu
 * @author DSNWP
 * @copyright 2021 Desineo s.r.o.
 * @License: GPL2
 *
 * @wordpress-plugin
 * Plugin Name: Any Content Menu
 * Description: Display post content as menu item content.
 * Version: 1.0
 * Requires at least: 5.6
 * Tested up to: 5.8
 * Requires PHP: 7.3
 * Author: DSNWP
 * Author URI: https://www.desineo.com
 * License: GPL2
 * Text Domain: any-content-menu
 * Domain Path: /languages
 */

declare(strict_types = 1);

// phpcs:ignore
namespace AnyContentMenu;

if (defined('WPINC') === false) {
    die;
}

const TEXTDOMAIN = 'any-content-menu';

require_once 'PostType/MenuItem.php';
require_once 'MenuModifier.php';
require_once 'Controller.php';

( new Controller() )->init();
