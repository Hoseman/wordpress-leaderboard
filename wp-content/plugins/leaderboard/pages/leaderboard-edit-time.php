<div class="col-md-12">
<h2>Server Time -  Edit  <a style="font-size:85%;" href="https://www.epochconverter.com/" target="_blank"> www.epochconverter.com</a></h2>
</div>
<?php
global $wpdb;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dbtime WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$show_time = $row->show_time;
$server_time = $row->server_time;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Server Time</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardtimeid" value="<?php echo $id; ?>">
            	  
                 
                 <div class="form-group">
                	<label for="show_time" class="col-sm-4 control-label">Show Custom Time</label>
                	<div class="col-sm-8">
                	<select name="show_time" class="leaderboard-200365-form-control" >
                    	<option value="">Please Choose...</option>
                        <option value="on" <?php if($show_time == "on") { echo "selected"; } ?>>yes</option>
                        <option value="off" <?php if($show_time == "off") { echo "selected"; } ?>>no</option>
                    </select>
                	</div>
                 </div>
                 
                 <div class="form-group">
                	<label for="server_time" class="col-sm-4 control-label">Epoch Timestamp</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="server_time" value="<?php echo $server_time; ?>">
                	</div>
                 </div>
                 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handletimeupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handletimedelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
