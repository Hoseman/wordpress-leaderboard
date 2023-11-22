<h2>Leaderboard Subject Name Edit</h2>
<?php
global $wpdb;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_email WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$subject = $row->subject;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Points</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardemailid" value="<?php echo $id; ?>">
            	 
                 
                 <div class="form-group">
                	<label for="frmDescription" class="col-sm-4 control-label">Subject Name</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="subject" value="<?php echo $subject; ?>">
                	</div>
                 </div> 
                 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handleemailupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handleemaildelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
