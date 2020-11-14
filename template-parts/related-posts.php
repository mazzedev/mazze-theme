<?php
$categories = get_the_category();

$categories = array_map(fn ($category) => $category->term_id, $categories);

$relatedPosts = new WP_Query([
    'cat' => $categories,
    'posts_per_page' => 4,
    'post__not_in' => [get_the_ID()]
]);

if ($relatedPosts->have_posts()) : ?>
    <div class="flex flex-col mt-8 lg:mt-0 mb-8">
        <div class="flex justify-between">
            <span class="text-2xl font-semibold leading-10">Veja também</span>
            <a href="<?php echo home_url('/') ?>" class="border border-black flex font-medium items-center p-2 rounded-lg text-center text-xs">
                Todas as notícias
            </a>
        </div>
        <div class="grid gap-y-4 lg:flex lg:flex-row lg:justify-between mt-8">
            <?php while ($relatedPosts->have_posts()) :
                $relatedPosts->the_post(); ?>
                <div class="shadow rounded-lg px-3 py-5 text-xs lg:w-72">
                    <div class="text-purple-mazze font-medium mb-1"><?php echo get_the_date('d F Y') ?></div>
                    <h3 class="font-semibold"><?php echo get_the_title() ?></h3>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
    wp_reset_postdata();
endif;
