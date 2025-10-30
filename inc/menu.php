<?php

function custom_menu_li_class($classes, $item, $args, $depth) {
    if ($args->theme_location === 'header') {
        $classes = array();

        $classes[] = 'menu__item';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'custom_menu_li_class', 10, 4);

function custom_menu_link_class($atts, $item, $args, $depth) {
    if ($args->theme_location === 'header') {
        // Получаем URL ссылки
        $url = isset($atts['href']) ? $atts['href'] : '';

        // Всегда присваиваем класс 'menu__link'
        $atts['class'] = 'menu__link';

        // Проверяем, начинается ли ссылка с '/#' (считаем её якорем)
        if (strpos($url, '/') !== 0) {
            // Если ссылка не якорная, добавляем класс 'active'
            if (in_array('current-menu-item', $item->classes)) {
                $atts['class'] .= ' active';
            }
        }
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'custom_menu_link_class', 10, 4);

function custom_footer_li_class($classes, $item, $args, $depth) {
    if ($args->theme_location === 'footer') {
        $classes = array();

        $classes[] = 'footer__nav-item';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'custom_footer_li_class', 10, 4);

function custom_footer_link_class($atts, $item, $args, $depth) {
    if ($args->theme_location === 'footer') {
        $atts['class'] = 'footer__nav-link';

        if (in_array('current-menu-item', $item->classes)) {
            $atts['class'] .= ' active';
        }
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'custom_footer_link_class', 10, 4);
