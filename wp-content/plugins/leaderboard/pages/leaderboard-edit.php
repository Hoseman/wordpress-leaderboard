<h2>Dealer Edit</h2>
<?php
global $wpdb;

$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dealers WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$dealer = $row->dealer;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Dealers</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardid" value="<?php echo $id; ?>">
            	
              
                 
                 <div class="form-group">
                	<label for="frmDealer" class="col-sm-4 control-label">Dealer</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="dealer" value="<?php echo $dealer; ?>">
                	</div>
                 </div> 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handleupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handledelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
