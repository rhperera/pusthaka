
<div class="container">
<style type="text/css">
    h1{
        color: white;
    }
    
    body 
    {
        background-color: rgb(68, 68, 113);
        background-repeat:no-repeat;
        /* custom background-position */
        background-position:50% 50%;
        /* ie8- graceful degradation */
        background-position:50% 50%9 !important;
    }
</style>



<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" align="center">
                    Welcome to The Digital Library
                </h1>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4></i>Sign in</h4>
                    </div>
                    <div class="panel-body">
                        <form action ="<?php base_url()?>login" method="post">
                            <?php
                                if($error==1)
                                {
                                    echo '<p style="color: red;">username / password did not match</p>';
                                }
                            ?>
                            <label>User Name</label>
                                <input  align="center" type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name." name="user_name" placeholder="Username" >
                            <p class="help-block"></p>
                            <label>Password</label>
                                <input type="password" class="form-control" id="password" required data-validation-required-message="Please enter your Password." name="password" placeholder="Password"  >
                            <p class="help-block"></p>
                            <input type="submit" class="btn btn-primary" placeholder="sad" value="Sign in" align="center">
                        </form> 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
