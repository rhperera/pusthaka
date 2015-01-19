<link href="<?php echo ASSET_PATH;?>/css/sb-admin.css" rel="stylesheet">

<div class="container">

 <div class="row row-centered">

                 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li class="active">
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>

                </ul>
            </div>

 	<div class="col-md-3 col-centered" style="left: 69px;">
 		</br></br></br>
 		<h1 style="margin-top: 119px; ">My Table</h1></br>
		<p><a href="<?php echo ASSET_PATH;?>/collections"><button style="width: 129px;" type="button" class="btn btn-default">My Collections</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/main/browse"><button style="width: 129px;" type="button" class="btn btn-default">Browse</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/search/quick"><button style="width: 129px;" type="button" class="btn btn-default">Advance Search</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/settings"><button style="width: 129px;" type="button" class="btn btn-default">Settings</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/uploads"><button style="width: 129px;" type="button" class="btn btn-default">Upload</button></a></p>
	</div>
	<div class="col-sm-4" style="left: 25px;" >
		</br>
		<h3>Pending Requests</h3>
		</br>
	    <ol class="list-group">
	    	<?php
	    	$num = count($data['requests']);
	    	for($i = 0; $i < $num; $i++) 
			{   ?>
	        	<li class="list-group-item">
	        		<?php
	        		echo $data['request_details'][$i]['full_name'].'&nbsp;&nbsp;<i style="color:blue" class="fa fa-hand-o-right"></i>';
	        		echo $data['request_details'][$i]['name']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	        		?>
	        		<a href="<?php echo ASSET_PATH;?>/settings/delete_request/<?php echo $data['requests'][$i]['material_id'];?>/<?php echo $data['requests'][$i]['user_id'];?>" 
	        		style="float: right;"><i  class="fa fa-trash-o"></i></a>&nbsp;&nbsp;

	        		<a href="<?php echo ASSET_PATH;?>/settings/grant_permission/<?php echo $data['requests'][$i]['material_id'];?>/<?php echo $data['requests'][$i]['user_id'];?>" 
	        		style="float: right;padding-right: 11px;"><i  class="fa fa-check"></i></a>
	        	</li>
	       <?php } ?>
	    </ol>
	</div>

	<div class="col-sm-4" style="left: 25px"></br>
		<h3>My Uploads</h3>
		</br>
		<ul>
	<?php foreach ($data['books'] as $key) 
			{	?>
			<li><a href="<?php echo ASSET_PATH?>/main/item/<?php echo $key['material_id']?>">
				<?php echo $key['name'];?></a>&nbsp;by&nbsp;<?php echo $key['author'];?></li>
			<?php } ?>
		</ul>
	</div>

	
	</div>