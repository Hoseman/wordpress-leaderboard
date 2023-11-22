<?php
/* Template Name: IncentiveWeeklyResultsPage */
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

<?php
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

?>


<!-- Main Carousel -->

<?php include(locate_template('./template-parts/carousel-small.php')); ?>

<!-- Main Carousel -->


<!-- Time Green Triangle -->
<section id="the-leaderboard" class="time-container">
    <div class="time-container__triangle">
        <p><?php echo date('F j, Y', $now + 0); ?><br><?php echo date('g:i a', $now + 0); ?></p>
    </div>
</section>
<!-- Time Green Triangle -->




<?php
while ( have_posts() ) :
    the_post();
?>    

<h1><?php //the_title(); ?></h1>
<?php the_content(); ?>    

<?php    
endwhile; // End of the loop.
?>


<section id="weekly-results" class="weekly-results">
    <div class="container display-flex">
            <?php
                		////////////////////////
						//Run the week 1 script
						////////////////////////
						
						if( !empty($week_1)) {
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

						?>

                        <div class="weekly-results__col">
                        <div class="weekly-results__card">
                        
                        <h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>


                        
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
                        echo "</div>";
                        echo "</div>";           
						}//end if
						
						///////////////////////////
						//end Run the week 1 script
						///////////////////////////

                        ////////////////////
						//Run week 2 script
						////////////////////
						
						if(!empty($week_2)) {
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
                        <div class="weekly-results__col">
                        <div class="weekly-results__card">

						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";  
									
							
						}// end if
						
						///////////////////////
						//End run week 2 script
						///////////////////////


                        ///////////////////
						//Run week 3 script
						///////////////////
						
						if(!empty($week_3)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card">
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>"; 
							
						}//end if
						
						///////////////////////
						//End run week 3 script
						///////////////////////


                        ///////////////////
						//Run week 4 script
						///////////////////
						if(!empty($week_4)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card">            
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>"; 
							
						}//end if
						
						///////////////////////
						//End run week 4 script
						///////////////////////


                        ///////////////////
						//Run week 5 script
						///////////////////
						if(!empty($week_5)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card">             
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";
							
						}//end if
						
						///////////////////////
						//End run week 5 script
						///////////////////////



                        ///////////////////
						//Run week 6 script
						///////////////////
						if(!empty($week_6)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card">
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";
							
						}//end if
						
						///////////////////////
						//End run week 6 script
						///////////////////////



                        ///////////////////
						//Run week 7 script
						///////////////////
						if(!empty($week_7)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card">
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";
							
						}//end if
						
						///////////////////////
						//End run week 7 script
						///////////////////////
						
						
						
						
						
						///////////////////
						//Run week 8 script
						///////////////////
						if(!empty($week_8)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card">            
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";
							
						}//end if
						
						///////////////////////
						//End run week 8 script
						///////////////////////



                        ///////////////////
						//Run week 9 script
						///////////////////
						if(!empty($week_9)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card">  
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";
							
						}//end if
						
						///////////////////////
						//End run week 9 script
						///////////////////////
						
						
						
						
						///////////////////
						//Run week 10 script
						///////////////////
						if(!empty($week_10)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card"> 
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";
							
						}//end if
						
						///////////////////////
						//End run week 10 script
						///////////////////////


                        ///////////////////
						//Run week 11 script
						///////////////////
						if(!empty($week_11)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card"> 
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";
							
						}//end if
						
						///////////////////////
						//End run week 11 script
						///////////////////////
						
						
						
						
						
						///////////////////
						//Run week 12 script
						///////////////////
						if(!empty($week_12)) {
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

                        <div class="weekly-results__col">
                        <div class="weekly-results__card"> 
						<h2 class="weekly-results__header">Week <?php echo $week; ?><span class="weekly-results__subheader">Top 10</span></h2>
						<h3 class="weekly-results__dates">FROM <?php echo date("F d",strtotime($start_date)) ?> TO <?php echo date("F d",strtotime($end_date)); ?></h3>
                        
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
                        echo "</div>";
                        echo "</div>";
							
						}//end if
						
						///////////////////////
						//End run week 12 script
						///////////////////////
            ?>


    </div>        
</section>



<?php







						
						



						
						
						

						
						
						

						
						
						
						

						
						
						
						
						

						
						
				

?>





<section class="four-pictures">
    <div class="container display-flex">
        <div class="four-pictures__col">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/four-pictures-1.jpg" alt="Soccer Incentive">
        </div>
        <div class="four-pictures__col">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/four-pictures-2.jpg" alt="Soccer Incentive">
        </div>
        <div class="four-pictures__col">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/four-pictures-3.jpg" alt="Soccer Incentive">
        </div>
        <div class="four-pictures__col">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/four-pictures-4.jpg" alt="Soccer Incentive">
        </div>
    </div>
</section>













<?php

get_footer();
