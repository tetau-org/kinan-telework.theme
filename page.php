<?php get_header(); ?>

<section class="contents_wrap">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>

</section>

<?php get_footer(); ?>
