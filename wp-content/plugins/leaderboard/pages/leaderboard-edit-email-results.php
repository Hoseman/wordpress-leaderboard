<h2>Email Address Edit</h2>
<?php
global $wpdb;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_email_results WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$email_address = $row->email_address;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Emails</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardemailresultsid" value="<?php echo $id; ?>">
              
                 
                 <div class="form-group">
                	<label for="frmDescription" class="col-sm-4 control-label">Email</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="email_address" value="<?php echo $email_address; ?>">
                	</div>
                 </div> 
                 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handleemailresultsupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handleemailresultsdelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
