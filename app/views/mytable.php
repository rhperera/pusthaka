<div class="container">



                <?php  if(isset($_SESSION['user_name']) and $_SESSION['user_type']=='user') {?>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/mytable"><i class="fa fa-fw fa-dashboard"></i>My Table</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/collections"><i class="fa fa-fw fa-table"></i>My Collections</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/main/browse"><i class="fa fa-fw fa-search"></i>Browse</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/search/quick"><i class="fa fa-fw fa-search"></i>Search</a>
                    </li>
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i>Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i>Upload</a>
                    </li>

                </ul>
            </div>
    <?php } elseif(isset($_SESSION['user_name']) and $_SESSION['user_type']=='librarian'){?>
              <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/lpanel"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/usermanager"><i class="fa fa-fw fa-table"></i>User Manager</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/main/browse"><i class="fa fa-fw fa-search"></i>Browse</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/search/quick"><i class="fa fa-fw fa-search"></i>Search</a>
                    </li>
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i>Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i>Upload</a>
                    </li>

                </ul>
            </div> <?php }?>

                    <div class="col-lg-12" style="text-align: center;">
                    <h1 class="page-header">My Table
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>





	<div class ="row">

            <div class="col-md-3 col-centered" style="left: 69px;">
                </br></br></br>
            </div>
		
        <div class="col-md-4">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pending Requests</h3>
                </div>
                
                <div class="panel-body">
				
			    	<?php
			    	$num = count($data['requests']);
			    	for($i = 0; $i < $num; $i++) 
					{   ?>
			        	<li>
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
			    
                </div>
            </div>
		</div>


		<div class="col-md-4">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">My Uploads</h3>
                </div>
                
                <div class="panel-body">
                
							<?php foreach ($data['books'] as $key) 
							{	?>
							<li><a href="<?php echo ASSET_PATH?>/main/item/<?php echo $key['material_id']?>">
								<?php echo $key['name'];?></a>&nbsp;by&nbsp;<?php echo $key['author'];?></li>
							<?php } ?>
						
                </div>
            </div>
		</div>
	</div>


