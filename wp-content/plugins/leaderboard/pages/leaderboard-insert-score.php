
<h2>Scores - Add New Score (Tickbox)</h2>

<div class="col-md-8">
	<div class="panel panel-primary">
    	<div class="panel-heading">
        	<h3 class="panel-title">Scores Information</h3>
        </div>
        <div class="panel-body">
        	
            <form action="" method="post">
            
            	<input type="hidden" name="namesid" value="">
                <input type="hidden" name="display" value="yes">
                <input type="hidden" name="show_subheader" value="no">
                <input type="hidden" name="scoretype" value="1">
 
                 <div class="form-group">
                	<label for="frmName" class="col-sm-4 control-label">Description</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="description" value="">
                	</div>
                    
                    <label for="frmName" class="col-sm-4 control-label">Points</label>
                	<div class="col-sm-8">
                	<input type="text" class="leaderboard-200365-form-control" name="points" value="">
                	</div>
                 </div> 
                 
                 
                 <div class="col-sm-8 col-sm-offset-4">
                 	<button type="submit" name="listaction" value="handleinsertscore" class="btn btn-success">Add new score type</button>
                   
                 </div>
                 
            </form>
            
        </div>
    </div>

</div>