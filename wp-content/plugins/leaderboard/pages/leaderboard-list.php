<!-- Database Admin -->
<h2>Database Admin</h2>

<form action="" method="post">
<input type="hidden" name="listaction" value="databaseupdate">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Update database</button>
</form>

<!-- End Database Admin -->


<!-- Dealer Admin -->
<h2>Dealer Admin</h2>
<?php
global $wpdb;
$valid = true;
$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dealers order by menu_order asc";
$formData = $wpdb-> get_results($SQL);


if (!$formData) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}



?>
<form action="" method="post">
<input type="hidden" name="listaction" value="insert">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add New Dealer</button>
</form>

<form action="" method="post">
    <input type="hidden" name="listaction" value="reorderdealers">
    <button type="submit" class="btn btn-primary" style="margin:0px 0px 7px 0px;">Re-Order Dealers</button>
</form>	

<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>Dealer</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL) as $key => $row) {
			$id = $row->id;
			$dealer = $row->dealer;
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit">
                    <input type="hidden" name="leaderboardid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $dealer; ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">
                            	<!--<span class="label label-primary glyphicon glyphicon-pencil">
                                </span>-->
                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End Dealer Admin -->




<!-- Names Admin -->
<h2>Names Admin</h2>
<?php
global $wpdb;
$valid = true;
$SQL2 = "SELECT * FROM " . $wpdb->prefix . "lb_names;";
$formData2 = $wpdb-> get_results($SQL2);


if (!$formData2) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}



?>
<form action="" method="post">
<input type="hidden" name="listaction" value="insert-name">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add New Name</button>
</form>

<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Branch</th>
    <!--<th>ID</th>-->
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL2) as $key => $row) {
			$id = $row->id;
			$firstname = $row->firstname;
			$lastname = $row->lastname;
			$dealership = $row->dealership;
			$dealerid = $row->dealerid;//Grab the id from names
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-names">
                    <input type="hidden" name="leaderboardnamesid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $firstname; ?></td>
                    <td><?php echo $lastname; ?></td>
                    <!--<td>-->
					<?php
					
					//Grab the details from dealers
					$valid = true;
					$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dealers WHERE id =$dealerid";
					$formData = $wpdb-> get_results($SQL);
					
					
					if (!$formData) {
						$valid = false;
						echo $error =  '<td><span style="color:red;" class="glyphicon glyphicon-exclamation-sign"></span><span style="color:red;"> Dealer Name Required!</span></td>';
					}
					
					if($valid) {
						foreach ($wpdb->get_results($SQL) as $key => $row) {
							$masterid = $row->id;
							$masterdealer = $row->dealer;
							?>
                            
                            <td><?php echo $masterdealer; ?></td>
                            
	
                            <?php
						}
					}
					
					?>
                
					<?php
					
					?>
             
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">
                            	<!--<span class="label label-primary glyphicon glyphicon-pencil">
                                </span>-->
                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End Names Admin -->













<!-- Scores Custom Label Admin -->
<h2>Scores Custom Label Admin</h2>
<h4>Heading</h4>
<?php
global $wpdb;
$valid = true;
$SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_heading";
$formData3 = $wpdb-> get_results($SQL3);


if (!$formData3) {
	$valid = false;
	echo $error =  '<p>Add a custom scores label. Default value is "Points"</p>';
}

// count the number of results in lb_point_heading 
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_point_heading");



if($numRows <= 0) {
?>
	<form action="" method="post">
    <input type="hidden" name="listaction" value="insert-score-label">
    <button type="submit" class="btn btn-primary" style="margin:5px 0px 10px 0px;">Add New Score Custom Label</button>
    </form>	
<?php	
}
else {

	echo '<button type="" class="btn btn-basic" style="margin:5px 0px 10px 0px;">No More Score Types Allowed</button>';	

}
?>

<?php
if($numRows == 0) {
	echo "";	
}
else {
?>
<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>Heading</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL3) as $key => $row) {
			if(!empty($row->heading)){
					$id = $row->id;
					$heading = $row->heading;	
				}
				else{
					$heading = "Add your scores custom label here";
				}
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-score-label">
                    <input type="hidden" name="leaderboardscoreslabelid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $heading; ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">
                            	<!--<span class="label label-primary glyphicon glyphicon-pencil">
                                </span>-->
                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<?php
}
?>
<h4>Sub Heading</h4>
<?php
global $wpdb;
$valid = true;
$SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_subheading";
$formData3 = $wpdb-> get_results($SQL3);


if (!$formData3) {
	$valid = false;
	echo $error =  '<p>Add a custom scores subheader label.</p>';
}

// count the number of results in lb_email_results - then display the insert button
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_point_subheading");



if($numRows <= 0) {
?>
	<form action="" method="post">
    <input type="hidden" name="listaction" value="insert-score-subheader-label">
    <button type="submit" class="btn btn-primary" style="margin:5px 0px 10px 0px;">Add New Score Subheader Custom Label</button>
    </form>	
<?php	
}
else {

	echo '<button type="" class="btn btn-basic" style="margin:5px 0px 10px 0px;">No More Score Subheaders Allowed</button>';	

}
?>

<?php
if($numRows == 0) {
	echo "";	
}
else {
?>
<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>Subheading</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL3) as $key => $row) {
			if(!empty($row->subheader)){
					$id = $row->id;
					$subheader = $row->subheader;	
				}
				else{
					$subheader = "Add your scores custom label here";
				}
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-score-subheader-label">
                    <input type="hidden" name="leaderboardscoressubheaderid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $subheader; ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">
                            	<!--<span class="label label-primary glyphicon glyphicon-pencil">
                                </span>-->
                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<?php
}
?>
<!-- End Scores Custom Label Admin -->





<!-- SUM UP THE POINTS SCOREID TOTAL (for displaying error message) -->
<?php
global $wpdb;
$valid = true;
//$SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_types order by menu_order asc";
$SQL3 = "SELECT sum(scoreID) as scoreID FROM " . $wpdb->prefix . "lb_point_types";
$formData3 = $wpdb-> get_results($SQL3);


if (!$formData3) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}
if($valid) {
		foreach ($wpdb->get_results($SQL3) as $key => $row) {
			
			$id_sum = $row->scoreID; //add up the total value for the scoreID
			
		}
		
}

?>
<!-- SUM UP THE POINTS SCOREID TOTAL (for displaying error message) -->









<!-- Scores Admin -->
<h2>Scores Admin</h2>
<?php
global $wpdb;
$valid = true;
$SQL3 = "SELECT * FROM " . $wpdb->prefix . "lb_point_types order by menu_order asc";
$formData3 = $wpdb-> get_results($SQL3);


if (!$formData3) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}

// count the number of results in lb_points_type - then display the insert button
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_point_types;");
$id_total = $numRows;
$ok_message = '<p><span style="color:#286090;" class="glyphicon glyphicon-info-sign"></span> If you need to remove a score mid-campaign simply disable it. Never delete a score mid-campaign!<br>Score IDs must be in recursive order</p>';
$error_message = '<p><span style="color:red;" class="glyphicon glyphicon-remove"></span>There is an error! Score IDs must be in recursive order</p>';

//Show error message if scoreID's are wrong!

if($id_total == 1 && $id_sum == 1) { echo $ok_message;; }
	elseif($id_total == 2 && $id_sum == 3) { echo $ok_message; }
	elseif($id_total == 3 && $id_sum == 6) { echo $ok_message; }
	elseif($id_total == 4 && $id_sum == 10) { echo $ok_message; }
	elseif($id_total == 5 && $id_sum == 15) { echo $ok_message; }
	elseif($id_total == 6 && $id_sum == 21) { echo $ok_message; }
	elseif($id_total == 7 && $id_sum == 28) { echo $ok_message; }
	elseif($id_total == 8 && $id_sum == 36) { echo $ok_message; }
	elseif($id_total == 9 && $id_sum == 45) { echo $ok_message; }
	elseif($id_total == 10 && $id_sum == 55) { echo $ok_message; }
	elseif($id_total == 11 && $id_sum == 66) { echo $ok_message; }
	elseif($id_total == 12 && $id_sum == 78) { echo $ok_message; }
	elseif($id_total == 13 && $id_sum == 91) { echo $ok_message; }
	elseif($id_total == 14 && $id_sum == 105) { echo $ok_message; }
	elseif($id_total == 15 && $id_sum == 120) { echo $ok_message; }
	elseif($id_total == 16 && $id_sum == 136) { echo $ok_message; }
	elseif($id_total == 17 && $id_sum == 153) { echo $ok_message; }
	elseif($id_total == 18 && $id_sum == 171) { echo $ok_message; }
	elseif($id_total == 19 && $id_sum == 190) { echo $ok_message; }
	elseif($id_total == 20 && $id_sum == 210) { echo $ok_message; }
	else { echo $error_message; }

//Show error message if scoreID's are wrong!


if($numRows <= 19) {
?>
	<form action="" method="post">
    <input type="hidden" name="listaction" value="insert-score">
    <button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add New Score Type (Tickbox)</button>
    </form>	
<?php	
}
else {

	echo '<button type="" class="btn btn-basic" style="margin:20px 0px 10px 0px;">No more Score Types allowed</button>';	

}

if($numRows <= 19) {
?>
	<form action="" method="post">
    <input type="hidden" name="listaction" value="insert-score-select">
    <button type="submit" class="btn btn-primary" style="margin:0px 0px 10px 0px;">Add New Score Type (Select Menu)</button>
    </form>	
<?php	
}
else {

	echo '<button type="" class="btn btn-basic" style="margin:20px 0px 10px 0px;">No more Score Types allowed</button>';	

}
?>



<form action="" method="post">
    <input type="hidden" name="listaction" value="reorderscore">
    <button type="submit" class="btn btn-primary" style="margin:0px 0px 7px 0px;">Re-Order Scores</button>
</form>	



<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>Score ID</th>
    <th>Description</th>
    <th>Points</th>
    <th>Display</th>
    <th>Add Label Subheader</th>
    <th>Score Type</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL3) as $key => $row) {
			$id = $row->id;
			$score_id = $row->scoreID;
			$description = $row->description;
			$points = $row->points;
			/*
			if($row->points2 != 0){ $points2 = $row->points2; }
			if($row->points3 != 0){ $points3 = $row->points3; }
			if($row->points4 != 0){ $points4 = $row->points4; }
			if($row->points5 != 0){ $points5 = $row->points5; }
			if($row->points6 != 0){ $points6 = $row->points6; }
			*/
			$points2 = $row->points2;
			$points3 = $row->points3;
			$points4 = $row->points4;
			$points5 = $row->points5;
			$points6 = $row->points6;
			$display = $row->display;
			$show_subheader = $row->show_subheader;
			$scoretype = $row->scoretype;
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-scores-<?php echo $scoretype; ?>">
                    <input type="hidden" name="leaderboardscoresid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $score_id; ?></td>
                    <td><?php echo $description; ?></td>
                    <td>
						<?php 
							if($scoretype == 1) {
								echo $points;
							}
							elseif($scoretype == 2) {
								if($points2 == 0) { $points2 = ""; } else { echo $row->points2 . ", "; }
								if($points3 == 0) { $points3 = ""; } else { echo $row->points3 . ", "; }
								if($points4 == 0) { $points4 = ""; } else { echo $row->points4 . ", "; }
								if($points5 == 0) { $points5 = ""; } else { echo $row->points5 . ", "; }
								if($points6 == 0) { $points6 = ""; } else { echo $row->points6; }
							}
							else {
								echo "There was an error!";	
							}
						?></td>
                    <td>
						<?php 
                            if($display == "yes") {
                                echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>';
                            } else {
                                echo '<span style="color:red;" class="glyphicon glyphicon-remove"></span>';
                            }
        
                        ?>
                    </td>
                    <td>
					<?php 
						if($show_subheader == "yes") {
							echo '<span style="color:#286090;" class="glyphicon glyphicon-ok"></span>';
						} else {
							echo '<span style="color:red;" class="glyphicon glyphicon-remove"></span>';
						}
	
					?>
                    </td>
                    <td>
                    	<?php 
							if($scoretype == 1) { echo "<span>Tickbox</span>"; }
							elseif($scoretype == 2) { echo "<span>Select Menu</span>"; }
							else { echo "There was an error!"; }  
						?>
                    </td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil"></button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End Scores Admin -->



























<!-- Email From Admin -->
<h2>Email From Admin</h2>
<?php
global $wpdb;
$valid = true;
$SQL4 = "SELECT * FROM " . $wpdb->prefix . "lb_email_from;";
$formData4 = $wpdb-> get_results($SQL4);


if (!$formData4) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}

// count the number of results in lb_email_results - then display the insert button
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_email_from;");

if($numRows <= 0) {
?>	
<form action="" method="post">
<input type="hidden" name="listaction" value="insert-email-from">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add New Email From</button>
</form>
<?php	
}
else {

	echo '<button type="" class="btn btn-basic" style="margin:20px 0px 10px 0px;">No more email from links allowed</button>';	

}

?>


<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>From Name</th>
    <th>From Email</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL4) as $key => $row) {
			$id = $row->id;
			$from_name = $row->from_name;
			$from_email = $row->from_email;
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-email-from">
                    <input type="hidden" name="leaderboardemailid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $from_name; ?></td>
                    <td><?php echo $from_email; ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">
                            	<!--<span class="label label-primary glyphicon glyphicon-pencil">
                                </span>-->
                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End Email From Admin -->




<!-- Email Subject Admin -->
<h2>Leaderboard Subject Name Admin</h2>
<?php
global $wpdb;
$valid = true;
$SQL4 = "SELECT * FROM " . $wpdb->prefix . "lb_email;";
$formData4 = $wpdb-> get_results($SQL4);


if (!$formData4) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}

// count the number of results in lb_email_results - then display the insert button
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_email;");

if($numRows <= 0) {
?>	
<form action="" method="post">
<input type="hidden" name="listaction" value="insert-email-subject">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add New Leaderboard Subject Name</button>
</form>
<?php	
}
else {

	echo '<button type="" class="btn btn-basic" style="margin:20px 0px 10px 0px;">No More Leaderboard Subject Names Allowed</button>';	

}

?>


<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>Subject</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL4) as $key => $row) {
			$id = $row->id;
			$subject = $row->subject;
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-email-subject">
                    <input type="hidden" name="leaderboardemailid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $subject; ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">
                            	<!--<span class="label label-primary glyphicon glyphicon-pencil">
                                </span>-->
                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End Email subject Admin -->




<!-- Email Results Admin -->
<h2>Email Results Admin</h2>
<?php
global $wpdb;
$valid = true;
$SQL5 = "SELECT * FROM " . $wpdb->prefix . "lb_email_results;";
$formData5 = $wpdb-> get_results($SQL5);


if (!$formData5) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}

// count the number of results in lb_email_results - then display the insert button
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_email_results;");

if($numRows <= 2) {
?>	
<form action="" method="post">
<input type="hidden" name="listaction" value="insert-email-results">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add New Email address</button>
</form>
<?php	
}
else {
	echo '<button type="" class="btn btn-basic" style="margin:20px 0px 10px 0px;">No more emails allowed</button>';	
}
// count the number of results in lb_email_results - then display the insert button
?>


<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>Subject</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL5) as $key => $row) {
			$id = $row->id;
			$email_address = $row->email_address;
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-email-results">
                    <input type="hidden" name="leaderboardemailresultsid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $email_address; ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">
                            	<!--<span class="label label-primary glyphicon glyphicon-pencil">
                                </span>-->
                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End Email Results Admin -->




<!-- Weeks Admin -->
<h2>Weeks Admin</h2>
<?php
global $wpdb;
$valid = true;
$SQL5 = "SELECT * FROM " . $wpdb->prefix . "lb_weeks order by week asc;";
$formData5 = $wpdb-> get_results($SQL5);


if (!$formData5) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}

// count the number of results in lb_email_results - then display the insert button
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks;");

if($numRows <= 12) {
?>	
<form action="" method="post">
<input type="hidden" name="listaction" value="insert-weeks">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add New Week</button>
</form>
<?php	
}
else {
	echo '<button type="" class="btn btn-basic" style="margin:20px 0px 10px 0px;">No more entries allowed</button>';	
}
// count the number of results in lb_email_results - then display the insert button
?>


<table class="table" style="width:70%;">
<tr class="info">
    <th>Week</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Epoch Timestamp - <a href="https://www.epochconverter.com/" target="_blank">www.epochconverter.com</a></th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL5) as $key => $row) {
			$id = $row->id;
			$week = $row->week;
			$start_date = $row->start_date;
			$end_date = $row->end_date;
			$epoch_timestamp = $row->epoch_timestamp;
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-weeks">
                    <input type="hidden" name="leaderboardweeksid" value="<?php echo $id; ?>">
                    <td><?php echo $week; ?></td>
                    <td><?php echo $start_date; ?></td>
                    <td><?php echo $end_date; ?></td>
                    <td><?php echo $epoch_timestamp; ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">

                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End weeks Admin -->




<!-- Database Time Admin -->
<h2>Database Time Admin</h2>
<p>Change the value of time to a custom value</p>
<?php
global $wpdb;
$valid = true;
$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dbtime;";
$formData = $wpdb-> get_results($SQL);


if (!$formData) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}

// count the number of results in lb_email_results - then display the insert button
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_dbtime;");

if($numRows <= 0) {
?>

<form action="" method="post">
<input type="hidden" name="listaction" value="insert-time">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add Time Value</button>
</form>
	
<?php	
}
else {

	echo '<button type="" class="btn btn-basic" style="margin:20px 0px 10px 0px;">No more custom values allowed</button>';	

}
?>


<table class="table" style="width:70%;">
<tr class="info">
	<th>ID</th>
    <th>Display Custom Time?</th>
    <th>Epoch Timestamp - <a href="http://www.epochconverter.com">www.epochconverter.com</a></th>
    <th>Time</th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL) as $key => $row) {
			$id = $row->id;
			$show_time = $row->show_time;
			$server_time = $row->server_time;
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-time">
                    <input type="hidden" name="leaderboardservertimeid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $show_time; ?></td>
                    <td><?php echo $server_time; ?></td>
                    <td><?php echo date('F j, Y, g:i a', $server_time + 0); ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">
                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End Database Time Admin -->




<!-- Leaderboard Limit Admin -->
<h2>Leaderboard Limit Admin</h2>
<?php
global $wpdb;
$valid = true;
$SQL5 = "SELECT * FROM " . $wpdb->prefix . "lb_limit";
$formData5 = $wpdb-> get_results($SQL5);


if (!$formData5) {
	$valid = false;
	echo $error =  '<p>No results to display</p>';
}

// count the number of results in lb_email_results - then display the insert button
$numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_limit;");

if($numRows <= 0) {
?>	
<form action="" method="post">
<input type="hidden" name="listaction" value="insert-limit">
<button type="submit" class="btn btn-primary" style="margin:20px 0px 10px 0px;">Add New Leaderboard Limit</button>
</form>
<?php	
}
else {
	echo '<button type="" class="btn btn-basic" style="margin:20px 0px 10px 0px;">No more entries allowed</button>';	
}
// count the number of results in lb_email_results - then display the insert button
?>


<table class="table" style="width:70%;">
<tr class="info">
    <th>ID</th>
    <th>Leaderboard Limit <em>(Default value 10)</em></th>
    <th>Action</th>
</tr>
<?php

if($valid) {
		foreach ($wpdb->get_results($SQL5) as $key => $row) {
			$id = $row->id;
			$leaderboard_limit = $row->leaderboard_limit;
			?>
            <tr>
            	<form action="" method="post">
                    <input type="hidden" name="listaction" value="edit-limit">
                    <input type="hidden" name="leaderboardlimitid" value="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $leaderboard_limit; ?></td>
                    <td>
                    	<div class="btn-group" role="group">
                        	<button type="submit" class="btn btn-primary glyphicon glyphicon-pencil">

                        	</button>
                    	</div>
                    
                    </td>
                </form>
            </tr>
            <?php		
		}
}
?>
</table>
<!-- End Leaderboard Limit Admin -->