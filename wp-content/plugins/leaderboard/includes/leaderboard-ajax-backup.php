<?php
function ah_test_script() {
	wp_enqueue_script('ajaxcall-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
	wp_enqueue_script('ajaxcall-js', plugins_url() . '/leaderboard/js/ajaxcall.js');
	wp_localize_script( 'ajaxcall-js', 'myajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );
}

add_action('wp_enqueue_scripts', 'ah_test_script');




function ach_ajax_action() {
	global $wpdb;
	$valid = true;
	$myvalue = $_POST['post_id'];
	$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_names WHERE dealerid =$myvalue";
	$formData = $wpdb-> get_results($SQL);
	
	
	if (!$formData) {
		$valid = false;
		echo '<label>Names </label>';
		echo '<select>';
		echo '<option>No results</option>';
		echo '</select>';
		die();
	}
?>	
	<label>Names</label>
    <!--<select id="name" class="leaderboard-form-input">-->
    <select name="sales_person" id="name" class="leaderboard-form-input" required >
<?php	
	if($valid) {
			foreach ($wpdb->get_results($SQL) as $key => $row) {
				$id = $row->id;
				$firstname = $row->firstname;
				$lastname = $row->lastname;
?>
				<option value="<?php echo $firstname . " " . $lastname . " " . $row->id; ?>"><?php echo $firstname . " " . $lastname; ?></option>
                
<?php			
			}
			die();	
	}
?>
</select>

<?php

} //end ah_ajax_action

add_action('wp_ajax_my_ajax_action_2', 'ach_ajax_action');
add_action('wp_ajax_nopriv_my_ajax_action_2', 'ach_ajax_action');








function ach_ajax_action_3() {
	$myvalue2 = $_POST['post_id'];
	
	
	if(isset($_POST['pointsresultsdelete'])) {
		$delete_points = $_POST['pointsresultsdelete'];
		echo "run the script" . $delete_points;
	}
	
	//Count the admin scores
	global $wpdb;
	$valid = true;
	$SQL4 = "SELECT * FROM " . $wpdb->prefix . "lb_point_types;";
	$formData4 = $wpdb-> get_results($SQL4);
	
	
	if (!$formData4) {
		$valid = false;
		echo $error =  '<p>No results to display</p>';
	}
	
	// count the number of results in lb_email_results - then display the insert button
	$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_point_types;");
	
	
	$SQL = "SELECT * FROM " . $wpdb->prefix . "lbv4_results WHERE sales_person = '$myvalue2';";
	
	$formData = $wpdb-> get_results($SQL);


	if (!$formData) {
		$valid = false;
		echo $error =  '<p>No results to display</p>';
	}
	?>
	<div class="points_table_width">
    
    <form action="" method="post" >
    <input type="hidden" name="downloadcsvid" value="<?php echo $id; ?>">
    
    <?php
    echo '<a class="pull-right btn btn-primary" href="' . site_url() . '/download.php?id=' . $myvalue2 . '&count=' . $numRows . '">Download CSV</a>';
    ?>
    
    </form>
    
    <table id="points_table" class="table" style="width:100%; margin-top:15px; float:left;">
<tr class="info">
	<th>Name</th>
    <th>Dealer</th>
    <th>Customer Name</th>
    <th>Order Date</th>
    <?php
	
	global $wpdb;
	$valid = true;
	$SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_types;";
	$formData3 = $wpdb-> get_results($SQL3);
	
	
	if (!$formData3) {
		$valid = false;
		echo $error =  '<p>No results to display</p>';
	}
	
	
	if($valid) {
			foreach ($wpdb->get_results($SQL3) as $key => $row) {
				$id = $row->id;
				$description = $row->description;
				$points = $row->points;
				?>
					
						<?php echo "<th>" . $description . "</th>"; ?>
		  
				<?php		
			}
	}
	
	 /*
	if($numRows == 1) { echo "<th>Points_1</th>"; }
	elseif($numRows == 2) { echo "<th>Points_1</th><th>Points_2</th>"; }
	elseif($numRows == 3) { echo "<th>Points_1</th><th>Points_2</th><th>Points_3</th>"; }
	elseif($numRows == 4) { echo "<th>Points_1</th><th>Points_2</th><th>Points_3</th><th>Points_4</th>"; }
	elseif($numRows == 5) { echo "<th>Points_1</th><th>Points_2</th><th>Points_3</th><th>Points_4</th><th>Points_5</th>"; }
	elseif($numRows == 6) { echo "<th>Points_1</th><th>Points_2</th><th>Points_3</th><th>Points_4</th><th>Points_5</th><th>Points_6</th>"; }
	elseif($numRows == 7) { echo "<th>Points_1</th><th>Points_2</th><th>Points_3</th><th>Points_4</th><th>Points_5</th><th>Points_6</th><th>Points_7</th>"; }
	elseif($numRows == 8) { echo "<th>Points_1</th><th>Points_2</th><th>Points_3</th><th>Points_4</th><th>Points_5</th><th>Points_6</th><th>Points_7</th><th>Points_8</th>"; }
	elseif($numRows == 9) { echo "<th>Points_1</th><th>Points_2</th><th>Points_3</th><th>Points_4</th><th>Points_5</th><th>Points_6</th><th>Points_7</th><th>Points_8</th><th>Points_9</th>"; }
	elseif($numRows == 10) { echo "<th>Points_1</th><th>Points_2</th><th>Points_3</th><th>Points_4</th><th>Points_5</th><th>Points_6</th><th>Points_7</th><th>Points_8</th><th>Points_9</th><th>Points_10</th>"; }
	*/
	?>
	<th>Total</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL) as $key => $row) {
			$id = $row->id;
			$name = $row->sales_person;
			$dealer = $row->dealer;
			$customername = $row->customername;
			$orderdate = $row->orderdate;
			
			$points_1 = $row->points_1;
			$points_2 = $row->points_2;
			$points_3 = $row->points_3;
			$points_4 = $row->points_4;
			$points_5 = $row->points_5;
			$points_6 = $row->points_6;
			$points_7 = $row->points_7;
			$points_8 = $row->points_8;
			$points_9 = $row->points_9;
			$points_10 = $row->points_10;
			$points_11 = $row->points_11;
			$points_12 = $row->points_12;
			$points_13 = $row->points_13;
			$points_14 = $row->points_14;
			$points_15 = $row->points_15;
			$points_16 = $row->points_16;
			$points_17 = $row->points_17;
			$points_18 = $row->points_18;
			$points_19 = $row->points_19;
			$points_20 = $row->points_20;
			
			$p1 = $points_1;
			$p2 = $points_1 + $points_2;
			$p3 = $points_1 + $points_2 + $points_3;
			$p4 = $points_1 + $points_2 + $points_3 + $points_4;
			$p5 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5;
			$p6 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6;
			$p7 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7;
			$p8 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8;
			$p9 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9;
			$p10 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10;
			$p11 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11;
			$p12 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12;
			$p13 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12 + $points_13;
			$p14 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12 + $points_13 + $points_14;
			$p15 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12 + $points_13 + $points_14 + $points_15;
			$p16 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12 + $points_13 + $points_14 + $points_15 + $points_16;
			$p17 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12 + $points_13 + $points_14 + $points_15 + $points_16 + $points_17;
			$p18 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12 + $points_13 + $points_14 + $points_15 + $points_16 + $points_17 + $points_18;
			$p19 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12 + $points_13 + $points_14 + $points_15 + $points_16 + $points_17 + $points_18 + $points_19;
			$p20 = $points_1 + $points_2 + $points_3 + $points_4 + $points_5 + $points_6 + $points_7 + $points_8 + $points_9 + $points_10 + $points_11 + $points_12 + $points_13 + $points_14 + $points_15 + $points_16 + $points_17 + $points_18 + $points_19 + $points_20;
			?>
            <tr>
            	<form action="http://hosegood.10995.co.uk/wp-admin/admin.php?page=points_results" method="post">
                    <input type="hidden" name="listaction" value="edit">
                    <input type="hidden" name="leaderboardid" value="<?php echo $id; ?>">
                    <td><?php echo $name; ?></td>
                    <td><?php echo $dealer; ?></td>
                    <td><?php echo $customername; ?></td>
                    <td><?php echo $orderdate; ?></td>
                    <?php
                     if($numRows == 1) { echo "<th>" . $points_1 . "</th><th class='points-total'>" . $p1 . "</th>"; }
					elseif($numRows == 2) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th class='points-total'>" . $p2 . "</th>"; }
					elseif($numRows == 3) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th class='points-total'>" . $p3 . "</th>"; }
					elseif($numRows == 4) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th class='points-total'>" . $p4 . "</th>"; }
					elseif($numRows == 5) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th class='points-total'>" . $p5 . "</th>"; }
					elseif($numRows == 6) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th class='points-total'>" . $p6 . "</th>"; }
					elseif($numRows == 7) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th class='points-total'>" . $p7 . "</th>"; }
					elseif($numRows == 8) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th class='points-total'>" . $p8 . "</th>"; }
					elseif($numRows == 9) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th class='points-total'>" . $p9 . "</th>"; }
					elseif($numRows == 10) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th class='points-total'>" . $p10 . "</th>"; }
					elseif($numRows == 11) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th class='points-total'>" . $p11 . "</th>"; }
					elseif($numRows == 12) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th class='points-total'>" . $p12 . "</th>"; }
					elseif($numRows == 13) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th>" . $points_13 . "</th><th class='points-total'>" . $p13 . "</th>"; }
					elseif($numRows == 14) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th>" . $points_13 . "</th><th>" . $points_14 . "</th><th class='points-total'>" . $p14 . "</th>"; }
					elseif($numRows == 15) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th>" . $points_13 . "</th><th>" . $points_14 . "</th><th>" . $points_15 . "</th><th class='points-total'>" . $p15 . "</th>"; }
					elseif($numRows == 16) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th>" . $points_13 . "</th><th>" . $points_14 . "</th><th>" . $points_15 . "</th><th>" . $points_16 . "</th><th class='points-total'>" . $p16 . "</th>"; }
					elseif($numRows == 17) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th>" . $points_13 . "</th><th>" . $points_14 . "</th><th>" . $points_15 . "</th><th>" . $points_16 . "</th><th>" . $points_17 . "</th><th class='points-total'>" . $p17 . "</th>"; }
					elseif($numRows == 18) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th>" . $points_13 . "</th><th>" . $points_14 . "</th><th>" . $points_15 . "</th><th>" . $points_16 . "</th><th>" . $points_17 . "</th><th>" . $points_18 . "</th><th class='points-total'>" . $p18 . "</th>"; }
					elseif($numRows == 19) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th>" . $points_13 . "</th><th>" . $points_14 . "</th><th>" . $points_15 . "</th><th>" . $points_16 . "</th><th>" . $points_17 . "</th><th>" . $points_18 . "</th><th>" . $points_19 . "</th><th class='points-total'>" . $p19 . "</th>"; }
					elseif($numRows == 20) { echo "<th>" . $points_1 . "</th><th>" . $points_2 . "</th><th>" . $points_3 . "</th><th>" . $points_4 . "</th><th>" . $points_5 . "</th><th>" . $points_6 . "</th><th>" . $points_7 . "</th><th>" . $points_8 . "</th><th>" . $points_9 . "</th><th>" . $points_10 . "</th><th>" . $points_11 . "</th><th>" . $points_12 . "</th><th>" . $points_13 . "</th><th>" . $points_14 . "</th><th>" . $points_15 . "</th><th>" . $points_16 . "</th><th>" . $points_17 . "</th><th>" . $points_18 . "</th><th>" . $points_19 . "</th><th>" . $points_20 . "</th><th class='points-total'>" . $p20 . "</th>"; }
					else { "There was an error!"; }
					?>
              
                    <td>
                    	<div class="btn-group" role="group">
                        	<input type="hidden" name="pointsresultsdeleteid" value="<?php echo $id; ?>">
                            <!--<button type="submit" id="menu3" name="listaction" value="pointsresultsdelete" class="btn btn-primary glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete?')"></button>-->
                             <a href="http://hosegood.10995.co.uk/wp-admin/admin.php?page=points_results&deletescoreid=<?php echo $id; ?>&action=listaction2" onclick="return confirm('Are you sure you want to delete?')"><span class="btn btn-primary glyphicon glyphicon-trash"></span></a>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
</div>
<!-- End Dealer Admin -->
</div>
</div>
	
	<?php
	die();
	
	} //end ah_ajax_action_3
	
	add_action('wp_ajax_my_ajax_action_3', 'ach_ajax_action_3');
	add_action('wp_ajax_nopriv_my_ajax_action_3', 'ach_ajax_action_3');
	//End count the admin scores
	
	
	
	function ah_save_reorder() {
			$order = $_POST['order'];
			$menu_order = 0;
			//print_r($order);
			foreach($order as $item_id) {
				$post = array(
					'id' => (int)$item_id,
					'menu_order' => $menu_order
				);
				//echo "<pre>";
				//echo print_r($post);
				//echo "</pre>";
				
				$menu_order++;
				
				global $wpdb;
				$table = $wpdb->prefix . 'lb_point_types';
				$wpdb->update(
					$table, //Table
					array('menu_order' => $menu_order ), //Variables
					array('id' =>$item_id,), //Where
					array('%s'), //data format
					array('%s') // Where format
				);
			}
			include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	}

	add_action('wp_ajax_save_sort', 'ah_save_reorder');
	
	
	
	function ah_save_reorder_dealer() {
			$order = $_POST['order'];
			$menu_order = 0;
			foreach($order as $item_id) {
				$post = array(
					'id' => (int)$item_id,
					'menu_order' => $menu_order
				);
				
				$menu_order++;
				
				global $wpdb;
				$table = $wpdb->prefix . 'lb_dealers';
				$wpdb->update(
					$table, //Table
					array('menu_order' => $menu_order ), //Variables
					array('id' =>$item_id,), //Where
					array('%s'), //data format
					array('%s') // Where format
				);
			}
			include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	}

	add_action('wp_ajax_save_sort_dealer', 'ah_save_reorder_dealer');




?>