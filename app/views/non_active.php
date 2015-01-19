 <script type="text/javascript">
    function drop(item)
    {
        $("#"+item).slideToggle();    
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
                    <h1 class="page-header">Inactive Books
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>





            <div class="col-md-3">
                </br></br></br>
            </div>


            <?php
                
                foreach($data['inactive_list'] as $pair)
                {
                    $id = $pair[0]->get_id();
            ?>      
        

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $pair[0]->get_name();?></h3>
                </div>
                
                <div class="panel-body">    
                    <p><b>Uploaded By:</b> 
                        <?php echo $pair[1]->get_reg_number(); ?>
                        <?php echo $pair[1]->get_full_name(); ?> <br>
                    <b>Uploaded On :</b>
                        <?php echo $pair[0]->get_upload_date();?></p>

                    <a  href="javascript:drop(<?php echo $id;?>);">Approve</a>
                    <a  href="<?php echo ASSET_PATH; echo '/Lpanel/review/'; echo $id;?>" style="padding-left:10px;">Review</a>
                
                <div class="row">
                    <div class="col-md-5">
                        <div id="<?php echo $id;?>" style="display: none">
                              <br>
                            <strong>Are You Sure</strong>
                             <a  href="<?php echo ASSET_PATH; echo '/Lpanel/authenticate/'; echo $id;?>">YES</i></a>
                             <a  href="javascript:drop(<?php echo $id;?>);">NO</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->
<?php    }?>

</div>
