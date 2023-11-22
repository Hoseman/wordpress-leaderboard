<h2>Scores Custom Subheader Label Edit</h2>
<?php
global $wpdb;

$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_point_subheading WHERE id=$id";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$subheader = $row->subheader;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Points Custom Subheader Label</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardscoressubheaderid" value="<?php echo $id; ?>">
            	
           
                 
                 <div class="form-group">
                	<label for="Heading" class="col-sm-4 control-label">Subheading</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="subheader" value="<?php echo $subheader; ?>">
                	</div>
                 </div> 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handlescoressubheaderupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handlescoressubheaderdelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
