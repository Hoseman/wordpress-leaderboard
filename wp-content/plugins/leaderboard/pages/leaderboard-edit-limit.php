<div class="col-md-12">
<h2>Leaderboard Limit - Edit</h2>
</div>
<?php
global $wpdb;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_limit WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$leaderboard_limit = $row->leaderboard_limit;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Leaderboard Limit</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardlimitid" value="<?php echo $id; ?>">
            	  
                 
                 <div class="form-group">
                	<label for="frmDescription" class="col-sm-4 control-label">Leaderboard Limit <em>(Default value 10)</em></label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="leaderboard_limit" value="<?php echo $leaderboard_limit; ?>">
                	</div>
                 </div>

                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handlelimitupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handlelimitdelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
