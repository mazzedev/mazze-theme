<?php

/**
 * The main template file
 */

get_header();
?>

<main id="main" class="container mx-auto px-2 lg:md-0" role="main">
	<div class="py-12">
		<h1 class="font-semibold text-3xl">Últimas Notícias</h1>
	</div>

	<?php
	if (have_posts()) : ?>
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
			<?php
			endwhile;
			?>
		</div>
	<?php
		the_posts_pagination(array(
			'prev_next' => false,
			'next_text' => '',
			'class' => ''
		));
	endif;
	?>
</main>

<?php
get_footer();
