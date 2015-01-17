<style>
     #con
    {
        background-image:url('<?php echo ASSET_PATH;?>/images/slider.jpg'); 
        background-size: cover;

        height:100%;
    	width:100%;
    }
</style>

<!-- Navigation -->
<?php //include('slider.php')?>
<!-- Page Content -->
<div id="con">

    <div class="container" style="bottom:10%; left: 0; right: 0; position:absolute; background-color:rgba(255, 255, 255, 0.25);">
    <h3 style="color:#fff;">Recent Books</h3>



    <div class="row" style="z-index:-1;">
        <?php //include('panel.php');?>
        <!--Search box-->

         <div class="col-lg-3" style="background-color:#000; padding:10px; width:24.5%; margin:5px; ">
                    <h3 style="margin-top:2px; color:#fff;">Material Name</h3>
                    <p>hello</p>
        </div>

         <div class="col-lg-3" style="background-color:#000; padding:10px; width:24%; margin:5px; ">   
                     <h3 style="margin-top:2px; color:#fff;">Material Name</h3>
                    <p>hello</p>
        </div>

         <div class="col-lg-3" style="background-color:#000; padding:10px; width:24%; margin:5px; "> 

                    <h3 style="margin-top:2px; color:#fff;">Material Name</h3>
                    <p>hello</p>

        </div>

        <div class="col-lg-3" style="background-color:#000; padding:10px; width:24%; margin:5px; ">
                    <h3 style="margin-top:2px; color:#fff;">Material Name</h3>
                    <p>hello</p>

        </div>


    </div>  
    </div>

</div>

<div class="container">
    <br><br>

        <!--the sign in form-->
        <?php if(!isset($_SESSION['user_name'])){  ?>
        <div class="row" id="sign">
            <div class="col-lg-3">
                <h3>Sign In</h3>
                <br>
                <form role="form" action="<?php echo ASSET_PATH; ?>/users/login" method="post" enctype="plain" > 
                  <div class="form-group">
                    <label for="name1" style="font-weight: 100 !important;">Username</label>
                    <input type="username" name="user_name" class="form-control" id="name1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password" style="font-weight: 100 !important;">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <!--<div class="form-group">
                    <label>Your Text</label>
                    <textarea class="form-control" name="Message" rows="3"></textarea>
                  </div>-->
                  <br>
                  <button style="width: 100%;" type="submit" class="btn btn-large btn-default">Sign In</button>
                </form>
            </div>
        </div>
        <?php } ?>

    <!-- <div class="row">
            <?php
            $i=1;
            foreach($data['recents'] as $row)
            {
            ?>
                <div class="col-md-3 img-portfolio">

                    <h4>
                        <a href="<?php echo ASSET_PATH; echo '/main/item/'; echo $row['material_id']?>"><?php echo $row['name'];?></a>
                    </h4>
                    <p>by <?php echo $row['author']; ?></p>
                </div>
                
                <?php
                if($i%2==0)
                { ?>

          </div>

    <?php if($i==9)
    {   break;}
    else
    { ?>
            <div class="row"><?php } } ?>
            <?php

                $i = $i+1;

            } ?>         
            </div>

    /.row -->



    <!-- /.row -->

 

    <!-- Footer -->
<!-- /.container -->




