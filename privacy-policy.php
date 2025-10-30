<?php
/*
Template Name: Policy
*/
get_header(); ?>

<main class="page">

    <section class="blog-post">
        <div class="blog-post__container">
            <div class="blog-post__head section-head">
                <h1 class="section-head__title">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </section>

    <section class="blog blog--section">
        <div class="blog__container">
            <?php the_content(); ?>
        </div>
    </section>
</main>

<style>
    .blog__container h2 {
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 32px;
    }
    .blog__container p,
    .blog__container li,
    .blog__container ul {
        font-size: 16px;
        line-height: 24px;
        margin-bottom: 24px;
        list-style-position: inside;
    }

    .blog__container li {
        margin-bottom: unset;
    }

    .blog__container li {
        margin-bottom: 16px;
    }
</style>

<?php get_footer(); ?>