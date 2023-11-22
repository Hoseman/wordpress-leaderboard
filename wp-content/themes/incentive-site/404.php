<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Technical_Test
 */

get_header();

// Get values for database time

$valid4 = true;
$SQL4 = "SELECT * FROM " . $wpdb->prefix . "lb_dbtime";
$formData4 = $wpdb-> get_results($SQL4);
$show_time = "";
$array = array();

		if($valid4) {
				foreach ($wpdb->get_results($SQL4) as $key => $row) {
						
						$custom_server_time = $row->server_time;
						$show_time = $row->show_time;
				}
		}


if ($show_time == "off") {
	$now = time();
}
elseif ($show_time == "") {
	$now = time();
}
else {
	$now = $custom_server_time;
}
// Get values for database time

?>

<!-- Main Carousel -->

<section class="carousel carousel-small">
    <div class="carousel-small__content">

    <h4 class="carousel__subheading">That page cannot be found!</h4>
    <h1 class="carousel__heading">404 ERROR</h1>
    <div class="carousel__underline"></div>
    <p class="carousel__text">Why not try searching for something below?</p>
	<a class="carousel__btn" href="#the-leaderboard">ADD YOUR SCORES</a>

    </div>
    <?php $carousel_image = '/wp-content/uploads/2023/11/carousel-1.jpeg'; ?> 
    <img class="carousel-small__img" alt="Page cannot be found" src="<?php echo $carousel_image; ?>">

</section>

<!-- Main Carousel -->


<!-- Time Green Triangle -->
<section id="the-leaderboard" class="time-container">
    <div class="time-container__triangle">
        <p><?php echo date('F j, Y', $now + 0); ?><br><?php echo date('g:i a', $now + 0); ?></p>
    </div>
</section>
<!-- Time Green Triangle -->



	<main id="primary" class="container text-center">

		<section class="error-404 not-found">

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'technical-test' ); ?></p>

					<?php get_search_form(); ?>


			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
