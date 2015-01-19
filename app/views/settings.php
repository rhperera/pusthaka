<div class="container">

 <div class="row row-centered">
<?php  if(isset($_SESSION['user_name']) and $_SESSION['user_type']=='user') {?>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
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
                        <a href="<?php echo ASSET_PATH;?>/search/quick"><i class="fa fa-fw fa-search"></i> Advanced Search</a>
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
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
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
                        <a href="<?php echo ASSET_PATH;?>/search/quick"><i class="fa fa-fw fa-search"></i> Advanced Search</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i> Upload</a>
                    </li>                    
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i> Settings</a>
                    </li>


                </ul>
            </div> <?php }?>


    <div class="col-md-3 col-centered" style="left: 69px;">
        
    </div>
    
    <div class="col-md-3">

                <h3>Change password</h3>
                <form name="sentMessage" action="<?php echo ASSET_PATH;?>/settings/update_password" method="post" id="contactForm" novalidate="">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Enter old password</label>
                            <input type="password" class="form-control" name="old_password" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Enter new password</label>
                            <input type="password" class="form-control" name="new_password" required="" data-validation-required-message="">
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
                <?php }

                unset($_SESSION['password_change']);



            }    ?>
               
            </div>
    </div>