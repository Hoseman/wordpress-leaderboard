<?php


?>
<h2>Leaderboard Time - Add A Custom Time Value</h2>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Custom Time Information <a style="font-size:85%;" href="https://www.epochconverter.com/" target="_blank"> www.epochconverter.com</a></h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="leaderboardtimeid" value="">
 
                 <div class="form-group">
                    
                    <label for="start_date" class="col-sm-4 control-label">Show Custom Time</label>
                	<div class="col-sm-8">
                	<select name="show_time" class="leaderboard-200365-form-control" >
                    	<option value="">Please Choose...</option>
                        <option value="on">yes</option>
                        <option value="off">no</option>
                    </select>
                	</div>
                   
                 </div> 
                 
                 <div class="form-group">
                    
                    <label for="start_date" class="col-sm-4 control-label">Epoch Timestamp</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="server_time" value="">
                	</div>
                   
                 </div> 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handleinserttime" class="btn btn-success">Add Custom Time</button>
                   
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>



