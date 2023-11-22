<h2>Scores Edit (Select Menu)</h2>
<?php
global $wpdb;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_point_types WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$scoreid = $row->scoreID;
$description = $row->description;
$points2 = $row->points2;
$points3 = $row->points3;
$points4 = $row->points4;
$points5 = $row->points5;
$points6 = $row->points6;
$display = $row->display;
$show_subheader = $row->show_subheader;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Points</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardscoresid" value="<?php echo $id; ?>">
                <input type="hidden" name="scoreid" value="<?php echo $scoreid; ?>">
                
                 
            	 <div class="form-group">
                	<label for="frmScoreid" class="col-sm-4 control-label">Score ID</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="scoreid" value="<?php echo $scoreid; ?>">
                	</div>
                 </div> 
           
                 
                 <div class="form-group">
                	<label for="frmDescription" class="col-sm-4 control-label">Description</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="description" value="<?php echo $description; ?>">
                	</div>
                 </div> 
                 
                 <div class="form-group">
                	<label for="frmPoints" class="col-sm-4 control-label">Points</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="points2" value="<?php echo $points2; ?>">
                	</div>
                 </div> 
                 
                 <div class="form-group">
                	<label for="frmPoints" class="col-sm-4 control-label">Points</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="points3" value="<?php echo $points3; ?>">
                	</div>
                 </div>
                 
                 <div class="form-group">
                	<label for="frmPoints" class="col-sm-4 control-label">Points</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="points4" value="<?php echo $points4; ?>">
                	</div>
                 </div> 
                 
                <div class="form-group">
                	<label for="frmPoints" class="col-sm-4 control-label">Points</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="points5" value="<?php echo $points5; ?>">
                	</div>
                 </div>
                 
                 <div class="form-group">
                	<label for="frmPoints" class="col-sm-4 control-label">Points</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="points6" value="<?php echo $points6; ?>">
                	</div>
                 </div>    
                 
                 <div class="form-group">
                	<label for="display" class="col-sm-4 control-label">Display</label>
                	<div class="col-sm-8">
                    <select class="leaderboard-200365-form-control" name="display">
                    	<option value="yes" <?php if($display == "yes") { echo "selected";} ?>>Yes</option>
                        <option value="no" <?php if($display == "no") { echo "selected";} ?>>No</option>
                    </select>
                	</div>
                 </div>
                 
                 <div class="form-group">
                	<label for="display" class="col-sm-4 control-label">Show Label Subheader</label>
                	<div class="col-sm-8">
                    <select class="leaderboard-200365-form-control" name="show_subheader">
                    	<option value="yes" <?php if($show_subheader == "yes") { echo "selected";} ?>>Yes</option>
                        <option value="no" <?php if($show_subheader == "no") { echo "selected";} ?>>No</option>
                    </select>
                	</div>
                 </div>  
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handlescoresupdate2" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handlescoresdelete" class="btn btn-danger" onclick="return confirm('NEVER delete scores mid-campaign!...Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
