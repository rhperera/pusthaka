<div class="container">

<div class="col-lg-12">
                <h1 class="page-header">Settings</h1>
            </div>
<div class="row">
     <div class="col-md-3"></div>
    
    <div class="col-md-3">
                <h3>Change password</h3>
                <form name="sentMessage" action="<?php echo ASSET_PATH;?>/settings/update_password" method="post" id="contactForm" novalidate="">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Enter old password</label>
                            <input type="text" class="form-control" name="old_password" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Enter new password</label>
                            <input type="tel" class="form-control" name="new_password" required="" data-validation-required-message="">
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