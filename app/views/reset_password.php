<div class="container" style="height:100%;">
<div class ="row">

            <div class="col-md-3 col-centered" style="left: 69px;">
                </br></br></br>
            </div>
    </br></br>
    <div class="col-md-2">
        <h4>Enter your email</h4>
    </div>
    <div class="col-md-3">

                
                <form name="sentMessage" action="<?php echo ASSET_PATH;?>/reset_password/reset" method="post" id="contactForm" novalidate="">
                    <div class="form-group input-group">
                                <input type="text" class="form-control" name="email">
                                <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-send"></i></button></span>
                            </div>
                </form>
            </div>
            <?php if(isset($_SESSION['mail_sent']))
            {
                if($_SESSION['mail_sent']=="true")
                {
                    echo '<p>Email Sent Sucessfully<p>';
                }
                elseif($_SESSION['mail_sent']=="email_error")
                {
                    echo '<p>Email not found. Please check again<p>';
                }
                elseif($_SESSION['mail_sent']=="send_error")
                {
                    echo '<p>Error in sending mail.<p>';
                }
                unset($_SESSION['mail_sent']);
            }
            ?>
        </div>