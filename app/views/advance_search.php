<script>
  function tog(name)
  {
    $('#'+name).toggle();
    $('#'+name).val('');
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
<div class="container">
  

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
                    <h1 class="page-header">Advanced Search
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>



    <div class ="row">

            <div class="col-md-3 col-centered" >
                </br></br></br>
            </div>

            <div class="col-lg-4">
                <h3>Sort search by</h3>
            </div>

            <div class="col-md-3 col-centered">
                </br></br></br>
            </div>


  <div class="row">

            <div class="col-md-3" style="left: 69px;">
                
            </div>

          <div class="col-lg-3" style="width: 23%;">
            <div class="control-group form-group">
                <div class="controls">
                    <label>Full or Part of Title</label>
                    <div class="input-group">
                    <input type="text" id="title" class="form-control" name="name" required data-validation-required-message="Please enter.">
                    <span class="input-group-btn">
                        <button class="btn btn-default" onclick="tog('title')" type="button"><i class="fa fa-check-square"></i></button>
                    </span>
                  </div>
                    <p class="help-block"></p>
                </div>
            </div>
          </div>


          <div class="col-lg-3" style="width: 23%;">
            <div class="control-group form-group">
                <div class="controls">
                    <label>Name of Author</label>
                    <div class="input-group">
                    <input type="text" id="author" class="form-control" name="name" required data-validation-required-message="Please enter.">
                    <span class="input-group-btn">
                        <button class="btn btn-default" onclick="tog('author')" type="button"><i class="fa fa-check-square"></i></button>
                    </span>
                  </div>
                </div>
            </div>
          </div>

            <div class="col-md-3">
                
            </div>

          <div class="col-lg-3" style="width: 23%;">
            <div class="control-group form-group">
                <div class="controls">
                    <label>Uploaded User</label>
                    <div class="input-group">
                    <input type="text" id="username" class="form-control" name="name" required data-validation-required-message="Please enter.">
                    <span class="input-group-btn">
                        <button class="btn btn-default" onclick="tog('username')" type="button"><i class="fa fa-check-square"></i></button>
                    </span>
                  </div>
                </div>
            </div>
          </div>






  </div>
