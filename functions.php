<?php
/**
 * cupo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cupo
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cupo_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on cupo, use a find and replace
        * to change 'cupo' to the name of your theme in all the template files.
        */
    load_theme_textdomain('cupo', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'header' => esc_html__('Header', 'cupo'),
            'footer' => esc_html__('Footer', 'cupo'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'cupo_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'cupo_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cupo_content_width()
{
    $GLOBALS['content_width'] = apply_filters('cupo_content_width', 640);
}

add_action('after_setup_theme', 'cupo_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cupo_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'cupo'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'cupo'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'cupo_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cupo_scripts()
{
    wp_enqueue_style('cupo-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('cupo-style', 'rtl', 'replace');

    wp_enqueue_script('cupo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js', array(), _S_VERSION, true);

    if (is_front_page()) {
        wp_enqueue_style('intl-tel-input', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css');
        wp_enqueue_script('intl-tel-input', 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js', array(), null, true);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'cupo_scripts');

/**
 * Custom menu classes
 */
require get_template_directory() . '/inc/menu.php';

/**
 * WPML Custom Switcher
 */
require get_template_directory() . '/inc/languages.php';

/**
 * ACF Custom Settings
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

function display_cookies_shortcode()
{
    // JavaScript код для отображения cookies
    ob_start(); // Начало буферизации вывода
    ?>
    <p id="cookieDisplay" style="white-space: pre-wrap;"></p>

    <script>
        // Получаем все cookie и разбиваем на строки по каждому cookie
        const cookies = document.cookie.split(';').map(cookie => cookie.trim()).join('\n');

        // Выводим отформатированные cookie в div с переносами строк
        document.getElementById('cookieDisplay').textContent = cookies;
    </script>
    <?php
    return ob_get_clean(); // Возвращаем содержимое буфера
}

add_shortcode('display_cookies', 'display_cookies_shortcode');

function add_subscriber_admin_styles() {
    $user = wp_get_current_user();
    if (in_array('subscriber', (array) $user->roles)) {
        $custom_css = "
            #menu-posts, #menu-comments, #menu-tools, #toplevel_page_site-settings {display:none}
        ";
        
        wp_add_inline_style('admin-menu', $custom_css);
    }
}
add_action('admin_enqueue_scripts', 'add_subscriber_admin_styles');