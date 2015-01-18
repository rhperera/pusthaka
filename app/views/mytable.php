

<div class="container">
</br></br></br>
 <div class="row row-centered">

 	<div class="col-md-4 col-centered" style="left: 69px;">
 		<h1 style="margin-top: 119px; ">My Table</h1></br>
					<p><a href="<?php echo ASSET_PATH;?>/collections"><button style="width: 129px;" type="button" class="btn btn-default">My Collections</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/main/browse"><button style="width: 129px;" type="button" class="btn btn-default">Browse</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/search/quick"><button style="width: 129px;" type="button" class="btn btn-default">Advance Search</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/settings"><button style="width: 129px;" type="button" class="btn btn-default">Settings</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/uploads"><button style="width: 129px;" type="button" class="btn btn-default">Upload</button></a></p>
	</div>
	<div class="col-sm-4" >

		<h3>Pending Requests</h3>
	    <ul class="list-group">
	    	<?php
	    	foreach ($data['requests'] as $request) 
	    	{  ?>
	        	<li class="list-group-item">
	        		<?php
	        		echo $request['material_id'];
	        		echo $request['user_id']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	        		?>
	        		<a href="<?php echo ASSET_PATH;?>/settings/delete_request/
	        			<?php echo $request['material_id'];?>/<?php echo $request['user_id'];?>" 
	        		style="float: right;">DECLINE</a>&nbsp;&nbsp;

	        		<a href="<?php echo ASSET_PATH;?>/settings/grant_permission/
	        			<?php echo $request['material_id'];?>/<?php echo $request['user_id'];?>" 
	        		style="float: right;padding-right: 11px;">ACCEPT</a>
	        	</li>
	       <?php } ?>
	    </ul>
	</div>

	<div class="col-md-4 col-centered"><h3>My Books</h3></div>

	
	</div>