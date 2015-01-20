<style>


.carousel { z-index: -99; } /* keeps this behind all content */

.carousel .item {
    position: fixed; 
    width: 100%; height: 100%;
    -webkit-transition: opacity 1s;
    -moz-transition: opacity 1s;
    -ms-transition: opacity 1s;
    -o-transition: opacity 1s;
    transition: opacity 1s;
 
}
.carousel .one {
    background: url('<?php echo ASSET_PATH;?>/images/slider-1.jpg');
    background-size: cover;
    -moz-background-size: cover;
}
.carousel .two {
    background: url('<?php echo ASSET_PATH;?>/images/slider-2.jpg');
    background-size: cover;
    -moz-background-size: cover;
}
.carousel .three {
    background: url('<?php echo ASSET_PATH;?>/images/slider-3.jpg');
    background-size: cover;
    -moz-background-size: cover;
}
.carousel .active.left {
    left:0;
    opacity:0;
    z-index:2;
}

</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('.carousel').carousel({interval: 4000});
  });
</script>


<!-- Navigation -->
<?php //include('slider.php')?>

    
<div id="myCarousel" class="carousel container slide">
  <div class="carousel-inner">
            <div class="active item one"></div>
            <div class="item two"></div>
            <div class="item three"></div>
  </div>
</div>

<div id="con">

    <div class="container" style="background-color:transparent !important">
    <div class="row" style="top:3%;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="background-color:rgba(255, 255, 255, 0.8); text-align:justify; padding:0 20px 10px 20px; -webkit-border-radius: 0 0 10px 10px; -moz-border-radius: 0 0 10px 10px;">
        <h3 style="text-align:center;">UCSC Digital Library</h3>
        <p>UCSC Digital Library (UCSC-DL) is an online e-Repository which mainly contains published materials of UCSC students and staff, namely undergraduate, masters and research level dissertations, thesis and published research papers. In addition, UCSC-DL contains electronic materials shared among internal staff. Only authorized personnel will be allowed to access library materials but selected materials as listed here, could be accessed without login into the system. This repository is updated regularly, and new works are added to collections on a continuous basis.</p>
        </div>
    </div>
    </div>



    <div class="container" style="bottom:5%; left: 0; right: 0; position:absolute; background-color:rgba(255, 255, 255, 0.25); -webkit-border-radius: 10px 0 10px 0px;">
            <div class="col-md-12"><h3 style="color:#fff;">Recent Books</h3></div>


                         <?php //include('panel.php');?>
                        <!--Search box-->
                         <?php
                            $i=1;
                            foreach($data['recents'] as $row)
                            {
                            ?>

                  <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <a href="<?php echo ASSET_PATH;?>/main/item/<?php echo $row['material_id'];?>"><h3 class="panel-title"><?php echo $row['name'];?></h3></a>
                        </div>

                         <div class="panel-body">
                                <h5>by <?php echo $row['author'];?></h5>
                                <p><?php echo $row['description']?></p>
                         </div>
              
                    </div>
                  </div>

                        <?php if($i%3==0)
                        { ?> 
            </div>


                    <div class="row"> 
                    <?php }
                    $i=$i+1; }?>
                     </div>  


    
   



    <!-- /.row -->

 

    <!-- Footer -->
<!-- /.container -->




