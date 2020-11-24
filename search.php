<?php

/**
 * The template for displaying search results pages
 *
 */

get_header();
?>

<main id="main" class="site-main" role="main">
    <?php
    if (have_posts()) : ?>
        <header class="page-header">
            <h1>Resultados: <?php echo get_search_query(); ?></h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php while (have_posts()) : the_post(); ?>
                <article class="shadow rounded-lg">
                    <div class="align-middle flex items-center justify-center">
                        <a href="<?php the_permalink() ?>">
                            <img src="<?php the_post_thumbnail_url() ?>" class="rounded-lg lg:h-56" alt="">
                        </a>
                    </div>
                    <div class="p-3">
                        <div class="text-purple-mazze font-medium mb-1"><?php echo get_the_date('d F Y') ?></div>
                        <div>
                            <a href="<?php the_permalink() ?>">
                                <h1 class="font-semibold"><?php the_title() ?></h1>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Sorry, but nothing matched your search terms.</p>
    <?php
    endif;
    ?>
</main>

<?php
get_footer();
