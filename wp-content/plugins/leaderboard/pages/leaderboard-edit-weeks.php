<div class="col-md-12">
<h2>Weeks Edit <a href="https://www.epochconverter.com/" target="_blank">www.epochconverter.com</a></h2>
</div>
<?php
global $wpdb;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_weeks WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$week = $row->week;
$start_date = $row->start_date;
$end_date = $row->end_date;
$epoch_timestamp = $row->epoch_timestamp;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Weeks</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardweeksid" value="<?php echo $id; ?>">
            	<!--
                <div class="form-group">
                	<label for="id" class="col-sm-4 control-label">ID</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="id" value="<?php //echo $id; ?>">
                	</div>
                 </div> 
                 -->  
                 
                 <div class="form-group">
                	<label for="week" class="col-sm-4 control-label">Week</label>
                	<div class="col-sm-8">
                	<select name="week" class="leaderboard-200365-form-control" >
                    	<option value="">Please Choose...</option>
                        <option value="1" <?php if($week == "1") { echo "selected"; } ?>>1</option>
                        <option value="2" <?php if($week == "2") { echo "selected"; } ?>>2</option>
                        <option value="3" <?php if($week == "3") { echo "selected"; } ?>>3</option>
                        <option value="4" <?php if($week == "4") { echo "selected"; } ?>>4</option>
                        <option value="5" <?php if($week == "5") { echo "selected"; } ?>>5</option>
                        <option value="6" <?php if($week == "6") { echo "selected"; } ?>>6</option>
                        <option value="7" <?php if($week == "7") { echo "selected"; } ?>>7</option>
                        <option value="8" <?php if($week == "8") { echo "selected"; } ?>>8</option>
                        <option value="9" <?php if($week == "9") { echo "selected"; } ?>>9</option>
                        <option value="10" <?php if($week == "10") { echo "selected"; } ?>>10</option>
                        <option value="11" <?php if($week == "11") { echo "selected"; } ?>>11</option>
                        <option value="12" <?php if($week == "12") { echo "selected"; } ?>>12</option>
                    </select>
                    
                    <!--<input type="text" class="leaderboard-200365-form-control" name="week" value="<?php //echo $week; ?>">-->
                	</div>
                 </div>
                 
                 <div class="form-group">
                	<label for="start_date" class="col-sm-4 control-label">Start Date</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control custom_date" name="start_date" value="<?php echo $start_date; ?>">
                	</div>
                 </div>
                 
                 <div class="form-group">
                	<label for="end_date" class="col-sm-4 control-label">End Date</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control custom_date" name="end_date" value="<?php echo $end_date; ?>">
                	</div>
                 </div>
                 
                 <div class="form-group">
                	<label for="start_name" class="col-sm-4 control-label">Epoch Timestamp</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="epoch_timestamp" value="<?php echo $epoch_timestamp; ?>">
                	</div>
                 </div>
                  
                 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handleweeksupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handleweeksdelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
