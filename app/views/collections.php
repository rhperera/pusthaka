<script>
  function do_search(collection_id){
      var a = $('#search_box2').val();
      if(a.length<3)
      {
          $('#search_box2').css("color","red");
      }
      else
      {
          location = '<?php echo ASSET_PATH;   echo '/collections/books/';?>'+collection_id+'/'+a;
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
                    <h1 class="page-header">My Collection
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>

  <div class="col-md-12">

            <div class="col-md-3">
                </br></br></br>
            </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search Books</h3>
                </div>
                
                <div class="panel-body">

                    <form name="sentMessage" action="<?php echo ASSET_PATH;?>/collections/add_collection" method="post" id="contactForm" novalidate="">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Enter a name</label>
                                <input type="text" class="form-control" id="search_box2">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <!-- For success/fail messages -->
                        <button class="btn btn-default" onclick="do_search(<?php echo  $data['collection_id'];?>)" type="button">Search</button>
                    </form>               
                 </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $data['collection_name'][0]['collection_name'];?></h3>
                </div>
                
                <div class="panel-body">

                          <?php foreach ($data['books'] as $key) { ?>
                          
                            <li><h4>
                              <a href="<?php echo ASSET_PATH?>/main/item/<?php echo $key['material_id']?>">
                                <?php echo $key['name'] ?></a>
                              by <?php echo " ".$key['author'];  ?>&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="<?php echo ASSET_PATH?>/collections/remove_material_from_collection/<?php 
                              echo $key['material_id']?>/<?php 
                              echo  $data['collection_id'];?>">
                                <i  class="fa fa-trash-o"></i></a>
                            </li>
                            </h4>

                          <?php }  ?>
                      
                </div>
            </div>
        </div>
</div>

<div class="col-md-12">
            <div class="col-md-3">
                </br></br></br>
            </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search Results</h3>
                </div>

                   <?php
                    $i=1;
                    foreach($data['quick_results'] as $row)
                    {
                    ?>
                
                <div class="panel-body">

                        <a href="<?php echo ASSET_PATH?>posts/item/<?php echo $row['material_id']?>">

                        </a>
                        <p>
                            <a href="<?php echo ASSET_PATH?>/main/item/<?php echo $row['material_id']?>"><?php echo $row['name'];?></a>
                        <a href="<?php echo ASSET_PATH?>/collections/add_book_to_collection/<?php echo $row['material_id']."/".$data['collection_id'];?>">
                          ADD</a></p>
                        <p>by <?php echo $row['author']; ?></p>

                        <?php if(isset($_SESSION['user_name']) and $_SESSION['user_type']=="librarian")
                            {  ?>
                        <a href="<?php echo ASSET_PATH;?>/Lpanel/review/<?php echo $row['material_id']; ?>">Review Book</a>
                        <?php }?>



                 </div>
                    <?php 
        if($i%1==0)
        { ?>
    </div>
    <?php if($i==16)
    {   break;}
    else
    { ?>
        </div>

            <div class="row"><?php } } ?>
            <?php

                $i = $i+1;

            } ?>
            </div>

     
  </div>
</div>
