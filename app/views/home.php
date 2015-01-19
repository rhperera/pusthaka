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

    <div class="container" style="background-color:transparent !important">
    <div class="row" style="top:3%;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="background-color:rgba(255, 255, 255, 0.8); text-align:justify; padding:0 20px 10px 20px; -webkit-border-radius: 0 0 10px 10px;">
        <h3>UCSC Digital Library</h3>
        <p>UCSC Digital Library (UCSC-DL) is an online e-Repository which mainly contains published materials of UCSC students and staff, namely undergraduate, masters and research level dissertations, thesis and published research papers. In addition, UCSC-DL contains electronic materials shared among internal staff. Only authorized personnel will be allowed to access library materials but selected materials as listed here, could be accessed without login into the system. This repository is updated regularly, and new works are added to collections on a continuous basis.</p>
        </div>
    </div>
    </div>

<!--<div class="container" style="background-color:transparent !important">
    <div class="col-md-3">
                
                    <a href="<?php echo ASSET_PATH; ?>/mytable" class="list-group-item">My Table</a>
                    
                    <a href="<?php echo ASSET_PATH; ?>/main/browse" class="list-group-item">Browse Books</a>

               
            </div>
        </div>-->

    <div class="container" style="bottom:10%; left: 0; right: 0; position:absolute; background-color:rgba(255, 255, 255, 0.25);">
    <h3 style="color:#fff;">Recent Books</h3>



    <div class="row">
        <?php //include('panel.php');?>
        <!--Search box-->
         <?php
            $i=1;
            foreach($data['recents'] as $row)
            {
            ?>
         <a href="<?php echo ASSET_PATH;?>/main/item/<?php echo $row['material_id'];?>">
            <div class="col-lg-3" style="background-color:#000; padding:10px; width:24.5%; margin:5px; ">
                    <h4 style="margin-top:2px; color:#fff;"><?php echo $row['name'];?></h4>
                    <h5>by <?php echo $row['author'];?></h5>
                    <p><?php echo $row['description']?></p>
        </div></a>
        <?php  
                if($i%4==0)
                { ?> 
        </div>
            <div class="row"> <?php }
            $i=$i+1;
        }?>

         


    </div>  
    </div>

</div>

<div class="container">
    <br><br>

        <!--the sign in form
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
                  
                  <br>
                  <button style="width: 100%;" type="submit" class="btn btn-large btn-default">Sign In</button>
                </form>
            </div>
        </div>
        <?php } ?>-->

    

   



    <!-- /.row -->

 

    <!-- Footer -->
<!-- /.container -->




