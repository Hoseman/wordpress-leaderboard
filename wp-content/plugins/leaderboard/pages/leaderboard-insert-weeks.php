<?php


?>
<h2>Weeks - Add New Week <a href="http://www.epochconverter.com" target="_blank">www.epochconverter.com</a></h2>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Week Information</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="namesid" value="">
 
                 <div class="form-group">
                 
                	<label for="week" class="col-sm-4 control-label">Week Number</label>
                	<div class="col-sm-8">
                	<!--<input type="text" class="leaderboard-200365-form-control" name="week" value="">-->
                    
                      <!-- Count the admin scores -->

					<?php
                    global $wpdb;
                    // count the number of results in lb_email_results - then display the insert button
                    $numRows = $wpdb->get_var( "SELECT count(*) FROM " . $wpdb->prefix . "lb_weeks");
                    ?>
                    <!-- End Count the admin scores -->
                    
                    <select name="week" class="leaderboard-200365-form-control" >
                    
                    
                  
                    
                    
                    	<!--<option value="">Please Choose...</option>-->
                        <option value="<?php echo $numRows + 1 ?>">Week <?php echo $numRows + 1 ?></option>
                    </select>
                	</div>
                    
                    <label for="start_date" class="col-sm-4 control-label">Start Date</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control custom_date" name="start_date" value="">
                	</div>
                    
                    <label for="end_date" class="col-sm-4 control-label">End Date</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control custom_date" name="end_date" value="">
                	</div>
                    
                    <label for="start_name" class="col-sm-4 control-label">Epoch Timestamp</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="epoch_timestamp" value="">
                	</div>
                   
                 </div> 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handleinsertweek" class="btn btn-success">Add new week</button>
                   
                 </div>
                 
            </form>
            
        </div>
    </div>
    

    
    

</div>



