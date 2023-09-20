<?php get_header(); ?>
<main class="container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if(!is_front_page()) : ?>
			<?php if ( function_exists('yoast_breadcrumb') ) : ?>
				<?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
			<?php endif; ?>
		<?php endif; ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
</main>
<?php get_footer(); ?>