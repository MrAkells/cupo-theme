<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cupo
 */

$current_language = apply_filters('wpml_current_language', null);
?>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__top">
            <div class="footer__card promotion-card">
                <h3 class="promotion-card__title">
                    <?php if (get_field('promotion_title', 'options')) : ?>
                        <?php echo get_field('promotion_title', 'options'); ?>
                    <?php endif; ?>
                </h3>
                <div class="promotion-card__content">
                    <p class="promotion-card__text">
                        <?php if (get_field('promotion_text', 'options')) : ?>
                            <?php echo get_field('promotion_text', 'options'); ?>
                        <?php endif; ?>
                    </p>
                    <a href="#" target="_blank" class="promotion-card__btn button open-popup">
                        <?php if (get_field('promotion', 'options')) : ?>
                            <?php echo get_field('promotion', 'options'); ?>
                        <?php endif; ?>

                    </a>
                </div>
            </div>
            <div class="footer__card promotion-card promotion-card--2">
                <h3 class="promotion-card__title">
                    <?php if (get_field('support_title', 'options')) : ?>
                        <?php echo get_field('support_title', 'options'); ?>
                    <?php endif; ?>
                </h3>
                <div class="promotion-card__content">
                    <p class="promotion-card__text">
                        <?php if (get_field('support_text', 'options')) : ?>
                            <?php echo get_field('support_text', 'options'); ?>
                        <?php endif; ?>
                    </p>
                    <a href="<?php echo get_field('support_link', 'options'); ?>" target="_blank" class="promotion-card__btn button">
                        <?php if (get_field('suport', 'options')) : ?>
                            <?php echo get_field('suport', 'options'); ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer__body">
            <div class="footer__content">
                <nav class="footer__nav">

                    <?php
                    wp_nav_menu([
                        'theme_location'  => 'footer',
                        'container'       => 'ul',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul class="footer__nav-list">%3$s</ul>'
                    ]);
                    ?>

                </nav>
                <div class="footer__copy">
                    <?php echo get_field('copyright', 'options'); ?>
                </div>
            </div>
            <div class="footer__info">
                <div class="footer__links">
                    <a href="" class="footer__link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.56 20.82C12.3966 20.9366 12.2008 20.9993 12 20.9993C11.7992 20.9993 11.6035 20.9366 11.44 20.82C6.61102 17.378 1.48602 10.298 6.66702 5.182C8.08888 3.78212 10.0047 2.99826 12 3C14 3 15.919 3.785 17.333 5.181C22.514 10.297 17.389 17.376 12.56 20.82Z" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 12C12.5304 12 13.0391 11.7893 13.4142 11.4142C13.7893 11.0391 14 10.5304 14 10C14 9.46957 13.7893 8.96086 13.4142 8.58579C13.0391 8.21071 12.5304 8 12 8C11.4696 8 10.9609 8.21071 10.5858 8.58579C10.2107 8.96086 10 9.46957 10 10C10 10.5304 10.2107 11.0391 10.5858 11.4142C10.9609 11.7893 11.4696 12 12 12Z" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>
                            <?php if (get_field('address', 'options')) : ?>
                                <?php echo get_field('address', 'options'); ?>
                            <?php endif; ?>
                        </span>
                    </a>
                    <a href="mailto:
							<?php if (get_field('email', 'options')) : ?>
								<?php echo get_field('email', 'options'); ?>
							<?php endif; ?>" class="footer__link">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 4.6875H3C2.85082 4.6875 2.70774 4.74676 2.60225 4.85225C2.49676 4.95774 2.4375 5.10082 2.4375 5.25V18C2.4375 18.3481 2.57578 18.6819 2.82192 18.9281C3.06806 19.1742 3.4019 19.3125 3.75 19.3125H20.25C20.5981 19.3125 20.9319 19.1742 21.1781 18.9281C21.4242 18.6819 21.5625 18.3481 21.5625 18V5.25C21.5625 5.10082 21.5032 4.95774 21.3977 4.85225C21.2923 4.74676 21.1492 4.6875 21 4.6875ZM12 12.7369L4.44562 5.8125H19.5544L12 12.7369ZM9.53156 12L3.5625 17.4713V6.52875L9.53156 12ZM10.3641 12.7631L11.625 13.9144C11.7287 14.0092 11.8641 14.0619 12.0047 14.0619C12.1452 14.0619 12.2807 14.0092 12.3844 13.9144L13.6406 12.7631L19.5544 18.1875H4.44656L10.3641 12.7631ZM14.4684 12L20.4375 6.52875V17.4713L14.4684 12Z" />
                        </svg>
                        <span>
                            <?php if (get_field('email', 'options')) : ?>
                                <?php echo get_field('email', 'options'); ?>
                            <?php endif; ?>
                        </span>
                    </a>
                </div>

                <?php if (have_rows('socials', 'options')) : ?>
                    <div class="footer__socials">
                        <?php while (have_rows('socials', 'options')) : the_row(); ?>
                            <a href="<?php the_sub_field('link'); ?>" class="footer__social">
                                <img src="<?php the_sub_field('icon'); ?>" />
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="footer__bottom-text">
        Automatic cryptocurrency trading
    </div>
</footer>
</div>

<div id="popupOverlay" class="popup-overlay">
    <div class="popup-content">
        <form id="registration-form" class="registration-form" action="<?php echo esc_url(get_permalink()); ?>" method="post">
            <input type="hidden" name="rfs_nonce" value="<?php echo wp_create_nonce('rfs_form_nonce'); ?>">
            <label for="first_name">
                <?php
                if ($current_language == 'en') {
                    echo 'First Name:';
                } elseif ($current_language == 'zh-hans') {
                    echo '名:';
                } elseif ($current_language == 'uk') {
                    echo 'Ім\'я:';
                } elseif ($current_language == 'es') {
                    echo 'Nombre:';
                } elseif ($current_language == 'ru') {
                    echo 'Имя:';
                }
                ?>*
            </label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">
                <?php
                if ($current_language == 'en') {
                    echo 'Last Name:';
                } elseif ($current_language == 'zh-hans') {
                    echo '姓:';
                } elseif ($current_language == 'uk') {
                    echo 'Прізвище:';
                } elseif ($current_language == 'es') {
                    echo 'Apellido:';
                } elseif ($current_language == 'ru') {
                    echo 'Фамилия:';
                }
                ?>*
            </label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">
                <?php
                if ($current_language == 'en') {
                    echo 'Email:';
                } elseif ($current_language == 'zh-hans') {
                    echo '电子邮件:';
                } elseif ($current_language == 'uk') {
                    echo 'Email:';
                } elseif ($current_language == 'es') {
                    echo 'Correo electrónico:';
                } elseif ($current_language == 'ru') {
                    echo 'Email:';
                }
                ?>*
            </label>
            <input type="email" id="email" name="email" required>

            

            <div class="registration__buttons">
                <button class="button button-cancel" type="button">
                    <?php
                    if ($current_language == 'en') {
                        echo 'Cancel';
                    } elseif ($current_language == 'zh-hans') {
                        echo '取消';
                    } elseif ($current_language == 'uk') {
                        echo 'Скасувати';
                    } elseif ($current_language == 'es') {
                        echo 'Cancelar';
                    } elseif ($current_language == 'ru') {
                        echo 'Отмена';
                    }
                    ?>
                </button>
                <button class="button button-submit" type="submit" name="submit_registration">
                    <?php
                    if ($current_language == 'en') {
                        echo 'Continue';
                    } elseif ($current_language == 'zh-hans') {
                        echo '继续';
                    } elseif ($current_language == 'uk') {
                        echo 'Продовжити';
                    } elseif ($current_language == 'es') {
                        echo 'Continuar';
                    } elseif ($current_language == 'ru') {
                        echo 'Продолжить';
                    }
                    ?>
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $('.video-slider').slick({
        // centerMode: true,
        // centerPadding: '60px',
        slidesToShow: 1,
        prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
        nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
        // asNavFor: '.tests-slider',
    });
    $('.tests-slider').slick({
        slidesToShow: 4,
        asNavFor: '.video-slider',
        // centerMode: true,
        focusOnSelect: true,
        draggable: false,
        infinite: false,
        swipe: false,
        touchMove: false,
    });
</script>
<?php wp_footer(); ?>
</body>

</html>