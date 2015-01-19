 <script type="text/javascript">
    function drop(item)
    {
        $("#"+item).slideToggle();    
    }
    
</script>

<div class="container">

      <?php if(isset($_SESSION['user_name']) and $_SESSION['user_type']=='librarian'){?>
              <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/lpanel"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/usermanager"><i class="fa fa-fw fa-table"></i>User Manager</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/main/browse"><i class="fa fa-fw fa-search"></i>Browse</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/search/quick"><i class="fa fa-fw fa-search"></i>Search</a>
                    </li>
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i>Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i>Upload</a>
                    </li>

                </ul>
            </div> <?php }?>


    
      <div class="col-lg-12" style="text-align: center;">
                    <h1 class="page-header">Inactive Books
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    
    </div>

    <div class="col-md-3 col-centered" style="left: 69px;">
        
    </div>

    <div class="col-md-8">
     
<?php
    
    foreach($data['inactive_list'] as $pair)
    {
        $id = $pair[0]->get_id();
?>      
        
        <div class="row">
            
            <div class="col-md-7">
                <h4><?php echo $pair[0]->get_name();?><small> by <?php echo $pair[0]->get_author();?></small></h4>
                <p><b>Uploaded by:</b> 
                    <?php echo $pair[1]->get_reg_number(); echo " | ";?>
                    <?php echo $pair[1]->get_full_name(); echo " | ";?> <b>on : </b>
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