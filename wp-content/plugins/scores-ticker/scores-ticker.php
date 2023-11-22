<?php 
/**
 * Plugin Name: Leaderboard Scores Ticker
 * Plugin URI: https://achcreative.co.uk/leaderboard-installation.html
 * Description: Scores Ticker for the Leaderboard
 * Version: 1.0.0
 * Author: Andrew Hosegood
 * Author URI: https://portfolio-ah2023.netlify.app
 * License: GPL2
 */
 
 error_reporting(E_ALL);
ini_set('display_errors', 1);
 
function ach_ticker_script(){
	//wp_enqueue_script('ach_news_ticker_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
	wp_enqueue_script('ach_news_ticker', plugins_url() . '/scores-ticker/js/jquery.ticker.js','','1.0',true);
	wp_enqueue_script('ach_call_news_ticker', plugins_url() . '/scores-ticker/js/ticker.js','','1.0',true);        
}
add_action('wp_enqueue_scripts', 'ach_ticker_script');


function ach_ticker_style() {
	wp_enqueue_style('ach_news_ticker_css', plugin_dir_url(__FILE__) . 'css/ticker.css');
}
add_action('wp_enqueue_scripts', 'ach_ticker_style');


add_shortcode("ach-ticker", "display_ach_ticker"); //insert [ach-ticker/] into a post or page to view the plugin








function display_ach_ticker() {
	
global $wpdb;
$x = 1;
$limit = 3; //set the limit of the ticker to 3
$valid = true;
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lbv4_results");
$SQL = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results group by sales_person order by total desc LIMIT " . $limit;
$formData = $wpdb-> get_results($SQL);
$ticker_name_array = array();
if (!$formData) {
	$valid = false;

}

if($valid) {
		foreach ($wpdb->get_results($SQL) as $key => $row) {
			 $count =  $x++;
					
				   $count; 
				   $row->sales_person;
				   $row->total;
				   $ticker_number_array[] = $count;
				   $ticker_name_array[] = $row->sales_person;
				   $ticker_total_array[] = $row->total;
		   			
					
		}
} 			

?>




<div class="ticker">
<h3>
    <span class="ticker__container">
    <?php
	
		//Set up some conditions if there results are less than 3
		
    	if($numRows == 0) { $overall = "No results yet:"; }
		elseif($numRows == 1) { $overall = "OVERALL TOP 1:"; }
		elseif($numRows == 2) { $overall = "OVERALL TOP 2:";}
		else { $overall = "OVERALL TOP 3:";}
		
		if(empty($ticker_number_array[0])) {
			$ticker_number_array[0] = "";		
		}
		if(empty($ticker_total_array[0])) {
			$ticker_total_array[0] = "";		
		}
		if(empty($ticker_name_array[0])) {
			$ticker_name_array[0] = "No Data... Please Add Your Scores!";		
		}
		
		if(empty($ticker_number_array[1])) {
			$ticker_number_array[1] = "";		
		}
		if(empty($ticker_total_array[1])) {
			$ticker_total_array[1] = "";		
		}
		if(empty($ticker_name_array[1])) {
			$ticker_name_array[1] = "No Data... Please Add Your Scores!";		
		}
		
		if(empty($ticker_number_array[2])) {
			$ticker_number_array[2] = "";		
		}
		if(empty($ticker_total_array[2])) {
			$ticker_total_array[2] = "";		
		}
		if(empty($ticker_name_array[2])) {
			$ticker_name_array[2] = "No Data... Please Add Your Scores!";		
		}
		//End set up some conditions if there results are less than 3
		
		echo $overall;
	
			?>
    </span>

	<span>
        <ul>
        <?php 
		if($numRows == 1) {
		?>	
			<li><?php echo $ticker_number_array[0] . " " . $ticker_name_array[0] . " " . $ticker_total_array[0]; ?></li>
        <?php	
		}
		elseif($numRows == 2) {
		?>	
        	<li><?php echo $ticker_number_array[0] . " " . $ticker_name_array[0] . " " . $ticker_total_array[0]; ?></li>
            <li><?php echo $ticker_number_array[1] . " " . $ticker_name_array[1] . " " . $ticker_total_array[1]; ?></li>
		
        <?php	
		}
		elseif($numRows == 3) {
		?>	
        	<li><?php echo $ticker_number_array[0] . " " . $ticker_name_array[0] . " " . $ticker_total_array[0]; ?></li>
            <li><?php echo $ticker_number_array[1] . " " . $ticker_name_array[1] . " " . $ticker_total_array[1]; ?></li>
            <li><?php echo $ticker_number_array[2] . " " . $ticker_name_array[2] . " " . $ticker_total_array[2]; ?></li>
		
        <?php	
		}
		else {
		?>
        	<li><?php echo $ticker_number_array[0] . " " . $ticker_name_array[0] . " " . $ticker_total_array[0]; ?></li>
            <li><?php echo $ticker_number_array[1] . " " . $ticker_name_array[1] . " " . $ticker_total_array[1]; ?></li>
            <li><?php echo $ticker_number_array[2] . " " . $ticker_name_array[2] . " " . $ticker_total_array[2]; ?></li>

        
		<?php	
		}
		?>

    	
        </ul>
    </span>
	</h3>
    <span style="clear:left;"></span>
</div>




	
<?php	
} // end test_ach_ticker function




?>