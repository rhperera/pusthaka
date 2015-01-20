<!-- Page Content -->
<script>
  function do_search(){
      var a = $('#search_box2').val();
      if(a.length<3)
      {
          $('#search_box2').css("color","red");
      }
      else
      {
          location = '<?php echo ASSET_PATH;   echo '/search/quick/';?>'+a;
      }
  }
</script>


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
<div class="container"  style="height:100%;" >
  

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
                    <h1 class="page-header">Search
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>







    <!-- <div class="col-lg-4">
            <div class="input-group">
                <input type="text" class="form-control" id="search_box2">
                <span class="input-group-btn">
                    <button class="btn btn-default" onclick="do_search()" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>-->
       
    <!-- /.row -->
    </br>
    <!-- Projects Row -->
    <div class="row">
    
    <?php
    $i=1;
    foreach($data['quick_results'] as $row)
    {
    ?>
        <div class="col-md-4" style="left:25%;">
            <div class="panel panel-default">
                    <div class="panel-heading">
                            <a href="<?php echo ASSET_PATH?>posts/item/<?php echo $row['material_id']?>">

                            </a>
                            <h4>
                                <a href="<?php echo ASSET_PATH?>/main/item/<?php echo $row['material_id']?>"><?php echo $row['name'];?></a>
                            </h4>
                    </div>
                        <div class="panel-body">
                            <p>by <?php echo $row['author']; ?></p>

                            <?php if(isset($_SESSION['user_name']) and $_SESSION['user_type']=="librarian")
                                {  ?>
                            <a href="<?php echo ASSET_PATH;?>/Lpanel/review/<?php echo $row['material_id']; ?>">Review Book</a>
                            <?php }?>
                         </div>
              
                    </div>
                  </div>

        <?php 
        if($i%2==0)
        { ?>
    
    </div>

    <?php if($i==16)
    {   break;}
    else
    { ?>

            <div class="row">
                <?php } } ?>
                <?php

                    $i = $i+1;

                } ?>
            </div>

     </div>
   
    </div>
    <!-- /.row -->



    <!-- Pagination
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>-->
    <!-- /.row -->
