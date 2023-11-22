<h2>Email From Edit</h2>
<?php
global $wpdb;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_email_from WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$from_name = $row->from_name;
$from_email = $row->from_email;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Email From</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardemailfromid" value="<?php echo $id; ?>">
            	
        
                 
                 <div class="form-group">
                	<label for="frmName" class="col-sm-4 control-label">From Name</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="from_name" value="<?php echo $from_name; ?>">
                	</div>
                 </div>
                 
                  <div class="form-group">
                	<label for="frmEmail" class="col-sm-4 control-label">From Email</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="from_email" value="<?php echo $from_email; ?>">
                	</div>
                 </div>  
                 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handleemailfromupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handleemailfromdelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
