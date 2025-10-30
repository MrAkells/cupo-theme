<?php

/**
 * Template Name: Front Page
 *
 * @package cupo
 */

get_header();

$current_language = apply_filters('wpml_current_language', null);
?>

<main class="page">
    <section class="hero">
        <div class="hero__container">
            <div class="hero__body">
                <h1 class="hero__title">
                    <?= get_field('hero_title'); ?>
                </h1>
                <div class="hero__inner">
                    <div data-da=".hero__info, 767.98" class="hero__circle-text">
                        <img class="hero__circle-1" src="/wp-content/themes/cupo/img/circle-text.svg"
                            alt="circle-text">
                        <img class="hero__circle-2" src="/wp-content/themes/cupo/img/circle-check.svg"
                            alt="circle-check">
                    </div>
                    <div class="hero__img">

                        <?php if ($image = get_field('hero_image')) : ?>
                            <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                        <?php endif; ?>

                    </div>
                    <div class="hero__info">
                        <div class="hero__text">
                            <p>
                                <?= get_field('hero_text'); ?>
                            </p>
                        </div>
                        <a href="#" class="hero__link button open-popup">
                            <span><?= get_field('start_button', 'options'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="aboutus">
        <div class="aboutus__container">
            <div class="aboutus__head section-head">
                <h4 class="section-head__subtitle">
                    <?= get_field('about_subtitle'); ?>
                </h4>
                <h2 class="section-head__title">
                    <?= get_field('about_title'); ?>
                </h2>
            </div>
            <div class="aboutus__body">
                <div class="aboutus__text">
                    <p>
                        <?= get_field('about_text'); ?>
                    </p>
                </div>

                <?php if (have_rows('about_items')): ?>
                    <div class="aboutus__items">
                        <?php while (have_rows('about_items')): the_row(); ?>
                            <div class="aboutus__item">
                                <h3 class="aboutus__item-title">
                                    <?= get_sub_field('about_item_title'); ?>
                                </h3>
                                <p class="aboutus__item-text">
                                    <?= get_sub_field('about_item_text'); ?>
                                </p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <section class="partners-new__section">
        <div class="partners-new__container">
            <div class="partners-new__header">
                <?php
                $current_language = apply_filters('wpml_current_language', null);

                if ($current_language == 'ru') {
                    $our = 'Наши';
                    $official = 'Официальные';
                    $partners = 'Партнеры';
                    $integrated = 'Мы интегрированы с ведущими криптовалютными биржами мира';
                } elseif ($current_language == 'uk') {
                    $our = 'Наші';
                    $official = 'Офіційні';
                    $partners = 'Партнери';
                    $integrated = 'Ми інтегровані з провідними криптовалютними біржами світу';
                } elseif ($current_language == 'es') {
                    $our = 'Nuestros';
                    $official = 'Socios';
                    $partners = 'Oficiales';
                    $integrated = 'Estamos integrados con las principales criptobolsas del mundo';
                } elseif ($current_language == 'zh-hans') {
                    $our = '我们的';
                    $official = '官方';
                    $partners = '合作伙伴';
                    $integrated = '我们与全球领先的加密货币交易所合作';
                } else {
                    // English by default
                    $our = 'Our';
                    $official = 'Official';
                    $partners = 'Partners';
                    $integrated = 'We are integrated with the World\'s Leading Crypto Exchanges';
                }
                ?>

                <h2><?php echo esc_html($our); ?> <span><?php echo esc_html($official); ?></span> <?php echo esc_html($partners); ?></h2>
                <p><?php echo esc_html($integrated); ?></p>
            </div>

            <div class="partners-new__items">
                <div class="partner-logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/11/1653358199192520467_downlod_gate2.png" alt="Gate.io">
                </div>
                <div class="partner-logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/11/Binance-Logo.wine_-1.png" alt="Binance">
                </div>
                <div class="partner-logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/11/Bybit_Logotype_250x250_Transparent_Darkmode-Duo.png" alt="Bybit">
                </div>
                <div class="partner-logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/11/Coinbase-Logo-Photoroom-1.png" alt="Coinbase">
                </div>
                <div class="partner-logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/11/Bitfinex-Logo.wine_-1.png" alt="Bitfinex">
                </div>
                <div class="partner-logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/11/htx-logo-png_seeklogo-534277-Photoroom-1.png" alt="HTX">
                </div>
                <div class="partner-logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/11/binance-us-logo-4DD5E365AB-seeklogo.com_-1.png" alt="Binance.US">
                </div>
                <div class="partner-logo">
                    <img src="https://cupo.ai/wp-content/uploads/2024/11/65f31ebdbe88888bc7c1fc85_64124b398c8b69296b23994e_bvtso_Photoroom-1.png" alt="Bitso">
                </div>
            </div>
        </div>
    </section>
    <section class="trust">
        <div class="trust__container">
            <div class="trust-header">
                <?php
                if ($current_language == 'en') {
                    echo '<h1>TEST. <span>TRUST.</span><br> PROSPER</h1>';
                    echo '<p>You don’t transfer your funds anywhere</p>';
                } elseif ($current_language == 'uk') {
                    echo '<h1>СПРОБУЙ. <span>ПЕРЕКОНАЙСЯ.</span><br> ПРОЦВІТАЙ</h1>';
                    echo '<p>Ви нікуди не переводите свої кошти</p>';
                } elseif ($current_language == 'ru') {
                    echo '<h1>ПОПРОБУЙ. <span>УБЕДИСЬ.</span><br> ПРОЦВЕТАЙ</h1>';
                    echo '<p>Вы никуда не переводите свои деньги</p>';
                } elseif ($current_language == 'es') {
                    echo '<h1>PRUEBA. <span>CONFÍA.</span><br> PROSPERA</h1>';
                    echo '<p>No transfieres tus fondos a ninguna parte</p>';
                } elseif ($current_language == 'zh-hans') {
                    echo '<h1>测试。<span>信任。</span><br>繁荣</h1>';
                    echo '<p>您不会将资金转移到任何地方</p>';
                } else {
                    echo 'Error';
                } ?>
            </div>

            <div class="trust-content">
                <div class="trust-algorithm">
                    <div class="algorithm-box">
                        <span>
                            <?php
                            if ($current_language == 'en') {
                                echo 'CUPO ALGORITHM';
                            } elseif ($current_language == 'uk') {
                                echo 'АЛГОРИТМ CUPO';
                            } elseif ($current_language == 'ru') {
                                echo 'АЛГОРИТМ CUPO';
                            } elseif ($current_language == 'es') {
                                echo 'ALGORITMO DE CUPO';
                            } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                                echo 'CUPO 算法';
                            } else {
                                echo 'CUPO ALGORITHM';
                            }
                            ?>

                        </span>
                    </div>
                </div>

                <div class="exchange-grid">

                    <div class="exchange-row">
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/gateio.png" alt="Gate IO">
                            </div>
                            <h3>Gate IO</h3>
                            <p class="price"><span style="font-size: 20px;"></span>15% <span class="change">+280$</span></p>
                            <div class="crypto-icons">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-27.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-28.png" alt="">
                            </div>
                        </div>
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/bybit.png" alt="Bybit">
                            </div>
                            <h3>Bybit</h3>
                            <p class="price"><span style="font-size: 20px;"></span>12% <span class="change">+195$</span></p>
                            <div class="crypto-icons">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-27.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-31.png" alt="">
                            </div>
                        </div>
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/binance.png" alt="Binance">
                            </div>
                            <h3>Binance</h3>
                            <p class="price"><span style="font-size: 20px;"></span>7% <span
                                    class="change">+120$</span></p>
                            <div class="crypto-icons">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-31.png" alt="">
                            </div>
                        </div>
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/coinbase.png" alt="Coinbase">
                            </div>
                            <h3>Coinbase</h3>
                            <p class="price"><span style="font-size: 20px;"></span>10% <span
                                    class="change">+460$</span></p>
                            <div class="crypto-icons">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-3.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-4.png" alt="">
                            </div>

                        </div>
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/htx.png" alt="HTX">
                            </div>
                            <h3>HTX</h3>
                            <p class="price"><span style="font-size: 20px;"></span>11% <span class="change">+310$</span></p>
                            <div class="crypto-icons">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-27.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-28.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="exchange-row">
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/bitso.png" alt="Bitso">
                            </div>
                            <h3>Bitso</h3>
                            <p class="price"><span style="font-size: 20px;"></span>12% <span
                                    class="change">+590$</span></p>
                            <div class="crypto-icons">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-27.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-28.png" alt="">
                            </div>
                        </div>
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/binance-us.png" alt="Binance US">
                            </div>
                            <h3>Binance US</h3>
                            <p class="price"><span style="font-size: 20px;"></span>9% <span
                                    class="change">+340$</span></p>
                            <div class="crypto-icons">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-2.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-27.png" alt="">
                            </div>
                        </div>
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/ph-question-fill.svg" alt="?">
                            </div>
                            <h3>Exchange</h3>
                            <p class="price" style="visibility: hidden;"><span style="font-size: 20px;"></span>14% <span
                                    class="change">+640$</span></p>
                            <div class="crypto-icons" style="visibility: hidden;">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-28.png" alt="">
                            </div>
                        </div>
                        <div class="exchange-card">
                            <div class="exchange-card__logo">
                                <img src="https://cupo.ai/wp-content/uploads/2024/11/bitfinex.png" alt="Bitfinex">
                            </div>
                            <h3>Bitfinex</h3>
                            <p class="price"><span style="font-size: 20px;"></span>14% <span
                                    class="change">+640$</span></p>
                            <div class="crypto-icons">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-30-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-29.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-1.png" alt="">
                                <img src="https://cupo.ai/wp-content/uploads/2024/09/image-28.png" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="sliders">
        <div class="sliders__container">
            <div class="slider__head section-head">
                <h2 class="section-head__title">
                    <span>
                        <?php
                        if ($current_language == 'en') {
                            echo 'Cupo Algorithm:';
                        } elseif ($current_language == 'uk') {
                            echo 'Алгоритм Cupo:';
                        } elseif ($current_language == 'ru') {
                            echo 'Алгоритм Cupo:';
                        } elseif ($current_language == 'es') {
                            echo 'Algoritmo Cupo:';
                        } elseif ($current_language == 'zh-hans') {
                            echo 'Cupo 算法：';
                        } else {
                            echo 'Error';
                        } ?>
                    </span><br>
                    <p>
                        <?php
                        if ($current_language == 'en') {
                            echo 'One YeaR Backtest Results';
                        } elseif ($current_language == 'uk') {
                            echo 'результати тестування за рік';
                        } elseif ($current_language == 'ru') {
                            echo 'Результаты бэктеста за год';
                        } elseif ($current_language == 'es') {
                            echo 'Resultados de la prueba retrospectiva de un año';
                        } elseif ($current_language == 'zh-hans') {
                            echo '这是简体中文文本';
                        } else {
                            echo 'Error';
                        } ?>
                    </p>
                </h2>
            </div>
            <div class="video-slider">
                <div class="video-slide">
                    <iframe src="https://www.youtube.com/embed/67mrWaTWlRE?si=XBOeznio6DB00yqS"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-slide">
                    <iframe src="https://www.youtube.com/embed/bgqthoqHf1A?si=LlN44KZYYc6_jD95"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-slide">
                    <iframe src="https://www.youtube.com/embed/Q2P7ywa7o00?si=VEq72KRf6ntHvhhB"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-slide">
                    <iframe src="https://www.youtube.com/embed/gTIeCsPgl_Y?si=uic-wdrz66-z68FO"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
            <h3 class="tests__title">
                <?php
                if ($current_language == 'en') {
                    echo 'conducted backtests';
                } elseif ($current_language == 'uk') {
                    echo 'проведені бектести';
                } elseif ($current_language == 'ru') {
                    echo 'проведенные бэктесты';
                } elseif ($current_language == 'es') {
                    echo 'Se realizaron pruebas retrospectivas';
                } elseif ($current_language == 'zh-hans') {
                    echo '进行回测';
                } else {
                    echo 'Error';
                } ?>
            </h3>
            <div class="tests-slider">
                <div class="tests-slide"><img src="https://cupo.ai/wp-content/uploads/2024/09/1-2.png" alt=""></div>
                <div class="tests-slide"><img src="https://cupo.ai/wp-content/uploads/2024/09/4-2.png" alt=""></div>
                <div class="tests-slide"><img src="https://cupo.ai/wp-content/uploads/2024/09/3-1.png" alt=""></div>
                <div class="tests-slide"><img src="https://cupo.ai/wp-content/uploads/2024/09/2-2.png" alt=""></div>
            </div>
        </div>
    </section>
    <section class="features">
        <div class="features__container">
            <div class="features__body">
                <div class="features__head section-head">
                    <h4 class="section-head__subtitle">
                        <?= get_field('features_subtitle'); ?>
                    </h4>
                    <h2 class="section-head__title">
                        <?= get_field('features_title'); ?>
                    </h2>
                    <p class="section-head__text">
                        <?= get_field('features_text'); ?>
                    </p>
                </div>

                <?php if (have_rows('features_cards')): ?>
                    <?php
                    $counter = 0;
                    while (have_rows('features_cards')): the_row();
                        $counter++;
                        $card_class = 'features__card';
                        if ($counter == 1) {
                            $card_class .= ' features__card--first';
                        } elseif ($counter == 3) {
                            $card_class .= ' features__card--three';
                        } elseif ($counter == 4) {
                            $card_class .= ' features__card--last';
                        }
                    ?>
                        <div class="<?= esc_attr($card_class); ?>">
                            <div class="features__card-icon">
                                <img src="<?= esc_url(get_sub_field('features_card_image')); ?>" alt="Image">
                            </div>
                            <div class="features__card-body">
                                <h4 class="features__card-title">
                                    <?= esc_html(get_sub_field('features_card_title')); ?>
                                </h4>
                                <p class="features__card-text">
                                    <?= esc_html(get_sub_field('features_card_text')); ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <section class="quick-start">
        <div class="quick-start__container">
            <div class="quick-start__body">
                <div class="quick-start__img">

                    <?php if ($image = get_field('quick_start_image')) : ?>
                        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                    <?php endif; ?>

                </div>
                <div class="quick-start__content">
                    <div class="quick-start__head section-head">
                        <h2 class="section-head__title">
                            <?= get_field('quick_start_title'); ?>
                        </h2>
                    </div>
                    <div class="quick-start__info">
                        <div class="quick-start__dotts">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <p class="quick-start__text">
                            <?= get_field('quick_start_text'); ?>
                        </p>

                        <?php if (have_rows('quick_start_steps')): ?>
                            <div class="quick-start__steps" style="display: none">
                                <?php $counter = 1; ?>
                                <?php while (have_rows('quick_start_steps')): the_row(); ?>
                                    <div class="quick-start__step">
                                        <div class="quick-start__num">
                                            <?= sprintf('%02d', $counter); ?>
                                        </div>
                                        <p class="quick-start__text">
                                            <?= esc_html(get_sub_field('quick_start_text')); ?>
                                        </p>
                                    </div>
                                    <?php $counter++; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                        <p class="quick-start__text">
                            <?= get_field('quick_start_text_2'); ?>
                        </p>
                        <div class="quick-start__bottom">
                            <a href="<?= get_field('start_button_link', 'options'); ?>"
                                class="quick-start__btn button open-popup">
                                <?= get_field('start_button', 'options'); ?>
                            </a>
                            <a href="<?= get_field('ask_button_link', 'options'); ?>" class="quick-start__link">
                                <?= get_field('ask_button', 'options'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="quick-start__items">
                <div class="quick-start__item">
                    <div>01</div>
                    <p>
                        <?php
                        if ($current_language == 'en') {
                            echo 'Select a crypto exchange from the available options.';
                        } elseif ($current_language == 'uk') {
                            echo 'Виберіть криптобіржу з доступних варіантів.';
                        } elseif ($current_language == 'ru') {
                            echo 'Выберите криптовалютную биржу из доступных вариантов.';
                        } elseif ($current_language == 'es') {
                            echo 'Seleccione un intercambio de criptomonedas de las opciones disponibles.';
                        } elseif ($current_language == 'zh-hans') {
                            echo '从可用选项中选择一个加密货币交易所。';
                        } else {
                            echo 'Error';
                        } ?>
                    </p>
                </div>
                <div class="quick-start__arrow">
                    <img src="/wp-content/themes/cupo/img/arrow-steps-1.svg" alt="Arrow">
                </div>
                <div class="quick-start__item">
                    <div>02</div>
                    <p>
                        <?php
                        if ($current_language == 'en') {
                            echo 'Input the API keys generated from your account on the chosen exchange.';
                        } elseif ($current_language == 'uk') {
                            echo 'Введіть ключі API, згенеровані з вашого облікового запису на вибраній біржі.';
                        } elseif ($current_language == 'ru') {
                            echo 'Введите ключи API, сгенерированные из вашего аккаунта на выбранной бирже.';
                        } elseif ($current_language == 'es') {
                            echo 'Ingrese las claves API generadas desde su cuenta en el intercambio elegido.';
                        } elseif ($current_language == 'zh-hans') {
                            echo '输入您在所选交易所的账户生成的 API 密钥。。';
                        } else {
                            echo 'Error';
                        } ?>
                    </p>
                </div>
                <div class="quick-start__arrow">
                    <img src="/wp-content/themes/cupo/img/arrow-steps-2.svg" alt="Arrow">
                </div>
                <div class="quick-start__item">
                    <div>03</div>
                    <p>
                        <?php
                        if ($current_language == 'en') {
                            echo 'Add up to four currency pairs of your choice.';
                        } elseif ($current_language == 'uk') {
                            echo 'Додайте до чотирьох валютних пар на ваш вибір.';
                        } elseif ($current_language == 'ru') {
                            echo 'Добавьте до четырех валютных пар по вашему выбору.';
                        } elseif ($current_language == 'es') {
                            echo 'Añade hasta cuatro pares de divisas de tu elección.';
                        } elseif ($current_language == 'zh-hans') {
                            echo '添加最多四对您选择的货币对。';
                        } else {
                            echo 'Error';
                        } ?>
                    </p>
                </div>
                <div class="quick-start__arrow">
                    <img src="/wp-content/themes/cupo/img/arrow-steps-3.svg" alt="Arrow">
                </div>
                <div class="quick-start__item">
                    <div>04</div>
                    <p>
                        <?php
                        if ($current_language == 'en') {
                            echo 'Press “Start auto-trading”.';
                        } elseif ($current_language == 'uk') {
                            echo 'Натисніть «Почати автоматичну торгівлю».';
                        } elseif ($current_language == 'ru') {
                            echo 'Нажмите «Начать авто-торговлю».';
                        } elseif ($current_language == 'es') {
                            echo 'Presione "Iniciar comercio automático".';
                        } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                            echo '按“开始自动交易”。';
                        } else {
                            echo 'Error';  // Текст по умолчанию, если язык не определен
                        } ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="works">
        <div class="works__container">
            <div class="works__body">
                <div class="works__content">
                    <div class="works__head section-head">
                        <h2 class="section-head__title">
                            <?= get_field('works_title'); ?>
                        </h2>
                    </div>

                    <?php if (have_rows('works_spollers')): ?>
                        <div class="works__spollers spollers">
                            <?php
                            $counter = 1;
                            while (have_rows('works_spollers')): the_row();
                            ?>
                                <section class="spollers__item">
                                    <div class="spollers__title" aria-expanded="false"
                                        aria-controls="content<?php echo $counter; ?>"
                                        id="header<?php echo $counter; ?>">
                                        <span><?= get_sub_field('spollers_title'); ?></span>
                                        <svg class="spollers__arrow" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 23L23 1M23 1H1M23 1V23" stroke="white" />
                                        </svg>
                                    </div>
                                    <div class="spollers__body" id="content<?php echo $counter; ?>"
                                        aria-hidden="true">
                                        <?= get_sub_field('spollers_text'); ?>
                                    </div>
                                </section>
                            <?php
                                $counter++;
                            endwhile;
                            ?>
                        </div>
                    <?php endif; ?>


                    <div class="works__bottom">
                        <a href="#" class="works__btn button open-popup">
                            <?= get_field('start_button', 'options'); ?>
                        </a>
                        <a href="<?= get_field('ask_button_link', 'options'); ?>" class="works__link">
                            <?= get_field('ask_button', 'options'); ?>
                        </a>
                    </div>
                </div>
                <div class="works__img">
                    <?php if ($image = get_field('works_image')) : ?>
                        <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="result">
        <div class="result__container">
            <div class="result__body">
                <div class="result__content">
                    <div class="result__head section-head">
                        <h4 class="section-head__title">
                            <?php
                            if ($current_language == 'en') {
                                echo '<span>Latest profit</span><p>results</p>';
                            } elseif ($current_language == 'uk') {
                                echo '<span>Останній прибуток</span><p>результати</p>';
                            } elseif ($current_language == 'ru') {
                                echo '<span>Последняя прибыль</span><p>результаты</p>';
                            } elseif ($current_language == 'es') {
                                echo '<span>Últimas ganancias</span><p>resultados</p>';
                            } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                                echo '<span>最新利润</span><p>结果</p>';
                            } else {
                                echo '<span>Latest profit</span><p>results</p>';
                            }
                            ?>
                        </h4>
                        <a href="#" class="result__btn button open-popup">
                            <?php
                            if ($current_language == 'en') {
                                echo 'Join now!';
                            } elseif ($current_language == 'uk') {
                                echo 'Приєднуйся зараз!';
                            } elseif ($current_language == 'ru') {
                                echo 'Присоединяйтесь сейчас!';
                            } elseif ($current_language == 'es') {
                                echo '¡Únete ahora!';
                            } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                                echo '立即加入！';
                            } else {
                                echo 'Join now!';
                            }
                            ?>
                        </a>
                    </div>
                </div>
                <div class="result__items">
                    <table>
                        <thead>
                            <tr>
                                <?php
                                if ($current_language == 'en') {
                                    echo '<th>User</th><th>Profit</th><th>Trade date</th><th>Cryptocurrency</th><th>Result</th>';
                                } elseif ($current_language == 'uk') {
                                    echo '<th>Користувач</th><th>Прибуток</th><th>Дата торгівлі</th><th>Криптовалюта</th><th>Результат</th>';
                                } elseif ($current_language == 'ru') {
                                    echo '<th>Пользователь</th><th>Прибыль</th><th>Дата сделки</th><th>Криптовалюта</th><th>Результат</th>';
                                } elseif ($current_language == 'es') {
                                    echo '<th>Usuario</th><th>Ganancia</th><th>Fecha de operación</th><th>Criptomoneda</th><th>Resultado</th>';
                                } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                                    echo '<th>用户</th><th>利润</th><th>交易日期</th><th>加密货币</th><th>结果</th>';
                                } else {
                                    echo '<th>User</th><th>Profit</th><th>Trade date</th><th>Cryptocurrency</th><th>Result</th>';
                                }
                                ?>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>JESSICA T.</td>
                                <td>$456</td>
                                <td>04/02/2023</td>
                                <td>LTC/USDT</td>
                                <td><img src="/wp-content/themes/cupo/img/icons/result-check.svg"></td>
                            </tr>
                            <tr>
                                <td>JOSEPH M.</td>
                                <td>$723</td>
                                <td>06/05/2024</td>
                                <td>ETH/USDT</td>
                                <td><img src="/wp-content/themes/cupo/img/icons/result-check.svg"></td>
                            </tr>
                            <tr>
                                <td>HARRY C.</td>
                                <td>$456</td>
                                <td>23/07/2024</td>
                                <td>BTC/USDT</td>
                                <td><img src="/wp-content/themes/cupo/img/icons/result-check.svg"></td>
                            </tr>
                            <tr>
                                <td>EVAM M.</td>
                                <td>$839</td>
                                <td>09/01/2023</td>
                                <td>EOS/USDT</td>
                                <td><img src="/wp-content/themes/cupo/img/icons/result-check.svg"></td>
                            </tr>
                            <tr>
                                <td>LILY C.</td>
                                <td>$1201</td>
                                <td>13/08/2024</td>
                                <td>LTC/USDT</td>
                                <td><img src="/wp-content/themes/cupo/img/icons/result-check.svg"></td>
                            </tr>
                            <tr>
                                <td>LEWIS R.</td>
                                <td>$972</td>
                                <td>06/07/2023</td>
                                <td>BTC/USDT</td>
                                <td><img src="/wp-content/themes/cupo/img/icons/result-check.svg"></td>
                            </tr>
                            <tr>
                                <td>GEORGE B.</td>
                                <td>$687</td>
                                <td>01/09/2024</td>
                                <td>ETH/USDT</td>
                                <td><img src="/wp-content/themes/cupo/img/icons/result-check.svg"></td>
                            </tr>
                            <tr>
                                <td>NATASHA R.</td>
                                <td>$1129</td>
                                <td>30/07/2024</td>
                                <td>EOS/USDT</td>
                                <td><img src="/wp-content/themes/cupo/img/icons/result-check.svg"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
    <section class="say">
        <div class="say__container">
            <div class="section__head subscription__head">
                <?php
                $current_language = apply_filters('wpml_current_language', null);

                if ($current_language == 'ru') {
                   $know = 'Познакомьтесь с людьми, стоящими за CUPO';
                   $trust = 'Доверие начинается с прозрачности';
                } elseif ($current_language == 'uk') {
                   $know = 'Познайомтеся з людьми, що стоять за CUPO';
                   $trust = 'Довіра починається з прозорості';
                } elseif ($current_language == 'es') {
                   $know = 'Conoce a las personas detrás de CUPO';
                   $trust = 'La confianza comienza con la transparencia';
                } elseif ($current_language == 'zh-hans') {
                   $know = '了解CUPO背后的团队';
                   $trust = '信任始于透明';
                } else {
                   // English by default
                   $know = 'Get to know people behind CUPO';
                   $trust = 'Trust starts with transparency';
                }
                ?>

                <p class="section-head__text" style="font-size: 20px; line-height: 1em;">
                   <span style="font-size: 16px;"><?php echo $know; ?></span><br>
                   <?php echo $trust; ?>
                </p>
                <?php
                $current_language = apply_filters('wpml_current_language', null);

                if ($current_language == 'ru') {
                    $who = 'Кто';
                    $we = 'Мы';
                    $are = 'Такие';
                } elseif ($current_language == 'uk') {
                    $who = 'Хто';
                    $we = 'Ми';
                    $are = 'Є';
                } elseif ($current_language == 'es') {
                    $who = 'Quiénes';
                    $we = 'Somos';
                    $are = '';
                } elseif ($current_language == 'zh-hans') {
                    $who = '我们';
                    $we = '是';
                    $are = '谁';
                } else {
                    // English by default
                    $who = 'Who';
                    $we = 'We';
                    $are = 'Are';
                }
                ?>

                <h2 class="section-head__title" style="text-align: right; margin: 0;">
                    <?php echo $who; ?><br>
                    <p style="margin-right: 4.4rem;">
                        <span><?php echo $we; ?></span> <?php echo $are; ?>
                    </p>
                </h2>
            </div>
            <div class="say__body">
                <?php if (have_rows('team_members')): ?>
                    <div class="say__items we__items">
                        <?php while (have_rows('team_members')): the_row();
                            $photo = get_sub_field('member_photo');
                            $name = get_sub_field('member_name');
                            $position = get_sub_field('member_position');
                            $description = get_sub_field('member_description');
                        ?>
                            <div class="say__item">
                                <?php if ($photo): ?>
                                    <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>">
                                <?php endif; ?>

                                <div class="we__description">
                                    <h3>
                                        <?php echo esc_html($name); ?>
                                    </h3>

                                    <p>
                                        <?php echo esc_html($position); ?>
                                    </p>

                                    <?php echo $description ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="say">
        <div class="say__container">
            <div class="section__head">
                <h2 class="section-head__title">
                    <?php
                    if ($current_language == 'en') {
                        echo 'What <span>Our Users</span> Say';
                    } elseif ($current_language == 'uk') {
                        echo 'Що кажуть <span>наші користувачі</span>';
                    } elseif ($current_language == 'ru') {
                        echo 'Что говорят <span>наши пользователи</span>';
                    } elseif ($current_language == 'es') {
                        echo 'Qué dicen <span>nuestros usuarios</span>';
                    } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                        echo 'аши пользователи<span>говорили</span>';
                    } else {
                        echo 'What <span>Our Users</span> Say';
                    }
                    ?>
                </h2>
            </div>
            <div class="say__body">
                <div class="say__items">
                    <div class="say__item">
                        <img src="https://cupo.ai/wp-content/uploads/2024/09/Rectangle-29.jpg" alt="">
                        <h3>Sarah M., Chicago</h3>
                        <p>
                            <?php
                            if ($current_language == 'en') {
                                echo 'I was skeptical at first, but Cupo.ai has exceeded my expectations. The algorithm is straightforward, and I love that my funds stay secure in my own account. It\'s amazing that I can connect two exchanges to my Cupo account and trade different coins all at the same time. It’s awesome that I didn’t have to send money to Cupo—everything stays in my exchange account. I didn’t stress at all because other services ask for money upfront, which is super suss right away. Highly recommend!';
                            } elseif ($current_language == 'uk') {
                                echo 'Спочатку я був скептично налаштований, але Cupo.ai перевершив мої очікування. Алгоритм простий, і мені подобається, що мої кошти залишаються в безпеці на моєму власному рахунку. Дивовижно, що я можу підключити дві біржі до свого облікового запису Cupo і торгувати різними монетами одночасно. Це чудово, що мені не потрібно було надсилати гроші до Cupo—все залишається на моєму біржовому рахунку. Я зовсім не переживав, тому що інші сервіси просять гроші наперед, що викликає підозру з самого початку. Дуже рекомендую!';
                            } elseif ($current_language == 'ru') {
                                echo 'Сначала я был скептически настроен, но Cupo.ai превзошел мои ожидания. Алгоритм простой, и мне нравится, что мои средства остаются в безопасности на моем собственном счету. Удивительно, что я могу подключить две биржи к своему аккаунту Cupo и одновременно торговать разными монетами. Классно, что мне не пришлось отправлять деньги в Cupo—все остается на моем биржевом счету. Я не волновался, потому что другие сервисы требуют деньги заранее, что сразу же вызывает подозрение. Настоятельно рекомендую!';
                            } elseif ($current_language == 'es') {
                                echo 'Al principio era escéptico, pero Cupo.ai superó mis expectativas. El algoritmo es sencillo y me encanta que mis fondos se mantengan seguros en mi propia cuenta. Es increíble que pueda conectar dos intercambios a mi cuenta de Cupo y comerciar con diferentes monedas al mismo tiempo. Es fantástico que no tuve que enviar dinero a Cupo, todo permanece en mi cuenta de intercambio. No me preocupé en absoluto porque otros servicios piden dinero por adelantado, lo cual es sospechoso de inmediato. ¡Muy recomendable!';
                            } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                                echo '一开始我很怀疑，但 Cupo.ai 超出了我的预期。算法很简单，我喜欢我的资金保存在我自己的账户中。我可以将两个交易所连接到我的 Cupo 账户，并同时交易不同的币种，这真是太棒了。很棒的是我不必将资金转给 Cupo——所有资金都保存在我的交易所账户中。我完全没有压力，因为其他服务会要求提前支付资金，这一开始就让人感到非常可疑。强烈推荐！';
                            } else {
                                echo 'I was skeptical at first, but Cupo.ai has exceeded my expectations. The algorithm is straightforward, and I love that my funds stay secure in my own account. It\'s amazing that I can connect two exchanges to my Cupo account and trade different coins all at the same time. It’s awesome that I didn’t have to send money to Cupo—everything stays in my exchange account. I didn’t stress at all because other services ask for money upfront, which is super suss right away. Highly recommend!';
                            } ?>
                        </p>
                    </div>
                    <div class="say__item">
                        <img src="https://cupo.ai/wp-content/uploads/2024/09/Rectangle-29-1.jpg" alt="">
                        <h3>David L., Perth</h3>
                        <p>
                            <?php
                            if ($current_language == 'en') {
                                echo 'Trading used to be so overwhelming for me, but Cupo.ai made it easy. I set it up in just a few minutes, chose my coins, and let the algorithm do its thing. The best part? I didn’t have to send any money to Cupo—all my funds stay safe in my own exchange account. Plus, it’s amazing that I can connect two exchanges and manage different coins simultaneously. Thanks to the team for creating something so user-friendly!';
                            } elseif ($current_language == 'uk') {
                                echo 'Торгівля завжди була для мене такою виснажливою, але Cupo.ai зробив її легкою. Я налаштував систему за кілька хвилин, обрав монети і дозволив алгоритму робити свою роботу. Найкраще в цьому? Мені не довелося надсилати жодні гроші до Cupo—усі мої кошти залишаються в безпеці на моєму біржевому рахунку. Також дивовижно, що я можу підключити дві біржі і керувати різними монетами одночасно. Дякую команді за створення такого зручного рішення!';
                            } elseif ($current_language == 'ru') {
                                echo 'Торговля всегда казалась мне такой сложной, но Cupo.ai сделал её лёгкой. Я настроил всё за считанные минуты, выбрал свои монеты и позволил алгоритму делать своё дело. Самое лучшее? Мне не пришлось отправлять деньги в Cupo—все мои средства остаются в безопасности на моем биржевом счете. Также удивительно, что я могу подключить две биржи и одновременно управлять разными монетами. Спасибо команде за создание такого удобного решения!';
                            } elseif ($current_language == 'es') {
                                echo 'El comercio solía ser tan abrumador para mí, pero Cupo.ai lo hizo fácil. Lo configuré en solo unos minutos, elegí mis monedas y dejé que el algoritmo hiciera lo suyo. ¿La mejor parte? No tuve que enviar dinero a Cupo, todos mis fondos permanecen seguros en mi propia cuenta de intercambio. Además, es increíble que pueda conectar dos intercambios y gestionar diferentes monedas al mismo tiempo. ¡Gracias al equipo por crear algo tan fácil de usar!';
                            } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                                echo '交易曾经让我感到非常不知所措，但 Cupo.ai 让一切变得简单。我在几分钟内设置好，选择了我的币种，并让算法自动运行。最棒的部分？我不必将资金转给 Cupo——所有资金都安全地保存在我的交易所账户中。而且，我还能连接两个交易所并同时管理不同的币种，这简直是锦上添花。如果你对交易认真，那么绝对值得一试。';
                            } else {
                                echo 'Trading used to be so overwhelming for me, but Cupo.ai made it easy. I set it up in just a few minutes, chose my coins, and let the algorithm do its thing. The best part? I didn’t have to send any money to Cupo—all my funds stay safe in my own exchange account. Plus, it’s amazing that I can connect two exchanges and manage different coins simultaneously. Thanks to the team for creating something so user-friendly!';
                            } ?>
                        </p>
                    </div>
                    <div class="say__item">
                        <img src="https://cupo.ai/wp-content/uploads/2024/09/Rectangle-29-2.jpg" alt="">
                        <h3>Alex P., New York</h3>
                        <p>
                            <?php
                            if ($current_language == 'en') {
                                echo 'I’ve tried other trading bots before, but none of them compare to Cupo.ai. The fact that it doesn’t touch my funds and only trades the coins I choose gives me peace of mind. It’s awesome that I didn’t have to send money to Cupo—everything stays in my exchange account, so no stress. And being able to connect two exchanges at once to trade different coins is just the cherry on top. Definitely worth checking out if you\'re serious about trading.';
                            } elseif ($current_language == 'uk') {
                                echo 'Я пробував інші торгові боти, але жоден з них не зрівняється з Cupo.ai. Те, що він не торкається моїх коштів і торгує лише тими монетами, які я обрав, дає мені спокій. Дивовижно, що мені не довелося надсилати гроші до Cupo—все залишається на моєму біржевому рахунку, тож жодного стресу. І можливість підключити дві біржі одночасно для торгівлі різними монетами — це просто вишенька на торті. Однозначно варто спробувати, якщо ви серйозно налаштовані на торгівлю.';
                            } elseif ($current_language == 'ru') {
                                echo 'Я пробовал другие торговые боты, но ни один из них не сравнится с Cupo.ai. То, что он не трогает мои средства и торгует только теми монетами, которые я выбираю, даёт мне спокойствие. Здорово, что мне не пришлось отправлять деньги в Cupo—всё остаётся на моём биржевом счёте, так что никакого стресса. А возможность подключить две биржи одновременно для торговли разными монетами — это просто вишенка на торте. Определённо стоит попробовать, если вы серьёзно относитесь к торговле.';
                            } elseif ($current_language == 'es') {
                                echo 'He probado otros bots de comercio antes, pero ninguno se compara con Cupo.ai. El hecho de que no toque mis fondos y solo opere con las monedas que elijo me da tranquilidad. Es increíble que no tuve que enviar dinero a Cupo—todo permanece en mi cuenta de intercambio, sin estrés. Y poder conectar dos intercambios al mismo tiempo para comerciar diferentes monedas es la guinda del pastel. Definitivamente vale la pena probarlo si te tomas en serio el comercio.';
                            } elseif ($current_language == 'zh-hans') {  // Упрощенный китайский (zh-hans)
                                echo '我以���尝试过其他交易机器人，但没有一个能与 Cupo.ai 相比。它不接触我的资金，只交易我选择的币种，这让我感到安心。最棒的是，我不必将资金转给 Cupo——所有资金都保存在我的交易所账户中，毫无压力。而且能够同时连接两个交易所交易不同的币种，这简直是锦上添花。如果你对交易认真，那么绝对值得一试。';
                            } else {
                                echo 'I’ve tried other trading bots before, but none of them compare to Cupo.ai. The fact that it doesn’t touch my funds and only trades the coins I choose gives me peace of mind. It’s awesome that I didn’t have to send money to Cupo—everything stays in my exchange account, so no stress. And being able to connect two exchanges at once to trade different coins is just the cherry on top. Definitely worth checking out if you\'re serious about trading.';
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="subscription" id="subscription">
        <div class="subscription__container">
            <div class="subscription__head section-head">
                <h4 class="section-head__subtitle">
                    <?= get_field('subscription_subtitle'); ?>
                </h4>
                <p class="section-head__text">
                    <?= get_field('subscription_text'); ?>
                </p>
                <h2 class="section-head__title">
                    <?= get_field('subscription_title'); ?>
                </h2>
            </div>

            <?php if (have_rows('subscription_cards')): ?>
                <div class="subscription__body">
                    <?php $counter = 0; ?>
                    <?php while (have_rows('subscription_cards')): the_row(); ?>
                        <?php
                        $counter++;
                        $card_class = 'subscription__card';
                        if ($counter == 2) {
                            $card_class .= ' subscription__card--decore';
                        }
                        ?>
                        <div class="<?= $card_class; ?>">
                            <div class="subscription__card-img">
                                <?php if ($image = get_sub_field('image')) : ?>
                                    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
                                <?php endif; ?>
                            </div>
                            <div class="subscription__card-body">
                                <h3 class="subscription__card-title">
                                    <?= get_sub_field('title'); ?>
                                </h3>
                                <p class="subscription__card-text">
                                    <?= get_sub_field('text'); ?>
                                </p>
                            </div>
                            <div class="subscription__card-bottom">
                                <div class="subscription__card-price">
                                    <?= get_sub_field('price'); ?>
                                </div>
                                <a href="№" class="subscription__card-btn open-popup">
                                    <span><?= get_sub_field('button'); ?></span>
                                    <svg width="20" height="8" viewBox="0 0 20 8" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.3536 4.35355C19.5488 4.15829 19.5488 3.84171 19.3536 3.64644L16.1716 0.464465C15.9763 0.269203 15.6597 0.269203 15.4645 0.464465C15.2692 0.659727 15.2692 0.976309 15.4645 1.17157L18.2929 4L15.4645 6.82843C15.2692 7.02369 15.2692 7.34027 15.4645 7.53553C15.6597 7.73079 15.9763 7.73079 16.1716 7.53553L19.3536 4.35355ZM4.37114e-08 4.5L19 4.5L19 3.5L-4.37114e-08 3.5L4.37114e-08 4.5Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="subscription__bottom">
                <p class="subscription__text">
                    <?= get_field('subscription_bottom'); ?>
                </p>
            </div>
        </div>
    </section>
    <section class="partners">
        <div class="partners__img">
            <?php if ($image = get_field('partners_image')) : ?>
                <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
            <?php endif; ?>
        </div>
        <div class="partners__container">
            <div class="partners__body">
                <div class="partners__head section-head">
                    <h2 class="section-head__title">
                        <?= get_field('partners_title'); ?>
                    </h2>
                    <p class="section-head__text">
                        <?= get_field('partners_text'); ?>
                    </p>
                </div>

                <?php if (have_rows('partners_steps')): ?>
                    <?php $counter = 1; ?>
                    <?php while (have_rows('partners_steps')): the_row(); ?>
                        <div class="partners__step partners__step--<?= $counter; ?>">
                            <div class="partners__step-title">
                                <?= get_sub_field('title'); ?>
                            </div>
                            <p class="partners__step-text">
                                <?= get_sub_field('text'); ?>
                            </p>
                        </div>
                        <?php $counter++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <div class="partners__bottom">
                <div class="partners__info">
                    <h3 class="partners__title">
                        <?= get_field('partners_bottom_title'); ?>
                    </h3>
                    <p class="partners__text">
                        <?= get_field('partners_bottom_text'); ?>
                    </p>
                </div>

                <?php if (have_rows('partners_levels')): ?>
                    <?php $counter = 1; ?>
                    <?php while (have_rows('partners_levels')): the_row(); ?>
                        <div class="partners__level partners__level--<?= $counter; ?>">
                            <div class="partners__level-icon">
                                <?php if ($image = get_sub_field('image')) : ?>
                                    <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="partners__level-body">
                                <div class="partners__level-title">
                                    <?= get_sub_field('title'); ?>
                                </div>
                                <div class="partners__level-bottom">
                                    <div class="partners__level-num">
                                        <?= get_sub_field('percent'); ?>
                                    </div>
                                    <div class="partners__level-text">
                                        <?= get_sub_field('text'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>