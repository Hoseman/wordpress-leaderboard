<?php

add_shortcode('leaderboard', 'leaderboard_user_form');

function leaderboard_user_form($atts) {
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-shortcode-form.php');	
	
}

?>