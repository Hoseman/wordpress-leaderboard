<?php

date_default_timezone_set('Europe/London');

include(plugin_dir_path(__FILE__) . '../pages/leaderboard-shortcode-score-process.php');

global $wpdb;



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





//Grab Epoch Timestamp Values as weekly values

$valid4 = true;

$SQL4 = "SELECT * FROM " . $wpdb->prefix . "lb_weeks";

$formData4 = $wpdb-> get_results($SQL4);

$array = array();

if (!$formData4) {

	$valid4 = false;

	echo '<tr><td colspan="3" style="text-align:center;">No results to display!</td></tr>';

}

		if($valid4) {

				foreach ($wpdb->get_results($SQL4) as $key => $row) {

						

						$epoch_array[] = $row->epoch_timestamp;

						

				}

		}

						if(empty($epoch_array[0])) {

							$epoch_array[0] = "";

						}

						if(empty($epoch_array[1])) {

							$epoch_array[1] = "";

						}

						if(empty($epoch_array[2])) {

							$epoch_array[2] = "";

						}

						if(empty($epoch_array[3])) {

							$epoch_array[3] = "";

						}

						if(empty($epoch_array[4])) {

							$epoch_array[4] = "";

						}

						if(empty($epoch_array[5])) {

							$epoch_array[5] = "";

						}

						if(empty($epoch_array[6])) {

							$epoch_array[6] = "";

						}

						if(empty($epoch_array[7])) {

							$epoch_array[7] = "";

						}

						if(empty($epoch_array[8])) {

							$epoch_array[8] = "";

						}

						if(empty($epoch_array[9])) {

							$epoch_array[9] = "";

						}

						if(empty($epoch_array[10])) {

							$epoch_array[10] = "";

						}

						if(empty($epoch_array[11])) {

							$epoch_array[11] = "";

						}										

$week_1 =  $epoch_array[0];

$week_2 =  $epoch_array[1];

$week_3 = $epoch_array[2];

$week_4 = $epoch_array[3];

$week_5 = $epoch_array[4];

$week_6 = $epoch_array[5];

$week_7 = $epoch_array[6];

$week_8 = $epoch_array[7];

$week_9 = $epoch_array[8];

$week_10 = $epoch_array[9];

$week_11 = $epoch_array[10];

$week_12 = $epoch_array[11];

//Grab Epoch Timestamp Values as weekly values







//Grab Leaderboard limit value

//Leaderboard limit values

$array[0]['leaderboard_limit'] = "";

$array[1]['leaderboard_limit'] = "";

$array[2]['leaderboard_limit'] = "";

$valid4 = true;

$SQL4 = "SELECT * FROM " . $wpdb->prefix . "lb_limit";

$formData4 = $wpdb-> get_results($SQL4);

$array = array();

if (!$formData4) {

	$valid4 = false;

	$limit_array[0] = 10; //if leaderboard limit is empty set value to 10

	$limit = $limit_array[0];

}

		if($valid4) {

				foreach ($wpdb->get_results($SQL4) as $key => $row) {

						$limit_array[] = $row->leaderboard_limit;

				}

		}					



if(empty($row->leaderboard_limit)){

	$limit = 10;

}

else {

	$limit = $limit_array[0];

}



//Grab Leaderboard limit values















//Run the leaderboard form

$sales_person_name = 1;



$valid = true;

$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dealers order by menu_order asc";

$formData = $wpdb-> get_results($SQL);



if (!$formData) {

	$valid = false;

	echo '<p style="text-align:center;">No results to display!</p>';

}

?>











<!-- Time Green Triangle -->

<section id="the-leaderboard" class="time-container">

    <div class="time-container__triangle">

        <p><?php echo date('F j, Y', $now + 0); ?><br><?php echo date('g:i a', $now + 0); ?></p>

    </div>

</section>

<!-- Time Green Triangle -->

















<section class="results">

<div class="container display-flex u-margin-top-small">

<div class="results__column">

			<div class="custom-padding">

			<form action="" method="post" id="leaderboarID" class="leaderboard-form">

			<label class="points-subheading">Dealership <span><img src="<?php echo esc_url(admin_url() . '/images/loading.gif'); ?>" id="loading-animation"></span></label>

				<select name="dealer_id" id="menu" class="form-control" required >

				<option>Please Choose...</option>

				<?php



				if($valid) {

						foreach ($wpdb->get_results($SQL) as $key => $row) {

							$id = $row->id;

							$dealer = $row->dealer;

							?>

							<option value="<?php echo $id; ?>"><?php echo $dealer; ?></option>

							

							<?php		

						}

				}

				?>

				</select>

			<div id="target" class="ajax-container">

			</div>

			</select>







			<!-- CUSTOMER NAME -->

			<label class="points-subheading">Customer Name</label>

			<input type="text" name="customername" class="form-control" value="" placeholder="Customer Name Here..." required >

			<!-- CUSTOMER NAME -->





			<!-- ORDER DATE -->

			<label class="points-subheading">Order Date</label>

			<input type="text" name="date" class="form-control custom_date" value="" placeholder="Date Here..." required >

			<!-- ORDER DATE -->





			<!-- POINTS -->

			<span class="points">



			<?php

			// Get The Label Heading Value

			$valid3 = true;

			$SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_heading";

			$formData3 = $wpdb-> get_results($SQL3);

			if (!$formData3) {

			$valid3 = false;

			}

			if($valid3) {

			foreach ($wpdb->get_results($SQL3) as $key => $row) {

					if(empty($row->heading)){

						$heading = "Points";

					}

					else{

						$heading = $row->heading;

					}

			?>

				<label class="points-subheading"><?php echo $heading; ?></label>

			<?php	

			}

			}

			// Get The Label Heading Value

			?>



			<?php

			// Get The Label Subheading Value

			$valid3 = true;

			//$subheader_array[0] = "";

			$SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_subheading";

			$formData3 = $wpdb-> get_results($SQL3);

			if (!$formData3) {

			$valid3 = false;

			$error = "<p>Add a subheader value!</p>";

			}

			if($valid3) {

			foreach ($wpdb->get_results($SQL3) as $key => $row) {

						

						$subheader_array[] = $row->subheader;

			}

			}







			if (@$subheader_array[0] == "") {

			$subheader = "Add Your Subheader";	

			}

			else {

			$subheader = $subheader_array[0];

			}





			// Get The Label Subheading Value

			?>



			<?php

			$valid3 = true;

			$SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_types order by menu_order asc";

			$formData3 = $wpdb-> get_results($SQL3);

			//$array = array();

			if (!$formData3) {

			$valid3 = false;

			echo '<p>No results to display!!</p>';

			}

			if($valid3) {

			foreach ($wpdb->get_results($SQL3) as $key => $row) {

				$id = $row->scoreID;

				$description = $row->description;

				$points = $row->points;

				$points2 = $row->points2;

				$points3 = $row->points3;

				$points4 = $row->points4;

				$points5 = $row->points5;

				$points6 = $row->points6;

				$display = $row->display;

				$show_subheader = $row->show_subheader;

				$scoretype = $row->scoretype;

				?>

				

				<span id="points-row" class="<?php if($display == "no") { echo "display-point"; } else{ echo ""; } ?>">

				

				<?php if($show_subheader == "yes") { echo "<label class='points-subheader'>".$subheader."</label>"; } else{ echo ""; } ?>

				

				<!-- If the scoretype is 1 show the tick boxes -->

				<?php if($scoretype == 1) { ?>

					<label for="<?php echo $id; ?>" class="results__pointsBox2"> <?php echo $description; ?> 

					<input name="points_<?php echo $id ?>" value="<?php echo $points; ?>" id="<?php echo $id; ?>" class="results__pointsBox" type="checkbox">

					<span class="results__checkmark"></span>

					</label><br>

				<?php } ?>

				<!-- If the scoretype is 1 show the tick boxes -->

				

				<!-- If the scoretype is 2 show the select menu -->

				<?php if($scoretype == 2) { ?>

					

					<select class="results__pointsBoxselect" name="points_<?php echo $id ?>">

						<option>Select...</option>

						<?php if($points2 == 0){ echo ""; } else{ ?> <option value="<?php echo $points2 ?>"><?php echo $points2; ?></option> <?php } ?>

						<?php if($points3 == 0){ echo ""; } else{ ?> <option value="<?php echo $points3 ?>"><?php echo $points3; ?></option> <?php } ?>

						<?php if($points4 == 0){ echo ""; } else{ ?> <option value="<?php echo $points4 ?>"><?php echo $points4; ?></option> <?php } ?>

						<?php if($points5 == 0){ echo ""; } else{ ?> <option value="<?php echo $points5 ?>"><?php echo $points5; ?></option> <?php } ?>

						<?php if($points6 == 0){ echo ""; } else{ ?> <option value="<?php echo $points6 ?>"><?php echo $points6; ?></option> <?php } ?>

					</select>

					<label for="<?php echo $id; ?>" class="results__pointsBox3"> <?php echo $description; ?> </label><br>

				<?php } ?> 

				<!-- If the scoretype is 2 show the select menu --> 

				

				</span>



				<?php		

			}

			?>





			<?php            

			}

			?>



			</span> <!-- end span class points -->



			<!-- POINTS -->







			<input name="formid" type="hidden" style="width:500px;" value="<?php echo $_SESSION["formid"]; ?>"  />



			<?php



			if( $now <= $week_1) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_1 && $now <= $week_2) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_2 && $now <= $week_3) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_3 && $now <= $week_4) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_4 && $now <= $week_5) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_5 && $now <= $week_6) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_6 && $now <= $week_7) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_7 && $now <= $week_8) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_8 && $now <= $week_9) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_9 && $now <= $week_10) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_10 && $now <= $week_11) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			elseif($now > $week_11 && $now <= $week_12) { echo '<button type="submit" id="submit" name="submit" class="button_submit">ADD YOUR SCORES</button>'; }

			else{ echo '<span class="button-no-submit">Add Score</span>'; }





			?>









			</form>

			</div>

</div><!-- End results__column -->



<div class="results__column scoreboard-hide">



<div class="custom-padding-2">







<?php







// Grab the incentive site title 



$valid = true;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_email";

$formData = $wpdb-> get_results($SQL);



if($valid) {

		foreach ($wpdb->get_results($SQL) as $key => $row) {

					

					$subject_array[] = $row->subject;

		}

}



// Grab the incentive site title 









												

						////////////////////////

						//Run the week 1 script

						////////////////////////

						

						if( $now <= $week_1) {

							$week_key_value = 1;

							

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 1";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="3" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

								// if($count_weeks<= 1) {

								// 	echo '<h2 class="week-header-1">'.$subject_array[0].' <span class="week-header-1b">'. date("Y").' League Table</span><span class="top-week">Top' . $limit . '</span></h2>';

								// 	echo do_shortcode( '[scoreboard_icon_2/]' );

								// }

								// else {

								// 	echo '<h2 class="week-header-2">'.$subject_array[0].' <span class="week-header-3">'. date("Y").' League Table</span></h2>';

								// 	echo do_shortcode( '[scoreboard_icon_1/]' );

								// 	echo '<h2 class="week-header-4">Week ' . $week_key_value . '<span class="top-week">&nbsp;Top ' . $limit . '</span></h2>';

								// 	echo do_shortcode( '[scoreboard_icon_2/]' );

								// }

						?>

                        

                        <h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>





                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

					

						}//end if

						

						///////////////////////////

						//end Run the week 1 script

						///////////////////////////

						

						

						

						

						////////////////////

						//Run week 2 script

						////////////////////

						

						elseif($now > $week_1 && $now <= $week_2) {

							$week_key_value = 2;

							

							

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 2";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="3" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

					

								

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <hr>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

									

							

						}// end if

						

						///////////////////////

						//End run week 2 script

						///////////////////////

						

						

						///////////////////

						//Run week 3 script

						///////////////////

						

						elseif($now > $week_2 && $now <= $week_3) {

							$week_key_value = 3;	

							

							

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 3";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->

						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 3 script

						///////////////////////

						

						

						///////////////////

						//Run week 4 script

						///////////////////

						elseif($now > $week_3 && $now <= $week_4) {

							$week_key_value = 4;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 4";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 4 script

						///////////////////////

						

						

						

						///////////////////

						//Run week 5 script

						///////////////////

						elseif($now > $week_4 && $now <= $week_5) {

							$week_key_value = 5;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 5";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 5 script

						///////////////////////

						

						

						

						///////////////////

						//Run week 6 script

						///////////////////

						elseif($now > $week_5 && $now <= $week_6) {

							$week_key_value = 6;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 6";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 6 script

						///////////////////////

						

						

						

						

						///////////////////

						//Run week 7 script

						///////////////////

						elseif($now > $week_6 && $now <= $week_7) {

							$week_key_value = 7;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 7";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 7 script

						///////////////////////

						

						

						

						

						

						///////////////////

						//Run week 8 script

						///////////////////

						elseif($now > $week_7 && $now <= $week_8) {

							$week_key_value = 8;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 8";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if valid

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 8 script

						///////////////////////

						

						

						

						

						

						///////////////////

						//Run week 9 script

						///////////////////

						elseif($now > $week_8 && $now <= $week_9) {

							$week_key_value = 9;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 9";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 9 script

						///////////////////////

						

						

						

						

						///////////////////

						//Run week 10 script

						///////////////////

						elseif($now > $week_9 && $now <= $week_10) {

							$week_key_value = 10;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 10";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 10 script

						///////////////////////

						

						

						

						

						

						///////////////////

						//Run week 11 script

						///////////////////

						elseif($now > $week_10 && $now <= $week_11) {

							$week_key_value = 11;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 11";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->



						<h2 class="week-title">Week <?php echo $week; ?><span class="week-subheader">Top 10</span></h2>

						<h3 class="week-dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 11 script

						///////////////////////

						

						

						

						

						

						///////////////////

						//Run week 12 script

						///////////////////

						elseif($now > $week_11 && $now <= $week_12) {

							$week_key_value = 12;	

														

							$valid = true;

							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 12";

							$formData = $wpdb-> get_results($SQL);

							// count the number of results in lb_weeks 

							$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");

							

							if (!$formData) {

								$valid = false;

								echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

							}

							

									if($valid) {

											foreach ($wpdb->get_results($SQL) as $key => $row) {

													

													$week =  $row->week;

													$start_date = $row->start_date;

													$end_date =  $row->end_date;

													$epoch_timestamp =  $row->epoch_timestamp;

													

													$epoch_array[] = $row->epoch_timestamp;

													

											}//end foreach

									}//end if vaild

						?>

                        <!-- <h2 class="week-header-2"><?php //echo $subject_array[0]; ?> <span class="week-header-3"><?php //echo date("Y"); ?> League Table</span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_1/]' ); ?>

                        <h2 class="week-header-4">Week <?php //echo $week_key_value; ?> <span class="top-week">Top <?php //echo $limit; ?></span></h2>

                        <?php //echo do_shortcode( '[scoreboard_icon_2/]' ); ?>

                        <h2 class="week-header-5">From <?php //echo date("F d",strtotime($start_date)); ?> to <?php //echo date("F d",strtotime($end_date)); ?></h2> -->

                        

                        <table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

                          <tbody>

                            <tr>

                              <th class="table-heading">Rank</th>

                              <th class="table-heading">Salesperson</th>

                              <th class="table-heading">Dealer</th>

                              <th class="table-heading">Score</th>

                            </tr>

                        <?php

						

						

						$x = 1;

						$valid4 = true;

						$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results WHERE orderdate BETWEEN '".$start_date."' AND '".$end_date."' group by sales_person order by total desc LIMIT " . $limit;

						$formData4 = $wpdb-> get_results($SQL4);

						if (!$formData4) {

							$valid4 = false;

							echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

						}

						

								if($valid4) {

										foreach ($wpdb->get_results($SQL4) as $key => $row) {

											 $count =  $x++;

										?>	

											

												<tr>

												  <td><?php echo $count; ?></td>

												  <td><?php echo $row->sales_person; ?></td>

                                                  <td><?php echo $row->dealer; ?></td>

												  <td><?php echo $row->total; ?></td>

												</tr>

								 

										<?php    		

										}

								}



						

						echo "</tbody></table>";

							

						}//end if

						

						///////////////////////

						//End run week 12 script

						///////////////////////

						

						

						

						

						

						

						else {

							$campaign_end = 1;

							echo "<p class='campaign-ended'><span class='glyphicon glyphicon-exclamation-sign'></span> This incentive campaign has now ended!</p>";	

						}

						

						

					

?>







<!-- Overall Score -->

<?php

$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE week = 1";

$formData = $wpdb-> get_results($SQL);

// count the number of results in lb_weeks 

$count_weeks = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");



if($count_weeks <= 1) {

	echo '<div style="display:none;">';	

}

else {

	echo '<div>';	

}

?>

<hr>

<h2 class="week-header-4">Overall</h2>





<table width="100%" cellspacing="0" cellpadding="0" class="weeks-table">

  <tbody>

    <tr>

      <th class="table-heading">Rank</th>

      <th class="table-heading">Salesperson</th>

      <th class="table-heading">Dealer</th>

      <th class="table-heading">Score</th>

    </tr>



<?php

$x = 1;

$valid4 = true;

$SQL4 = "SELECT dealer, sales_person, (sum(points_1)+sum(points_2)+sum(points_3)+sum(points_4)+sum(points_5)+sum(points_6)+sum(points_7)+sum(points_8)+sum(points_9)+sum(points_10)+sum(points_11)+sum(points_12)+sum(points_13)+sum(points_14)+sum(points_15)+sum(points_16)+sum(points_17)+sum(points_18)+sum(points_19)+sum(points_20)) as total from " . $wpdb->prefix . "lbv4_results group by sales_person order by total desc LIMIT " . $limit;

$formData4 = $wpdb-> get_results($SQL4);

if (!$formData4) {

	$valid4 = false;

	echo '<tr><td colspan="4" style="text-align:center;">No results to display</td></tr>';

}



		if($valid4) {

				foreach ($wpdb->get_results($SQL4) as $key => $row) {

					 $count =  $x++;

				?>	

					

						<tr>

						  <td><?php echo $count; ?></td>

						  <td><?php echo $row->sales_person; ?></td>

                          <td><?php echo $row->dealer; ?></td>

						  <td><?php echo $row->total; ?></td>

						</tr>

		 

				<?php    		

				}

		}





?>



  </tbody>

</table>

</div>



<!-- End Overall Score -->



</div>



</div><!-- End results__column -->

</div>

</section>



















			

