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
                    </div> 
                <?php }?>

                    <div class="col-lg-12" style="text-align: center;">
                    <h1 class="page-header">Settings
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>





            <div class="col-md-3">
                </br></br></br>
            </div>
    
    <div class="col-md-4">

                <h3>Change password</h3>
                <form name="sentMessage" action="<?php echo ASSET_PATH;?>/settings/update_password" method="post" id="contactForm" novalidate="">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Old password</label>
                            <input type="password" class="form-control" name="old_password" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>New password</label>
                            <input type="password" class="form-control" name="new_password" required="" data-validation-required-message="">
                        <div class="help-block"></div></div>
                    </div>

                     <div class="control-group form-group">
                        <div class="controls">
                            <label>Enter Again</label>
                            <input type="password" class="form-control" name="again_password" required="" data-validation-required-message="">
                        <div class="help-block"></div></div>
                    </div>

                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-default" style="padding: 6px 73px;">Change password</button>
                </form>
                <br>

                <?php 

                if(isset($_SESSION['password_change']))
                {
                    
                    if($_SESSION['password_change']=="true")
                        {       ?>
                            <div class="alert alert-success">
                                Successfully changed
                            </div>
                <?php   }elseif ($_SESSION['password_change']=="false") { ?>
                    <div class="alert alert-danger">
                        Wrong password
                    </div>
                <?php 

                }elseif ($_SESSION['password_change']=="missmatch") { ?>
                    <div class="alert alert-danger">
                        Passwords do not match
                    </div>
                <?php }

                unset($_SESSION['password_change']);



            }    ?>
               
    </div>

        <div class="col-md-4">

                <h3>Change Home Page Text</h3>
                <form name="sentMessage" action="" method="post" id="contactForm" novalidate="">
                            <div class="form-group">
                                <label>Enter New Text</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>

                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-default" style="padding: 6px 73px;">Save</button>
                </form>
                <br>
         </div>

</div>