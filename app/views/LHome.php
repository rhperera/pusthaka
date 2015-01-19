<style>
     #con
    {
        background-image:url('<?php echo ASSET_PATH;?>/images/slider.jpg'); 
        background-size: cover;

        height:100%;
        width:100%;
    }
</style>

<div id="con">

<div class="container" style="height:100%;">



                <?php  if(isset($_SESSION['user_name']) and $_SESSION['user_type']=='user') {?>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" >
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/mytable"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/collections"><i class="fa fa-fw fa-table"></i> My Collections</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/main/browse"><i class="fa fa-fw fa-file"></i> Browse</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/search"><i class="fa fa-fw fa-search"></i> Advanced Search</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i> Upload</a>
                    </li>                    
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i> Settings</a>
                    </li>


                </ul>
            </div>
    <?php } elseif(isset($_SESSION['user_name']) and $_SESSION['user_type']=='librarian'){?>
              <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/lpanel"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/usermanager"><i class="fa fa-fw fa-table"></i> User Manager</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/main/browse"><i class="fa fa-fw fa-file"></i> Browse</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/search"><i class="fa fa-fw fa-search"></i> Advanced Search</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i> Upload</a>
                    </li>                    
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i> Settings</a>
                    </li>


                </ul>
            </div> <?php }?>



                    <div class="col-lg-12" style="text-align: center;">
                    <h1 class="page-header">Welcome
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>


            <div class="col-md-3 col-centered" style="left: 69px;">
                </br></br></br>
            </div>

                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="huge"><?php echo $data['all_users'][0]['user_count']; ?></div>
                                        <div>Total Books</div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="huge"><?php echo $data['inactives'][0]['inactive_books']; ?></div>
                                        <div>New Materials!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo ASSET_PATH; echo '/Lpanel/inactives'?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Awaiting Approval</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>




                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="huge"><?php echo $data['all_users'][0]['user_count']; ?></div>
                                        <div>Total Users</div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="huge"><?php echo $data['banned_users'][0]['user_count']; ?></div>
                                        <div>Banned Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo ASSET_PATH; echo '/usermanager'?>">
                                <div class="panel-footer">
                                    <span class="pull-left">User Manager</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

