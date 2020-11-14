<?php

/**
 * Template part for displaying posts
 */

?>

<article id="post-<?php the_ID(); ?>" class="entry lg:min-h-screen">
    <header class="entry-header lg:mt-20">
        <h1 class="text-4xl md:text-6xl font-bold text-purple-mazze"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </header>
    <?php if (!has_post_thumbnail()) : ?>
        <div class="flex space-x-3 mt-3 font-medium text-base text-gray-600">
            <div class="text-center text-sm"><?php the_modified_date('d/m/Y h\hi') ?></div>
            <div class="flex justify-center space-x-3">
                <div class="text-sm">Compartilhar no</div>
                <div>
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="entry-content grid grid-cols-1 <?php if (has_post_thumbnail()) { echo 'lg:grid-cols-3'; } ?> mt-8">
        <div class="prose md:prose-xl col-span-2 <?php if (!has_post_thumbnail()) { echo 'max-w-none'; } else { echo 'pr-10'; } ?>">
            <?php the_content(); ?>
        </div>
        <?php if (has_post_thumbnail()) : ?>
            <div class="relative right-auto lg:absolute lg:right-0 row-start-1 lg:row-start-auto">
                <?php the_post_thumbnail() ?>
                <div class="flex flex-col font-medium mt-8 space-y-3 text-base text-gray-600">
                    <div class="text-center text-sm"><?php the_modified_date('d/m/Y h\hi') ?></div>
                    <div class="flex justify-center space-x-3">
                        <div>Compartilhar no</div>
                        <div>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>