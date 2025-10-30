<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cupo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="wrapper">
    <header class="header">
        <div class="header__container">
            <div class="header__body">
                <a href="<?= home_url(); ?>" class="header__logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/08/logo_cupo-01.svg" alt="logo cupo">
                </a>
                <div class="header__menu menu">
                    <button type="button" class="menu__icon icon-menu"><span></span></button>
                    <nav class="menu__body">

                        <?php
                        wp_nav_menu([
                            'theme_location' => 'header',
                            'container' => 'ul',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap' => '<ul class="menu__list">%3$s</ul>'
                        ]);
                        ?>

                    </nav>
                </div>
                <div class="header__actions">
                    <?php custom_wpml_language_switcher(); ?>
                    <a data-da=".menu__body, 549.98" href="#"
                       class="header__started open-popup">
                        <?php if (get_field('start_button', 'options')) : ?>
                            <?php echo get_field('start_button', 'options'); ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </header>