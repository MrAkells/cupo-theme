<?php
/*
Template Name: FAQ
*/
get_header(); ?>

<main class="page">
    <section class="faqs">
        <div class="faqs__container">
            <div class="faqs__head section-head">
                <h1 class="section-head__title">
                    <?php if (get_field('head_title')) : ?>
                        <?php echo get_field('head_title'); ?>
                    <?php endif; ?>
                </h1>
                <p class="section-head__text">
                    <?php if (get_field('head_text')) : ?>
                        <?php echo get_field('head_text'); ?>
                    <?php endif; ?>
                </p>
            </div>

            <?php if (have_rows('body_questions')) : ?>
                <div class="faqs__body">
                    <?php while (have_rows('body_questions')) : the_row(); ?>
                        <div class="faqs__item">
                            <h5 class="faqs__item-title">
                                <?php the_sub_field('question'); ?>
                            </h5>
                            <div class="faqs__item-text">
                                <p>
                                    <?php the_sub_field('answer'); ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="faqs__card promotion-card">
                <h3 class="promotion-card__title">
                    Still <span>Have</span>
                    <p>
                        a <span>questions</span>?
                    </p>
                </h3>
                <div class="promotion-card__content">
                    <p class="promotion-card__text">
                        Contact our support via Telegram
                    </p>
                    <a href="" class="promotion-card__btn button">
                        Support in Telegram
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    .footer__top {
        display: none;
    }
</style>

<?php get_footer(); ?>