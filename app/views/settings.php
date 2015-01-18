<div class="container">
</br></br></br>
 <div class="row row-centered">
<div class="col-md-4" style=" left: 69px;">
        <h1 style="margin-top: 119px; ">Settings</h1>
            </br>
        <p><a href="<?php echo ASSET_PATH;?>/collections"><button style="width: 129px;" type="button" class="btn btn-default">My Collections</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/main/browse"><button style="width: 129px;" type="button" class="btn btn-default">Browse</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/search/quick"><button style="width: 129px;" type="button" class="btn btn-default">Advance Search</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/mytable"><button style="width: 129px;" type="button" class="btn btn-default">Dashboard</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/uploads"><button style="width: 129px;" type="button" class="btn btn-default">Upload</button></a></p>

            </div>
    
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