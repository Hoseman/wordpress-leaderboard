<h2>Names Edit</h2>
<?php
global $wpdb;



$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_names WHERE id=$id;";
$row = $wpdb-> get_row($SQL);


$id = $row->id;
$firstname = $row->firstname;
$lastname = $row->lastname;
$dealeridkey = $row->dealerid;

?>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Names</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardeditid" value="<?php echo $id; ?>">
            	
                 
                 <div class="form-group">
                	<label for="frmFirstname" class="col-sm-4 control-label">First Name</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="firstname" value="<?php echo $firstname; ?>">
                	</div>
                 </div> 
                 
                 <div class="form-group">
                	<label for="frmLastname" class="col-sm-4 control-label">Last Name</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="lastname" value="<?php echo $lastname; ?>">
                	</div>
                 </div> 
                 
                  <div class="form-group">
                	<label for="frmLastname" class="col-sm-4 control-label">Dealership</label>
                	<div class="col-sm-8">
                
                    	<select class="leaderboard-200365-form-control" name="dealership">
                        	<option>Please choose...</option>
						   <?php
						   
						    $valid = true;
							$SQL = "SELECT * FROM " . $wpdb->prefix . "lb_dealers;";
							$formData = $wpdb-> get_results($SQL);
							
							
							if (!$formData) {
								$valid = false;
								echo $error =  '<p>No results to display</p>';
							}
							if($valid) {
								foreach ($wpdb->get_results($SQL) as $key => $row) {
									
									$dealerid = $row->id;
									$dealer = $row->dealer;
									
									?>

									<option value="<?php echo $dealerid . $dealer ?>" <?php if($dealeridkey == $dealerid){ echo "selected";} ?>><?php echo $dealer ?></option>
                                    <?php
									
								}
							}
							
					
                           
                           ?>                         
                   
                       </select>
					   	
                	</div>
                 </div> 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handlenamesupdate" class="btn btn-success">Update</button>
                    <button type="submit" name="listaction" value="list" class="btn btn-warning">Cancel</button>
                    <button type="submit" name="listaction" value="handlenamesdelete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>
