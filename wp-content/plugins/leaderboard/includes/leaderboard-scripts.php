<?php
//Include Admin CSS

if(is_admin()) {
		//Add CSS styles
		function ah_leaderboard_4_admin_css() {
			wp_enqueue_style('ah-leaderboard-admin-style', plugins_url() . '/leaderboard/css/style-admin.css');
			wp_enqueue_style('ah-leaderboard-bootstrap-admin-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
		}

		add_action('admin_init', 'ah_leaderboard_4_admin_css');		
}

if(is_admin()) {
		//Add jquery 
		function ah_leaderboard_4_jquery() {
			wp_enqueue_script('jquery-ui-datepicker');
			wp_enqueue_script('ah_leaderboard_4_jquery', plugins_url() . '/leaderboard/js/ajaxcall.js');
		}

		add_action('admin_init', 'ah_leaderboard_4_jquery');		
}

if(is_admin()) {
		//Add Datepicker
		function ah_leaderboard_admin_datepicker() {
			wp_enqueue_script('ah-leaderboard-4-admin-datepicker', plugins_url() . '/leaderboard/js/scripts.js');
		}

		add_action('admin_init', 'ah_leaderboard_admin_datepicker');		
}

if(is_admin()) {
		//Add jQuery sortable for scores
		function ah_leaderboard_admin_sort() {
			wp_enqueue_script('ah-leaderboard-4-admin-sortable', plugins_url('../js/reorder.js', __FILE__), array('jquery', 'jquery-ui-sortable'), '20171310', true);	
		}

		add_action('admin_init', 'ah_leaderboard_admin_sort');		
}

if(is_admin()) {
		//Add jQuery sortable for dealers
		function ah_leaderboard_admin_sort_dealers() {
			wp_enqueue_script('ah-leaderboard-4-admin-sortable-dealer', plugins_url('../js/reorder_dealer.js', __FILE__), array('jquery', 'jquery-ui-sortable'), '20171310', true);	
		}

		add_action('admin_init', 'ah_leaderboard_admin_sort_dealers');		
}






function ah_leaderboard_css() {
		wp_enqueue_style('ah-leaderboard-style', plugins_url() . '/leaderboard/css/style.css');
		wp_enqueue_style('ah-leaderboard-bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');	
}

add_action('wp_enqueue_scripts', 'ah_leaderboard_css');



function ah_leaderboard_datepicker() {
	wp_enqueue_script('jquery-ui-datepicker');
	//wp_enqueue_script('ajaxcall-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
	wp_enqueue_script('ah-leaderboard-script', plugins_url() . '/leaderboard/js/scripts.js');	
}

add_action('wp_enqueue_scripts', 'ah_leaderboard_datepicker');


?>