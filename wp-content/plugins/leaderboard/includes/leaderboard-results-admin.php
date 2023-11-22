<?php
		
		add_action('admin_menu','ah_leaderboard_results_admin_menu');
				function ah_leaderboard_results_admin_menu () {
					add_menu_page(
						'Points Results',
						'points-results',
						'edit_posts', //edit_plugins https://solislab.com/blog/ultimate-guide-to-roles-and-capabilities/
						'points_results',
						'points_results',
						'dashicons-calendar-alt'
					);
		}
		
		//Display the points results action page
		function points_results() {
			global $wpdp;
			if (!current_user_can('edit_posts')) {
				wp_die('You do not have sufficient permissions');
			}
			leaderboard_points_results_post_action();
		}



//Handle edit actions
function leaderboard_points_results_post_action() {	
	global $wpdb;
	global $id;
	
	global $deletescoreid;
	global $listaction2;
	
	if (!empty($_GET['action'])) {
		$listaction2 = $_GET['action'];
		if(isset($_GET['deletescoreid'])) {
			$deletescoreid = $_GET['deletescoreid'];
		}
		if($listaction2 == "listaction2") {
				handle_points_results_delete2();
				exit;
		}
	}
	
	
	
	
	if (!empty($_POST['listaction'])) {
		$listaction = $_POST['listaction'];
		if(isset($_POST['pointsresultsdeleteid'])) {
			$id = $_POST['pointsresultsdeleteid'];
		}
		if(isset($_POST['downloadcsvid'])) {
			$id = $_POST['downloadcsvid'];
		}
		switch($listaction) {
			case 'pointsresultsdelete':
				handle_points_results_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-points-results-list.php');	
				break;
			case 'download_csv':
				handle_downlaod_csv();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-points-results-list.php');	
				break;	
			}			
	} else {
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-points-results-list.php');	
	}	
}

//Delete leaderboard points results
function handle_points_results_delete() {
	
	global $wpdb;
	if(isset($_POST['pointsresultsdeleteid'])) {
		$id = $_POST['pointsresultsdeleteid'];
		$sql = "DELETE FROM " . $wpdb->prefix . "lbv4_results WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-points-results-list.php');
		exit;
	}	
	
}
function handle_points_results_delete2() {
	global $wpdb;
	if(isset($_GET['deletescoreid'])) {
		$deletescoreid = $_GET['deletescoreid'];
		$sql = "DELETE FROM " . $wpdb->prefix . "lbv4_results WHERE id =$deletescoreid";
		$wpdb->query($sql);
		echo "<p style='margin-top:20px;'>Score id ".$deletescoreid." has been Deleted. <a class='btn btn-primary' href='".site_url()."/wp-admin/admin.php?page=points_results'>Return</a></p>";
		exit;
	}	
	
}
//Delete leaderboard points results

function handle_downlaod_csv() {

  

    global $wpdb;

    $sql = "SELECT * FROM " . $wpdb->prefix . "lbv4_results";

    $rows = $wpdb->get_results($sql, 'ARRAY_A');

    if ($rows) {

        $csv_fields = array();
        $csv_fields[] = "first_column";
        $csv_fields[] = 'second_column';
		$csv_fields[] = 'third_column';
		$csv_fields[] = 'fourth_column';
		$csv_fields[] = 'fifth_column';

        $output_filename = 'file_name' .'.csv';
        $output_handle = @fopen('php://output', 'w');

        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename=' . 
        $output_filename);
        header('Expires: 0');
        header('Pragma: public');

        $first = true;
       // Parse results to csv format
        foreach ($rows as $row) {

       // Add table headers
            if ($first) {

               $titles = array();

                foreach ($row as $key => $val) {

                    $titles[] = $key;

                }

                fputcsv($output_handle, $titles);

                $first = false;
            }

            $leadArray = (array) $row; // Cast the Object to an array
            // Add row to file
            fputcsv($output_handle, $leadArray);
        }

        //echo '<a href="'.$output_handle.'">test</a>';

        // Close output file stream
        fclose($output_handle);

        die();
    }

}





/*
function handle_downlaod_csv() {
	global $wpdb;					
	$MyQuery = $wpdb->get_results($wpdb->prepare('SELECT id, dealer, sales_person FROM ' . $wpdb->prefix . 'lbv4_results Group by ID'));
	if (! $MyQuery) {
	$Error = $wpdb->print_error();
	die("The following error was found: $Error");
	} else {
	$csv_fields=array();
	$csv_fields[] = 'Field Name 1';
	$csv_fields[] = 'Field Name 2';
	$csv_fields[] = 'Field Name 3';
	$output_filename = 'MyReport.csv';
	$output_handle = @fopen( 'php://output', 'w' );
	header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
	header( 'Content-Description: File Transfer' );
	header( 'Content-type: text/csv' );
	header( 'Content-Disposition: attachment; filename=' . $output_filename );
	header( 'Expires: 0' );
	header( 'Pragma: public' );	
	fputcsv( $output_handle, $csv_fields );
	foreach ($MyQuery as $Result) {
		$leadArray = (array) $Result; // Cast the Object to an array
		fputcsv( $output_handle, $leadArray );
		}
	fclose( $output_handle ); 
	die();
	}	
}
*/
?>