<style>
     #con
    {
        background-image:url('<?php echo ASSET_PATH;?>/images/slider.jpg'); 
        background-size: cover;

        height:100%;
    	width:100%;
    }

</style>
<script type="text/javascript">
    $('#anchor1').click(function()
    {
        $('html, body').animate(
        {
            scrollTop: $( $(this).attr('class') ).offset().top
        }, 1000);
        return false;
    });

  
</script>
<!-- Navigation -->
<?php //include('slider.php')?>
<!-- Page Content -->
<div id="con">
    <div class="container">

        <?php //include('panel.php');?>
        <!--Search box-->
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            
          </div>
        <div class="col-md-2"></div>
        </div>


        

    </div>
</div>

<div class="container">
    <br><br>

<!--the sign in form-->
<?php if(!isset($_SESSION['user_name'])){  ?>
<div class="row">
    <div class="col-lg-3">
                <h3>Sign In</h3>
                <br>
                <form role="form" action="" method="post" enctype="plain"> 
                  <div class="form-group">
                    <label for="name1" style="font-weight: 100 !important;">Username</label>
                    <input type="username" name="username" class="form-control" id="name1" placeholder="Username">
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
                  <button style="width: 100%;" type="submit" class="btn btn-large btn-success">Sign In</button>
                </form>
            </div>
        </div>
<?php } ?>

    <div class="row">
    <!--      <?php
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




