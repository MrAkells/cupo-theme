<?php
function custom_wpml_language_switcher() {
    // Получаем языки
    $languages = apply_filters('wpml_active_languages', NULL, array('skip_missing' => 0));
    
    if (!empty($languages)) {
        // Определяем текущий язык
        $current_language = array_filter($languages, function($lang) {
            return $lang['active'];
        });
        $current_language = array_shift($current_language); // Текущий язык

        // Начало блока переключателя языков
        echo '<div class="header__lang languages">';
        
        // Кнопка текущего языка
        echo '<button type="button" class="languages__current">';
        echo '<span>' . esc_html($current_language['native_name']) . '</span>';
        echo '<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">';
        echo '<path d="M1 1L5 5L9 1" stroke="#D3CBBC" />';
        echo '</svg>';
        echo '</button>';
        
        // Список доступных языков без текущего языка
        echo '<ul class="languages__list">';
        foreach ($languages as $language) {
            if (!$language['active']) { // Исключаем текущий язык из списка
                echo '<li class="languages__item">';
                echo '<a href="' . esc_url($language['url']) . '" class="languages__link">';
                echo esc_html($language['native_name']);
                echo '</a>';
                echo '</li>';
            }
        }
        echo '</ul>';
        echo '</div>';
    }
}