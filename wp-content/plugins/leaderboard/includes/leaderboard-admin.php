<?php

add_action('admin_menu','ah_leaderboard_admin_menu');

		function ah_leaderboard_admin_menu () {
			add_menu_page(
				'Leaderboard',
				'Leaderboard',
				'edit_plugins',   //manage_options  https://solislab.com/blog/ultimate-guide-to-roles-and-capabilities/
				'leaderboard_list',
				'leaderboard_list',
				'dashicons-calendar-alt'
			);
		/*
			add_submenu_page (
				'leaderboard_list',
				'Add New Leaderboard Item',
				'Add New',
				'manage_options',
				'leaderboard_insert',
				'leaderboard_insert'	
			);
			*/
	
}


//Display the leaderboard action page
function leaderboard_list() {
	global $wpdp;
	if (!current_user_can('edit_plugins')) {
		wp_die('You do not have sufficient permissions');	
	}
	leaderboard_post_action();
}


//Handle edit actions
function leaderboard_post_action() {
	global $wpdb;
	global $id;
	if (!empty($_POST)) {
		$listaction = sanitize_text_field($_POST['listaction']);
		if(isset($_POST['leaderboardid'])) {
			$id = sanitize_text_field($_POST['leaderboardid']);
		}
		if(isset($_POST['leaderboardnamesid'])) {
			$id = sanitize_text_field($_POST['leaderboardnamesid']);
		}
		if(isset($_POST['leaderboardscoresid'])) {
			$id = sanitize_text_field($_POST['leaderboardscoresid']);
		}
		if(isset($_POST['leaderboardscoreslabelid'])) {
			$id = sanitize_text_field($_POST['leaderboardscoreslabelid']);
		}
		if(isset($_POST['leaderboardemailid'])) {
			$id = sanitize_text_field($_POST['leaderboardemailid']);
		}
		if(isset($_POST['leaderboardemailfromid'])) {
			$id = sanitize_text_field($_POST['leaderboardemailfromid']);
		}
		if(isset($_POST['leaderboardemailresultsid'])) {
			$id = sanitize_text_field($_POST['leaderboardemailresultsid']);
		}
		if(isset($_POST['leaderboardweeksid'])) {
			$id = sanitize_text_field($_POST['leaderboardweeksid']);
		}
		if(isset($_POST['leaderboardlimitid'])) {
			$id = sanitize_text_field($_POST['leaderboardlimitid']);
		}
		if(isset($_POST['leaderboardservertimeid'])) {
			$id = sanitize_text_field($_POST['leaderboardservertimeid']);
		}
		if(isset($_POST['leaderboardscoressubheaderid'])) {
			$id = sanitize_text_field($_POST['leaderboardscoressubheaderid']);
		}
		if(isset($_POST['scoreid'])) {
			$scoreid = sanitize_text_field($_POST['scoreid']);
		}
		if(isset($_POST['db_value'])) {
			$db_value = sanitize_text_field($_POST['db_value']);
		}
		
		switch($listaction) {
			case 'insert':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert.php');
				break;
			case 'insert-name':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-name.php');
				break;
			case 'insert-score':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-score.php');
				break;
			case 'insert-score-select':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-score-select.php');
				break;	
			case 'insert-email-from':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-email-from.php');
				break;	
			case 'insert-email-subject':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-email-subject.php');
				break;
			case 'insert-email-results':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-email-results.php');
				break;
			case 'insert-weeks':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-weeks.php');
				break;
			case 'insert-limit':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-limit.php');
				break;
			case 'insert-time':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-time.php');
				break;	
			case 'insert-score-label':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-score-label.php');
				break;
			case 'insert-score-subheader-label':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-insert-score-subheader-label.php');
				break;	
			case 'edit':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit.php');
				break;
			case 'edit-names':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-names.php');
				break;
			case 'edit-scores-1':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-scores.php');
				break;
			case 'edit-scores-2':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-scores-2.php');
				break;	
			case 'edit-score-label':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-score-label.php');
				break;
			case 'edit-score-subheader-label':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-score-subheader-label.php');
				break;	
			case 'edit-email-from':
				//echo "This is the edit email page";
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-email-from.php');
				break;	
			case 'edit-email-subject':
				//echo "This is the edit email page";
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-email-subject.php');
				break;
			case 'edit-email-results':
				//echo "This is the edit email page";
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-email-results.php');
				break;
			case 'edit-weeks':
				//echo "This is the edit email page";
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-weeks.php');
				break;
			case 'edit-limit':
				//echo "This is the edit email page";
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-limit.php');
				break;
			case 'edit-time':
				//echo "This is the edit time page";
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-edit-time.php');
				break;													
			case 'list':
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
				break;
			case 'handleupdate':
				handle_leaderboard_update();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
				break;
			case 'handlenamesupdate':
				handle_leaderboard_names_update();
				break;
			case 'handlescoresupdate':
				handle_leaderboard_scores_update();
				break;
			case 'handlescoresupdate2':
				handle_leaderboard_scores_update_2();
				break;	
			case 'handlescoreslabelupdate':
				handle_leaderboard_label_scores_update();
				break;
			case 'handlescoressubheaderupdate':
				handle_leaderboard_subheader_scores_update();
				break;	
			case 'handleemailupdate':
				handle_leaderboard_email_update();
				break;
			case 'handleemailfromupdate':
				handle_leaderboard_email_from_update();
				break;	
			case 'handleemailresultsupdate':
				handle_leaderboard_email_results_update();
				break;
			case 'handletimeupdate':
				handle_leaderboard_time_update();
				break;		
			case 'handlelimitupdate':
				handle_leaderboard_limit_update();
				break;	
			case 'handleweeksupdate':
				handle_leaderboard_weeks_update();
				break;							
			case 'handledelete':
				handle_leaderboard_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
				break;
			case 'handlenamesdelete':
				handle_leaderboard_names_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;
			case 'handlescoresdelete':
				handle_leaderboard_scores_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;
			case 'handlescoreslabeldelete':
				handle_leaderboard_label_scores_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;
			case 'handlescoressubheaderdelete':
				handle_leaderboard_label_subheader_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;	
			case 'handleemailresultsdelete':
				handle_leaderboard_email_results_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;	
			case 'handleemaildelete':
				handle_leaderboard_email_subject_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;
			case 'handleemailfromdelete':
				handle_leaderboard_email_from_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;
			case 'handleweeksdelete':
				handle_leaderboard_weeks_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;
			case 'handlelimitdelete':
				handle_leaderboard_limit_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;
			case 'handletimedelete':
				handle_leaderboard_time_delete();
				include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');	
				break;												
			case 'handleinsert':	
				handle_leaderboard_insert();
				break;
			case 'handleinsertname':	
				handle_leaderboard_insert_name();
				break;
			case 'handleinsertscore':	
				handle_leaderboard_insert_score();
				break;
			case 'handleinsertscoreselect':	
				handle_leaderboard_insert_score_select();
				break;	
			case 'handleinsertscoreheading':	
				handle_leaderboard_insert_score_heading();
				break;
			case 'handleinsertscoresubheader':	
				handle_leaderboard_insert_score_subheader();
				break;	
			case 'handleinsertemailsubject':	
				handle_leaderboard_insert_email_subject();
				break;
			case 'handleinsertemailfrom':	
				handle_leaderboard_insert_email_from();
				break;	
			case 'handleinsertemailaddress':	
				handle_leaderboard_insert_email_address();
				break;
			case 'handleinsertweek':	
				handle_leaderboard_insert_week();
				break;
			case 'handleinsertlimit':	
				handle_leaderboard_insert_limit();
				break;
			case 'handleinserttime':	
				handle_leaderboard_insert_time();
				break;	
			case 'reorderscore':	
				handle_leaderboard_reorder_score();
				break;
			case 'reorderdealers':	
				handle_leaderboard_reorder_dealers();
				break;	
			case 'databaseupdate':	
				handle_leaderboard_database_update();
				break;
			case 'insert_db':	
				handle_leaderboard_database_insert();
				break;												
			default:
				echo "<h2>Nothing found!</h2>";
		}
	} else {
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	}
}


//Delete a dealer
function handle_leaderboard_delete() {
	global $wpdb;
	
	if(isset($_POST['leaderboardid'])) {
		$id = sanitize_text_field($_POST['leaderboardid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_dealers WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
}

//Delete a name
function handle_leaderboard_names_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardeditid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardeditid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_names WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
}

//Delete a score
function handle_leaderboard_scores_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardscoresid'])) {
		$scoreid = sanitize_text_field($_POST['scoreid']);
		$score_key = "points_" . $scoreid; //key value for deleting scores from results table
		$id = sanitize_text_field($_POST['leaderboardscoresid']);
		
		//Delete the score
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_point_types WHERE id =$id";
		$wpdb->query($sql);
		
		
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
	
}

//Delete a label subheader
function handle_leaderboard_label_subheader_delete() {
	global $wpdb;
	
	if(isset($_POST['leaderboardscoressubheaderid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardscoressubheaderid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_point_subheading WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
}

//Delete a score label
function handle_leaderboard_label_scores_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardscoreslabelid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardscoreslabelid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_point_heading WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
	
}

//Delete an email From
function handle_leaderboard_email_from_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardemailfromid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardemailfromid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_email_from WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
	
	
}


//Delete an email subject
function handle_leaderboard_email_subject_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardemailid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardemailid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_email WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
	
}


//Delete an email address
function handle_leaderboard_email_results_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardemailresultsid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardemailresultsid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_email_results WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
	
}



//Delete a week
function handle_leaderboard_weeks_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardweeksid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardweeksid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_weeks WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
	
}


//Delete a leaderboard limit
function handle_leaderboard_limit_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardlimitid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardlimitid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_limit WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
	
}




//Delete a custom time value
function handle_leaderboard_time_delete() {
	
	global $wpdb;
	
	if(isset($_POST['leaderboardtimeid'])) {
		
		$id = sanitize_text_field($_POST['leaderboardtimeid']);
		$sql = "DELETE FROM " . $wpdb->prefix . "lb_dbtime WHERE id =$id";
		$wpdb->query($sql);
		include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
		exit;
	}
	
}




//Insert new dealer
function handle_leaderboard_insert() {
	global $wpdb;
	$table = $wpdb->prefix . 'lb_dealers';
	
	if(isset($_POST['dealer'])) {
		$dealer = sanitize_text_field($_POST['dealer']);
		$dealer = preg_replace('/[0-9]+/', '', $dealer);
	}
	
	$wpdb->insert(
		$table, //Table
		array('dealer' => $dealer ), //Variables
		array('%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
}





//Insert new name
function handle_leaderboard_insert_name() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_names';
	
	if(isset($_POST['firstname'])) {
		$firstname = sanitize_text_field($_POST['firstname']);
		$firstname = preg_replace('/[0-9]+/', '', $firstname);
		$firstname = str_replace(' ', '', $firstname);
	}
	if(isset($_POST['lastname'])) {
		$lastname = sanitize_text_field($_POST['lastname']);
		$lastname = preg_replace('/[0-9]+/', '', $lastname);
		$lastname = str_replace(' ', '', $lastname);
	}	
	
	$wpdb->insert(
		$table, //Table
		array('firstname' => $firstname, 'lastname' => $lastname ), //Variables
		array('%s','%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}


//Insert new email from
function handle_leaderboard_insert_email_from() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_email_from';
	
	if(isset($_POST['from_name'])) {
		$from_name = sanitize_text_field($_POST['from_name']);
	}
	if(isset($_POST['from_email'])) {
		$from_email = sanitize_text_field($_POST['from_email']);
	}
		
	
	$wpdb->insert(
		$table, //Table
		array('from_name' => $from_name, 'from_email' => $from_email ), //Variables
		array('%s','%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}



//Insert new email subject
function handle_leaderboard_insert_email_subject() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_email';
	
	if(isset($_POST['subject'])) {
		$subject = sanitize_text_field($_POST['subject']);
	}
	
	$wpdb->insert(
		$table, //Table
		array('subject' => $subject), //Variables
		array('%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}





//Insert new email subject
function handle_leaderboard_insert_email_address() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_email_results';
	
	if(isset($_POST['email_address'])) {
		$email_address = sanitize_text_field($_POST['email_address']);
	}	
	
	$wpdb->insert(
		$table, //Table
		array('email_address' => $email_address), //Variables
		array('%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}





//Insert new week
function handle_leaderboard_insert_week() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_weeks';
	
	if(isset($_POST['week'])) {
		$week = sanitize_text_field($_POST['week']);
	}
	if(isset($_POST['start_date'])) {
		$start_date = sanitize_text_field($_POST['start_date']);
	}
	if(isset($_POST['end_date'])) {
		$end_date = sanitize_text_field($_POST['end_date']);
	}
	if(isset($_POST['epoch_timestamp'])) {
		$epoch_timestamp = sanitize_text_field($_POST['epoch_timestamp']);
	}
	
	$wpdb->insert(
		$table, //Table
		array('week' => $week, 'start_date' => $start_date, 'end_date' => $end_date, 'epoch_timestamp' => $epoch_timestamp ), //Variables 
		array('%s','%s','%s','%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;

}





//Insert new leaderboard limit
function handle_leaderboard_insert_limit() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_limit';
	
	if(isset($_POST['leaderboard_limit'])) {
		$leaderboard_limit = sanitize_text_field($_POST['leaderboard_limit']);
	}
	
	$wpdb->insert(
		$table, //Table
		array('leaderboard_limit' => $leaderboard_limit ), //Variables 
		array('%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;

}





//Insert new custom time
function handle_leaderboard_insert_time() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_dbtime';
	
	if(isset($_POST['show_time'])) {
		$show_time = sanitize_text_field($_POST['show_time']);
	}
	if(isset($_POST['server_time'])) {
		$server_time = sanitize_text_field($_POST['server_time']);
	}
	
	$wpdb->insert(
		$table, //Table
		array('show_time' => $show_time, 'server_time' => $server_time ), //Variables 
		array('%s', '%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}





//Insert new tickbox score
function handle_leaderboard_insert_score() {
	
	global $wpdb;
	
	//Grab the results from lb_point_types
	$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_point_types";
		$rowcount = count($wpdb->get_results($SQL));
		
		$rowcount;
		$scoreID = $rowcount + 1;
		$menu_order = $rowcount + 1;
	
	$table = $wpdb->prefix . 'lb_point_types';
	
	if(isset($_POST['description'])) {
		 $description = sanitize_text_field($_POST['description']);
	}
	if(isset($_POST['points'])) {
		 $points = sanitize_text_field($_POST['points']);
	}
	if(isset($_POST['display'])) {
		 $display = sanitize_text_field($_POST['display']);
	}
	if(isset($_POST['show_subheader'])) {
		 $show_subheader = sanitize_text_field($_POST['show_subheader']);
	}
	if(isset($_POST['scoretype'])) {
		 $scoretype = sanitize_text_field($_POST['scoretype']);
	}		
	
	$wpdb->insert(
		$table, //Table
		array('description' => $description, 'points' => $points, 'display' => $display, 'scoreID' => $scoreID, 'scoretype' => $scoretype, 'show_subheader' => $show_subheader, 'menu_order' => $menu_order ), //Variables
		array('%s','%s','%s','%s','%s','%s','%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
	
}






//Insert new select score
function handle_leaderboard_insert_score_select() {
	echo "this is the select menu add page";
	
	global $wpdb;
	
	//Grab the results from lb_point_types
	$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_point_types";
		$rowcount = count($wpdb->get_results($SQL));
		
		$rowcount;
		$scoreID = $rowcount + 1;
		$menu_order = $rowcount + 1;
	
	$table = $wpdb->prefix . 'lb_point_types';
	
	if(isset($_POST['description'])) {
		 $description = sanitize_text_field($_POST['description']);
	}
	if(isset($_POST['points2'])) {
		 $points2 = sanitize_text_field($_POST['points2']);
	}
	if(isset($_POST['points3'])) {
		 $points3 = sanitize_text_field($_POST['points3']);
	}
	if(isset($_POST['points4'])) {
		 $points4 = sanitize_text_field($_POST['points4']);
	}
	if(isset($_POST['points5'])) {
		 $points5 = sanitize_text_field($_POST['points5']);
	}
	if(isset($_POST['points6'])) {
		 $points6 = sanitize_text_field($_POST['points6']);
	}
	if(isset($_POST['display'])) {
		 $display = sanitize_text_field($_POST['display']);
	}
	if(isset($_POST['show_subheader'])) {
		 $show_subheader = sanitize_text_field($_POST['show_subheader']);
	}
	if(isset($_POST['scoretype'])) {
		 $scoretype = sanitize_text_field($_POST['scoretype']);
	}
	echo $points2 . $points3 . $points4 . $points5 . $points6;
	
	//exit;		
	
	$wpdb->insert(
		$table, //Table
		array('description' => $description, 'points2' => $points2, 'points3' => $points3, 'points4' => $points4, 'points5' => $points5, 'points6' => $points6, 'display' => $display, 'scoreID' => $scoreID, 'scoretype' => $scoretype, 'show_subheader' => $show_subheader, 'menu_order' => $menu_order ), //Variables
		array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
	
}






//Insert new score heading
function handle_leaderboard_insert_score_heading() {
	
	global $wpdb;
	
	$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_point_heading";
		$rowcount = count($wpdb->get_results($SQL));
		

	
	$table = $wpdb->prefix . 'lb_point_heading';
	
	if(isset($_POST['id'])) {
		 $id = sanitize_text_field($_POST['id']);
	}
	
	if(isset($_POST['heading'])) {
		 $heading = sanitize_text_field($_POST['heading']);
	}
	
	
	$wpdb->insert(
		$table, //Table
		array('heading' => $heading ), //Variables
		array('%s') //data format
	);
	
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}

//Insert new score subheader
function handle_leaderboard_insert_score_subheader() {
	global $wpdb;
	
	$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_point_subheading";
	$rowcount = count($wpdb->get_results($SQL));

	$table = $wpdb->prefix . 'lb_point_subheading';
	
	if(isset($_POST['id'])) {
		 $id = sanitize_text_field($_POST['id']);
	}
	
	if(isset($_POST['subheader'])) {
		 $subheader = sanitize_text_field($_POST['subheader']);
	}
	
	
	$wpdb->insert(
		$table, //Table
		array('subheader' => $subheader ), //Variables
		array('%s') //data format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
}

//Update a dealer
function handle_leaderboard_update() {
	global $wpdb;
	$table = $wpdb->prefix . 'lb_dealers';
	if(isset($_POST['leaderboardid'])) {
		 $id = sanitize_text_field($_POST['leaderboardid']);
	}
	if(isset($_POST['dealer'])) {
		 $dealer = sanitize_text_field($_POST['dealer']);
		 $dealer = preg_replace('/[0-9]+/', '', $dealer);//strip out numbers from dealer name (Numbers dont work)
	}
	
	
	
	$wpdb->update(
		$table, //Table
		array('dealer' => $dealer ), //Variables
		array('ID' =>$id), //Where
		array('%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
}





//Update a name
function handle_leaderboard_names_update() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_names';
	if(isset($_POST['leaderboardeditid'])) {
		 $id = sanitize_text_field($_POST['leaderboardeditid']);
	}
	if(isset($_POST['firstname'])) {
		 $firstname = sanitize_text_field($_POST['firstname']);
		 $firstname = preg_replace('/[0-9]+/', '', $firstname);
		 //$firstname = str_replace(' ', '', $firstname);
	}
	if(isset($_POST['lastname'])) {
		 $lastname = sanitize_text_field($_POST['lastname']);
		 $lastname = preg_replace('/[0-9]+/', '', $lastname);
		 //$lastname = str_replace(' ', '', $lastname);
	}
	if(isset($_POST['dealership'])) {
		echo $dealership = $_POST['dealership']; 
	}
	
	$dealername = preg_replace('/[0-9]+/', '', $dealership);
	$dealernumber = preg_replace("/[^0-9,.]/", "", $dealership);
	
	
	$wpdb->update(
		$table, //Table
		array('firstname' => $firstname, 'lastname' => $lastname, 'dealership' => $dealername, 'dealerid' => $dealernumber ), //Variables
		array('ID' =>$id), //Where
		array('%s', '%s', '%s', '%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}




//Update an email subject
function handle_leaderboard_email_update() {
	
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_email';
	if(isset($_POST['leaderboardemailid'])) {
		 $id = sanitize_text_field($_POST['leaderboardemailid']);
	}
	if(isset($_POST['subject'])) {
		 $subject = sanitize_text_field($_POST['subject']);
	}
	
	$wpdb->update(
		$table, //Table
		array('subject' => $subject), //Variables
		array('ID' =>$id), //Where
		array('%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
	
}

function handle_leaderboard_email_from_update() {
	global $wpdb;
	$table = $wpdb->prefix . 'lb_email_from';
	if(isset($_POST['leaderboardemailfromid'])) {
		 $id = sanitize_text_field($_POST['leaderboardemailfromid']);
	}
	if(isset($_POST['from_email'])) {
		 $from_email = sanitize_text_field($_POST['from_email']);
	}
	if(isset($_POST['from_name'])) {
		 $from_name = sanitize_text_field($_POST['from_name']);
	}
	
	
	$wpdb->update(
		$table, //Table
		array('from_email' => $from_email, 'from_name' => $from_name ), //Variables
		array('ID' =>$id), //Where
		array('%s','%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
}


//Update an email address
function handle_leaderboard_email_results_update() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_email_results';
	if(isset($_POST['leaderboardemailresultsid'])) {
		 $id = sanitize_text_field($_POST['leaderboardemailresultsid']);
	}
	if(isset($_POST['email_address'])) {
		 $email_address = sanitize_text_field($_POST['email_address']);
	}
	
	
	
	$wpdb->update(
		$table, //Table
		array('email_address' => $email_address), //Variables
		array('ID' =>$id), //Where
		array('%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
	
}




//Update leaderboard limit
function handle_leaderboard_limit_update() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_limit';
	if(isset($_POST['leaderboardlimitid'])) {
		 $id = sanitize_text_field($_POST['leaderboardlimitid']);
	}
	if(isset($_POST['leaderboard_limit'])) {
		 $leaderboard_limit = sanitize_text_field($_POST['leaderboard_limit']);
	}
	
	
	
	$wpdb->update(
		$table, //Table
		array('leaderboard_limit' => $leaderboard_limit), //Variables
		array('ID' =>$id), //Where
		array('%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
	
}




//Update weeks
function handle_leaderboard_weeks_update() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_weeks';
	if(isset($_POST['leaderboardweeksid'])) {
		 $id = sanitize_text_field($_POST['leaderboardweeksid']);
	}
	
	if(isset($_POST['week'])) {
		$week = sanitize_text_field($_POST['week']);
	}
	if(isset($_POST['start_date'])) {
		$start_date = sanitize_text_field($_POST['start_date']);
	}
	if(isset($_POST['end_date'])) {
		$end_date = sanitize_text_field($_POST['end_date']);
	}
	if(isset($_POST['epoch_timestamp'])) {
		$epoch_timestamp = sanitize_text_field($_POST['epoch_timestamp']);
	}
	
	$wpdb->update(
		$table, //Table
		array('week' => $week, 'start_date' => $start_date, 'end_date' => $end_date, 'epoch_timestamp' => $epoch_timestamp ), //Variables 
		array('ID' =>$id), //Where
		array('%s','%s','%s','%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}




//Update server time
function handle_leaderboard_time_update() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_dbtime';
	if(isset($_POST['leaderboardtimeid'])) {
		 $id = sanitize_text_field($_POST['leaderboardtimeid']);
	}
	
	if(isset($_POST['show_time'])) {
		$show_time = sanitize_text_field($_POST['show_time']);
	}
	if(isset($_POST['server_time'])) {
		$server_time = sanitize_text_field($_POST['server_time']);
	}
	
	$wpdb->update(
		$table, //Table
		array('show_time' => $show_time, 'server_time' => $server_time ), //Variables 
		array('ID' =>$id), //Where
		array('%s','%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
}





//Update a tickbox score
function handle_leaderboard_scores_update() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_point_types';
	if(isset($_POST['leaderboardscoresid'])) {
		 $id = sanitize_text_field($_POST['leaderboardscoresid']);
	}
	if(isset($_POST['scoreid'])) {
		 $scoreid = sanitize_text_field($_POST['scoreid']);
	}
	if(isset($_POST['description'])) {
		 $description = sanitize_text_field($_POST['description']);
	}
	if(isset($_POST['points'])) {
		 $points = sanitize_text_field($_POST['points']);
	}
	if(isset($_POST['display'])) {
		 $display = sanitize_text_field($_POST['display']);
	}
	if(isset($_POST['show_subheader'])) {
		 $show_subheader = sanitize_text_field($_POST['show_subheader']);
	}
	
	$wpdb->update(
		$table, //Table
		array('scoreid' => $scoreid, 'description' => $description, 'points' => $points, 'display' => $display, 'show_subheader' => $show_subheader  ), //Variables
		array('ID' =>$id), //Where
		array('%s', '%s', '%s', '%s', '%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
	
}



//Update a select menu score
function handle_leaderboard_scores_update_2() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_point_types';
	if(isset($_POST['leaderboardscoresid'])) {
		 $id = sanitize_text_field($_POST['leaderboardscoresid']);
	}
	if(isset($_POST['scoreid'])) {
		 $scoreid = sanitize_text_field($_POST['scoreid']);
	}
	if(isset($_POST['description'])) {
		 $description = sanitize_text_field($_POST['description']);
	}
	if(isset($_POST['points2'])) {
		 $points2 = sanitize_text_field($_POST['points2']);
	}
	if(isset($_POST['points3'])) {
		 $points3 = sanitize_text_field($_POST['points3']);
	}
	if(isset($_POST['points4'])) {
		 $points4 = sanitize_text_field($_POST['points4']);
	}
	if(isset($_POST['points5'])) {
		 $points5 = sanitize_text_field($_POST['points5']);
	}
	if(isset($_POST['points6'])) {
		 $points6 = sanitize_text_field($_POST['points6']);
	}
	if(isset($_POST['display'])) {
		 $display = sanitize_text_field($_POST['display']);
	}
	if(isset($_POST['show_subheader'])) {
		 $show_subheader = sanitize_text_field($_POST['show_subheader']);
	}
	
	$wpdb->update(
		$table, //Table
		array('scoreid' => $scoreid, 'description' => $description, 'points2' => $points2, 'points3' => $points3, 'points4' => $points4, 'points5' => $points5, 'points6' => $points6, 'display' => $display, 'show_subheader' => $show_subheader  ), //Variables
		array('ID' =>$id), //Where
		array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
	
}



function handle_leaderboard_subheader_scores_update() {
	global $wpdb;
	$table = $wpdb->prefix . 'lb_point_subheading';
	if(isset($_POST['leaderboardscoressubheaderid'])) {
		 $id = sanitize_text_field($_POST['leaderboardscoressubheaderid']);
	}
	if(isset($_POST['subheader'])) {
		 $subheader = sanitize_text_field($_POST['subheader']);
	}
	
	$wpdb->update(
		$table, //Table
		array('subheader' => $subheader  ), //Variables
		array('ID' =>$id), //Where
		array('%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
}



//Update a score label
function handle_leaderboard_label_scores_update() {
	
	global $wpdb;
	$table = $wpdb->prefix . 'lb_point_heading';
	if(isset($_POST['leaderboardscoreslabelid'])) {
		 $id = sanitize_text_field($_POST['leaderboardscoreslabelid']);
	}
	if(isset($_POST['heading'])) {
		 $heading = sanitize_text_field($_POST['heading']);
	}

	
	$wpdb->update(
		$table, //Table
		array('heading' => $heading ), //Variables
		array('ID' =>$id), //Where
		array('%s'), //data format
		array('%s') // Where format
	);
	include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
	exit;
	
	
}


// Reorder the scores
function handle_leaderboard_reorder_score() {
	
	?>
    <h2><?php _e('Re-Order Scores', 'ah-leaderboard'); ?> <img src="<?php echo esc_url(admin_url() . '/images/loading.gif'); ?>" id="loading-animation"></h2>
    <ul id = "custom-type-list">
    <?php
global $wpdb;

// Get values for the points type

$valid = true;
$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_point_types order by menu_order asc";
$formData = $wpdb-> get_results($SQL);
$array = array();
if (!$formData) {
	$valid = false;
	echo '<tr><td colspan="3" style="text-align:center;">No results to display!</td></tr>';
}
		if($valid) {
				foreach ($wpdb->get_results($SQL) as $key => $row) {
						
						$id = $row->id;
						$description = $row->description;
						$points = $row->points;
						$scoreID = $row->scoreID;
						$display = $row->display;
						$show_subheader = $row->show_subheader;
						?>
                        <li id="<?php echo $id; ?>"><?php echo $description; ?></li>
                        <?php
				}
		}
?>
</ul>
<a href="<?php echo admin_url() . "admin.php?page=leaderboard_list"; ?>" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Return</a>
<?php		

// Get values for the points type
	
}




// Reorder the dealers
function handle_leaderboard_reorder_dealers() {
	
	?>
    <h2><?php _e('Re-Order Dealers', 'ah-leaderboard'); ?> <img src="<?php echo esc_url(admin_url() . '/images/loading.gif'); ?>" id="loading-animation"></h2>
    <ul id = "custom-type-list-dealer">
    <?php
global $wpdb;

// Get values for the points type

$valid = true;
$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dealers order by menu_order asc";
$formData = $wpdb-> get_results($SQL);
$array = array();
if (!$formData) {
	$valid = false;
	echo '<tr><td colspan="3" style="text-align:center;">No results to display!</td></tr>';
}
		if($valid) {
				foreach ($wpdb->get_results($SQL) as $key => $row) {
						
						$id = $row->id;
						$dealer = $row->dealer;
						
						?>
                        <li id="<?php echo $id; ?>"><?php echo $dealer; ?></li>
                        <?php
				}
		}
?>
</ul>
<a href="<?php echo admin_url() . "admin.php?page=leaderboard_list"; ?>" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Return</a>
<?php		

// Get values for the points type
	
}




function handle_leaderboard_database_update() {
		global $wpdb;
		$table_name_1 = $wpdb->prefix.'lbv4_results';
		$table_name_2 = $wpdb->prefix.'lb_dbtime';
		$table_name_3 = $wpdb->prefix.'lb_dealers';
		$table_name_4 = $wpdb->prefix.'lb_email';
		$table_name_5 = $wpdb->prefix.'lb_email_from';
		$table_name_6 = $wpdb->prefix.'lb_email_results';
		$table_name_7 = $wpdb->prefix.'lb_limit';
		$table_name_8 = $wpdb->prefix.'lb_names';
		$table_name_9 = $wpdb->prefix.'lb_point_heading';
		$table_name_10 = $wpdb->prefix.'lb_point_subheading';
		$table_name_11 = $wpdb->prefix.'lb_point_types';
		$table_name_12 = $wpdb->prefix.'lb_weeks';
		$installed = 'Database installed';
		$notinstalled = 'Database not installed <span style="color:red;" class="glyphicon glyphicon-remove"></span>';
		?>
        	<table class="table" style="width:70%;">
            <tr class="info">
                <th>Database</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
		<?php
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_1'") != $table_name_1) {
			?>
               <tr>
            		<td><?php echo $table_name_1; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    	<form action="" method="post">
                        <input type="hidden" name="db_value" value="1">
                        <input type="hidden" name="listaction" value="insert_db">
                        <button class="btn btn-primary" value="Update" name="Update">Update</button>
                        </form>
                    </td>
            	</tr>
            <?php
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_1; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_2'") != $table_name_2) {
			 ?>
               <tr>
            		<td><?php echo $table_name_2; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    	<form action="" method="post">
                        <input type="hidden" name="db_value" value="2">
                        <input type="hidden" name="listaction" value="insert_db">
                        <button class="btn btn-primary" value="Update" name="Update">Update</button>
                        </form>
                    </td>
            	</tr>
            <?php
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_2; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_3'") != $table_name_3) {
			?>
               <tr>
            		<td><?php echo $table_name_3; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                        <form action="" method="post">
                        <input type="hidden" name="db_value" value="3">
                        <input type="hidden" name="listaction" value="insert_db">
                        <button class="btn btn-primary" value="Update" name="Update">Update</button>
                        </form>
                    </td>
            	</tr>
            <?php				 
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_3; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name_4'") != $table_name_4) {
			?>
               <tr>
            		<td><?php echo $table_name_4; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="4">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_4; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name_5'") != $table_name_5) {
			?>
               <tr>
            		<td><?php echo $table_name_5; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="5">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_5; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_6'") != $table_name_6) {
			?>
               <tr>
            		<td><?php echo $table_name_6; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="6">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_6; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_7'") != $table_name_7) {
			?>
               <tr>
            		<td><?php echo $table_name_7; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="7">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_7; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_8'") != $table_name_8) {
			?>
               <tr>
            		<td><?php echo $table_name_8; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="8">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_8; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name_9'") != $table_name_9) {
			?>
               <tr>
            		<td><?php echo $table_name_9; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="9">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_9; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_10'") != $table_name_10) {
			?>
               <tr>
            		<td><?php echo $table_name_10; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="10">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_10; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_11'") != $table_name_11) {
			?>
               <tr>
            		<td><?php echo $table_name_11; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="11">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_11; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name_12'") != $table_name_12) {
			?>
               <tr>
            		<td><?php echo $table_name_12; ?></td>
                	<td><?php echo $notinstalled; ?></td>
                    <td>
                    <form action="" method="post">
                    <input type="hidden" name="db_value" value="12">
                    <input type="hidden" name="listaction" value="insert_db">
                    <button class="btn btn-primary" value="Update" name="Update">Update</button>
                    </form>
                    </td>
            	</tr>
            <?php	
		}
		else{
			?>
            <tr>
            	<td><?php echo $table_name_12; ?></td>
                <td><?php echo $installed; ?></td>
                <td><?php echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>'; ?></td>
            </tr>
            <?php
		}
}

function handle_leaderboard_database_insert() {
	global $wpdb;
		$table_name_1 = $wpdb->prefix.'lbv4_results';
		$table_name_2 = $wpdb->prefix.'lb_dbtime';
		$table_name_3 = $wpdb->prefix.'lb_dealers';
		$table_name_4 = $wpdb->prefix.'lb_email';
		$table_name_5 = $wpdb->prefix.'lb_email_from';
		$table_name_6 = $wpdb->prefix.'lb_email_results';
		$table_name_7 = $wpdb->prefix.'lb_limit';
		$table_name_8 = $wpdb->prefix.'lb_names';
		$table_name_9 = $wpdb->prefix.'lb_point_heading';
		$table_name_10 = $wpdb->prefix.'lb_point_subheading';
		$table_name_11 = $wpdb->prefix.'lb_point_types';
		$table_name_12 = $wpdb->prefix.'lb_weeks';
	if(isset($_POST['db_value'])) {
		 $db_value = $_POST['db_value'];
		 if($db_value == 1) {
			 if($wpdb->get_var("SHOW TABLES LIKE '$table_name_1'") != $table_name_1) {
					
					$charset_collate = $wpdb->get_charset_collate();
					 $sql = "CREATE TABLE $table_name_1 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  dealer varchar(200) NOT NULL,
							  sales_person varchar(200) NOT NULL,
							  customername varchar(200) NOT NULL,
							  orderdate varchar(200) NOT NULL,
							  points_1 int(4) NOT NULL,
							  points_2 int(4) NOT NULL,
							  points_3 int(4) NOT NULL,
							  points_4 int(4) NOT NULL,
							  points_5 int(4) NOT NULL,
							  points_6 int(4) NOT NULL,
							  points_7 int(4) NOT NULL,
							  points_8 int(4) NOT NULL,
							  points_9 int(4) NOT NULL,
							  points_10 int(4) NOT NULL,
							  points_11 int(4) NOT NULL,
							  points_12 int(4) NOT NULL,
							  points_13 int(4) NOT NULL,
							  points_14 int(4) NOT NULL,
							  points_15 int(4) NOT NULL,
							  points_16 int(4) NOT NULL,
							  points_17 int(4) NOT NULL,
							  points_18 int(4) NOT NULL,
							  points_19 int(4) NOT NULL,
							  points_20 int(4) NOT NULL,
							  userID int(4) NOT NULL,
							  rand int(4) NOT NULL,
							  ContactDateCreated datetime NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 elseif($db_value == 2) {
			 if($wpdb->get_var("SHOW TABLES LIKE '$table_name_2'") != $table_name_2) {
					$charset_collate = $wpdb->get_charset_collate();
					 $sql = "CREATE TABLE $table_name_2 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  show_time varchar(3) NOT NULL,
							  server_time varchar(100) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );

						 $show_time = "off";
						 $server_time = time();

						//Insert some data
						$wpdb->insert(
							$table_name_2, //Table
							array('show_time' => $show_time, 'server_time' => $server_time ), //Variables
							array('%s') //data format
						);
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 elseif($db_value == 3) {
			  if($wpdb->get_var("SHOW TABLES LIKE '$table_name_3'") != $table_name_3) {
					$charset_collate = $wpdb->get_charset_collate();
					 $sql = "CREATE TABLE $table_name_3 (
							  id int(11) NOT NULL AUTO_INCREMENT,
							  dealer varchar(200) NOT NULL,
							  menu_order int(4) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 $dealer = "Dealer Name One";
						 $menu_order = 1;
						 
						 //Insert some data
						 $wpdb->insert(
							$table_name_3, //Table
							array('dealer' => $dealer, 'menu_order' => $menu_order ), //Variables
							array('%s', '%s') //data format
						);
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 elseif($db_value == 4) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_4'") != $table_name_4) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 	 
					 //Create the database
					 $sql = "CREATE TABLE $table_name_4 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  subject varchar(300) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 $email_subject = "Leaderboard Incentive Site";
						 
						 //Insert some data
						 $wpdb->insert(
							$table_name_4, //Table
							array('subject' => $email_subject ), //Variables
							array('%s') //data format
						);
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 elseif($db_value == 5) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_5'") != $table_name_5) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 	 
					 //create the database	
					 $sql = "CREATE TABLE $table_name_5 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  from_email varchar(300) NOT NULL,
							  from_name varchar(300) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 $from_email = "andrew.hosegood@sky.com";
						 $from_name = "Andrew";
						 
						 //Insert some data
						 $wpdb->insert(
							$table_name_5, //Table
							array('from_email' => $from_email, 'from_name' => $from_name ), //Variables
							array('%s', '%s') //data format
						);
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 elseif($db_value == 6) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_6'") != $table_name_6) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 
					 $sql = "CREATE TABLE $table_name_6 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  email_address varchar(300) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 $email_address = "andrew.hosegood@sky.com";
						 
						 //Insert some data
						 $wpdb->insert(
							$table_name_6, //Table
							array('email_address' => $email_address ), //Variables
							array('%s') //data format
						);
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 elseif($db_value == 7) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_7'") != $table_name_7) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 
					 $sql = "CREATE TABLE $table_name_7 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  leaderboard_limit int(4) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 elseif($db_value == 8) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_8'") != $table_name_8) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 
					 $sql = "CREATE TABLE $table_name_8 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  firstname varchar(300) NOT NULL,
							  lastname varchar(300) NOT NULL,
							  dealership varchar(300) NOT NULL,
							  dealerid int(4) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 $firstname = "Persons";
						 $lastname = "Name";
						 $dealership = "Dealer Name One";
						 $dealerid = 1;
						 
						 //Insert some data
						 $wpdb->insert(
							$table_name_8, //Table
							array('firstname' => $firstname, 'lastname' => $lastname, 'dealership' => $dealership, 'dealerid' => $dealerid ), //Variables
							array('%s') //data format
						);
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 elseif($db_value == 9) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_9'") != $table_name_9) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 
					 $sql = "CREATE TABLE $table_name_9 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  heading varchar(400) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 elseif($db_value == 10) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_10'") != $table_name_10) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 
					 $sql = "CREATE TABLE $table_name_10 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  subheader varchar(400) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 elseif($db_value == 11) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_11'") != $table_name_11) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 
					 $sql = "CREATE TABLE $table_name_11 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  description varchar(300) NOT NULL,
							  points int(4) NOT NULL,
							  points2 int(4) NOT NULL,
							  points3 int(4) NOT NULL,
							  points4 int(4) NOT NULL,
							  points5 int(4) NOT NULL,
							  points6 int(4) NOT NULL,
							  scoreID int(4) NOT NULL,
							  scoretype int(4) NOT NULL,
							  display varchar(3) NOT NULL,
							  show_subheader varchar(3) NOT NULL,
							  menu_order int(4) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 $description = "Score 1 = 100";
						 $points = 5;
						 $points2 = 10;
						 $points3 = 15;
						 $points4 = 20;
						 $points5 = 25;
						 $points6 = 30;
						 $scoreID = 1;
						 $scoretype = 2;
						 $display = "yes";
						 $show_subheader = "no";
						 $menu_order = 1;
						 
						 //Insert some data
						 $wpdb->insert(
							$table_name_11, //Table
							array('description' => $description, 'points' => $points, 'points2' => $points2, 'points3' => $points3, 'points4' => $points4, 'points5' => $points5, 'points6' => $points6, 'scoreID' => $scoreID, 'scoretype' => $scoretype, 'display' => $display, 'show_subheader' => $show_subheader, 'menu_order' => $menu_order ), //Variables
							array('%s', '%s', '%s', '%s', '%s', '%s') //data format
						);
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 elseif($db_value == 12) {
			 
				if($wpdb->get_var("SHOW TABLES LIKE '$table_name_12'") != $table_name_12) {
			 
					 $charset_collate = $wpdb->get_charset_collate();
				 
					 $sql = "CREATE TABLE $table_name_12 (
							  id int(4) NOT NULL AUTO_INCREMENT,
							  week int(1) NOT NULL,
							  start_date varchar(10) NOT NULL,
							  end_date varchar(10) NOT NULL,
							  epoch_timestamp int(10) NOT NULL,
							  leaderboard_limit int(10) NOT NULL,
							  UNIQUE KEY id (id)
						 ) $charset_collate;";
						 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
						 dbDelta( $sql );
						 
						 $week = 1;
						 $start_date = "2017-09-23";
						 $end_date = "2017-09-30";
						 $epoch_timestamp = time() + 432000;
						 $leaderboard_limit = 0;
						  
						 //Insert some data
						 $wpdb->insert(
							$table_name_12, //Table
							array('week' => $week, 'start_date' => $start_date, 'end_date' => $end_date, 'epoch_timestamp' => $epoch_timestamp, 'leaderboard_limit' => $leaderboard_limit ), //Variables
							array('%s', '%s', '%s', '%s', '%s') //data format
						);
						 
						 
						 include(plugin_dir_path(__FILE__) . '../pages/leaderboard-list.php');
						 exit;
				}
		 }
		 
		 
		 else {
			 echo "There was an error!";
		 }
		 
		 
	}
	
	
}




?>