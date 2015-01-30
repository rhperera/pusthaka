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

                <h3>Change Password</h3>
                <span> <?php 

                if(isset($_SESSION['password_change']))
                {
                    
                    if($_SESSION['password_change']=="true")
                        {       ?>
                            
                                <p style="color:blue">Successfully changed</p>
                            
                <?php   }elseif ($_SESSION['password_change']=="false") { ?>
                    
                        <p style="color:red">Wrong password</p>
                    
                <?php 

                }elseif ($_SESSION['password_change']=="missmatch") { ?>
                    
                        <p style="color:red">Passwords do not match</p>
                    
                <?php }

                unset($_SESSION['password_change']);



            }    ?></span>
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

               
               
    </div>

    <div class="col-md-4">

                <h3>Add user</h3>
                <span> <?php 

                if(isset($_SESSION['register_user']))
                {
                    
                    if($_SESSION['register_user']=="success")
                        {       ?>
                            
                                <p style="color:blue">Successfully added</p>
                            
                <?php   }elseif ($_SESSION['register_user']=="unsuccess") { ?>
                    
                        <p style="color:red">Error in adding. Check again</p>
                    
                <?php 

                }elseif ($_SESSION['register_user']=="wrong_password") { ?>
                    
                        <p style="color:red">Passwords do not match</p>
                <?php
                }elseif ($_SESSION['register_user']=="fill_all") { ?>
                    
                        <p style="color:red">Please fill all fields</p>
                    
                <?php }

                unset($_SESSION['register_user']);



            }    ?></span>
                <form name="sentMessage" action="<?php echo ASSET_PATH;?>/users/add_user" method="post" id="contactForm" novalidate="">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>User Name</label>
                            <input type="text" class="form-control" name="user_name" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required="" data-validation-required-message="">
                        <div class="help-block"></div></div>
                    </div>

                     <div class="control-group form-group">
                        <div class="controls">
                            <label>Renter password</label>
                            <input type="password" class="form-control" name="again_password" required="" data-validation-required-message="">
                        <div class="help-block"></div></div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="full_name" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Registration number</label>
                            <input type="text" class="form-control" name="reg_number" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>


                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Batch year</label>
                            <input type="text" class="form-control" name="batch_year" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-default" style="padding: 6px 73px;">Add User</button>
                </form>
            </div>
</div>