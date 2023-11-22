<?php
/* Template Name: IncentiveHomePage */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Technical_Test
 */

get_header();
?>

<!-- Main Carousel -->

<?php include(locate_template('./template-parts/carousel.php')); ?>

<!-- Main Carousel -->


<!-- Load Leaderboard Plugin -->

<?php echo do_shortcode('[leaderboard/]'); ?>

<!-- Load Leaderboard Plugin -->


<!-- Weekly Prizes -->

<?php include(locate_template('./template-parts/weekly-prizes.php')); ?>

<!-- Weekly Prizes -->


<!-- Terms -->

<?php include(locate_template('./template-parts/terms.php')); ?>

<!-- Terms -->




		<?php
		while ( have_posts() ) :
			the_post();
        ?>    

        <h1><?php //the_title(); ?></h1>
        <?php the_content(); ?>    

        <?php    
		endwhile; // End of the loop.
		?>





<?php

get_footer();
