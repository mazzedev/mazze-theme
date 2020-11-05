<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

<main id="main" class="site-main container mx-auto" role="main">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		get_template_part( 'template-parts/related-posts', get_post_type() );

	endwhile;
	?>

</main>

<?php
get_footer();