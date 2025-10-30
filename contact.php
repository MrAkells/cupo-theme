<?php
/*
Template Name: Contact
*/
get_header(); ?>

<main class="page">
    <section class="contacus">
        <div class="contacus__container">
            <div class="contacus__head section-head">
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
            <div class="contacus__body">
                <a href="" class="contacus__link">
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
                <a href="mailto:<?php echo get_field('email', 'options'); ?>" class="contacus__link">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 4.6875H3C2.85082 4.6875 2.70774 4.74676 2.60225 4.85225C2.49676 4.95774 2.4375 5.10082 2.4375 5.25V18C2.4375 18.3481 2.57578 18.6819 2.82192 18.9281C3.06806 19.1742 3.4019 19.3125 3.75 19.3125H20.25C20.5981 19.3125 20.9319 19.1742 21.1781 18.9281C21.4242 18.6819 21.5625 18.3481 21.5625 18V5.25C21.5625 5.10082 21.5032 4.95774 21.3977 4.85225C21.2923 4.74676 21.1492 4.6875 21 4.6875ZM12 12.7369L4.44562 5.8125H19.5544L12 12.7369ZM9.53156 12L3.5625 17.4713V6.52875L9.53156 12ZM10.3641 12.7631L11.625 13.9144C11.7287 14.0092 11.8641 14.0619 12.0047 14.0619C12.1452 14.0619 12.2807 14.0092 12.3844 13.9144L13.6406 12.7631L19.5544 18.1875H4.44656L10.3641 12.7631ZM14.4684 12L20.4375 6.52875V17.4713L14.4684 12Z" />
                    </svg>
                    <span>
                        <?php if (get_field('email', 'options')) : ?>
                            <?php echo get_field('email', 'options'); ?>
                        <?php endif; ?>
                    </span>
                </a>

                <?php if (have_rows('socials', 'options')) : ?>
                    <div class="contacus__socials">
                        <?php while (have_rows('socials', 'options')) : the_row(); ?>

                            <a href="<?php the_sub_field('link'); ?>" class="contacus__social">
                                <?php if (get_sub_field('icon')) : ?>
                                    <img src="<?php the_sub_field('icon'); ?>" style="filter: invert(1);" />
                                <?php endif; ?>
                            </a>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
            <div class="contacus__card promotion-card">
                <h3 class="promotion-card__title">
                    <?php if ( get_field('support_title', 'options') ) : ?>
                        <?php echo get_field('support_title', 'options'); ?>
                    <?php endif; ?>
                </h3>
                <div class="promotion-card__content">
                    <p class="promotion-card__text">
                        <?php if ( get_field('support_text', 'options') ) : ?>
                            <?php echo get_field('support_text', 'options'); ?>
                        <?php endif; ?>
                    </p>
                    <a href="<?php echo get_field('support_link', 'options'); ?>" class="promotion-card__btn button">
                        <?php if ( get_field('suport', 'options') ) : ?>
                            <?php echo get_field('suport', 'options'); ?>
                        <?php endif; ?>
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