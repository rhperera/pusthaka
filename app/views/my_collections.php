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



    <div class ="row">
            <div class="col-md-3 col-centered" style="left: 69px;">
                </br></br></br>
            </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Current Collections</h3>
                </div>
                
                <div class="panel-body">


                      
                    <?php

                    	foreach($data['records'] as $rec){
                          echo '<h4><span><li><a style="display: -webkit-inline-box;" href="';
                          echo ASSET_PATH.'/collections/books/'.$rec['collection_id'];
                          echo '"><p>';
                    		  echo $rec['collection_name']."";
                          echo '</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'; 
                          echo ASSET_PATH.'/collections/delete_collection/'.$rec['collection_id'];
                          echo'"><i  class="fa fa-trash-o"></i></a></li></span></h4>';
                        }
                    ?>
                      
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add a new collection</h3>
                </div>
                
                <div class="panel-body">

                    <form name="sentMessage" action="<?php echo ASSET_PATH;?>/collections/add_collection" method="post" id="contactForm" novalidate="">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Enter collection name</label>
                                <input type="text" class="form-control" name="collection_name" required="" data-validation-required-message="">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <!-- For success/fail messages -->
                        <button type="submit" class="btn btn-warning" style="text-align:center;">Add new collection</button>
                    </form>
                <br>

                        <?php 

                        if(isset($_SESSION['collection_added']))
                        {
                            if($_SESSION['collection_added']=="true")
                                {       ?>
                                    <div class="alert alert-success">
                                        Successfully added
                                    </div>
                        <?php   }elseif ($_SESSION['collection_added']=="false") { ?>
                            <div class="alert alert-danger">
                                Something went wrong
                            </div>
                        <?php }

                        unset($_SESSION['collection_added']);



                    }    ?>
               
                 </div>
            </div>
        </div>
</div>