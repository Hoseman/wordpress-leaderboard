<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Technical_Test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="googlebot" content="noindex">
    <meta name="robots" content="noindex">
	<link rel="preconnect" href="https://fonts.gstatic.com">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php //the_custom_logo(); ?>



<header class="header u-center-text">
    <div class="header__topbar"></div>
    <div class="header__logo">
        <a href="/"><img class="header__logoimg" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.svg" alt="Leaderboard Logo"></img></a>
    </div>
    <div class="header__wrapper">
        

        <!-- <ul class="header__menu">
            <li><a href="/#the-leaderboard">THE LEADERBOARD</a></li>
            <li><a href="/#terms">THE RULES</a></li>
            <li><a href="/#weekly-prizes">THE PRIZES</a></li>
            <li><a href="/weekly-results/">WEEKLY RESULTS</a></li>
        </ul> -->
        <?php
        wp_nav_menu(
        	array(
        		'theme_location' => 'menu-1',
                'menu_class'=> 'header__menu',
        		'menu_id'        => 'primary-menu',
        	)
        );
        ?>


    </div>
</header>

