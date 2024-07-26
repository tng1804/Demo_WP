<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<?php if (is_user_logged_in()) : ?>
	<?php
	$current_user = wp_get_current_user();
	?>
	<p style="text-align: center;">Xin chào, <?php echo esc_html($current_user->display_name); ?>!</p>
<?php else : ?>
	<p style="text-align: center;">Xin chào, khách!</p>
<?php endif; ?>

<?php if (is_home() && !is_front_page() && !empty(single_post_title('', false))) : ?>
	<header class="page-header alignwide">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</header><!-- .page-header -->

<?php endif; ?>

<?php if (is_single()) : ?>
	<div class="single-post-message">
		<p>Bạn đang xem một bài viết đơn lẻ.</p>
	</div>
<?php endif; ?>


<?php
if (have_posts()) {

	// Load posts loop.
	while (have_posts()) {
		the_post();

		get_template_part('template-parts/content/content', get_theme_mod('display_excerpt_or_full_post', 'excerpt'));
	}

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();
} else {

	// If no content, include the "No posts found" template.
	get_template_part('template-parts/content/content-none');
}

get_footer();
