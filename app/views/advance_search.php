<script>
  function tog(name)
  {
    $('#'+name).toggle();
    $('#'+name).val('');
  }



//$( document ).ready(function() {
    


    function call_ajax(){
        var t = $("#title").val();
        var a = $("#author").val();
        var u = $("#username").val();

        var base_url = window.location.origin + window.location.pathname;

       //alert(base_url+'/advance_search');

        var data = {
            "title" : t,"author":a,"username":u
        };
        data = $(this).serialize() + "&" + $.param(data);

        //alert(data);
        
        $.ajax({

            type: "POST",
            dataType: "json",
            url: base_url+'/advance_search',//Relative or absolute path to response.php file
            data: data,
            success: function (data) {
                
                if (data[0]) {
                    //$('#results').html("");
                    $('.panel-body').html("");
                    for (var j = 0; j < data.length; j++) {
                        $('.panel-body').append(
                '<a href="main/item/'+data[j]['material_id']+'"><li>' + data[j]['name'] + ' by ' + data[j]['author'] + '</a></li>');    
                    }                   
                }
                else{
                    $('#results').html("NO RESULTS");
                    
                }              
            }
        });

        return false;
    }
//});

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
                    <h1 class="page-header">Advanced Search
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>





            <div class="col-md-3" >
                </br></br></br>
            </div>

            <div class="col-lg-4">
                <h3>Sort search by
                    </h3>
            </div>

            <div class="col-md-3">
                </br></br></br>
            </div>


  <div class="row">

            <div class="col-md-3">
                
            </div>

          <div class="col-lg-3" style="width: 23%;">
            <div class="control-group form-group">
                <div class="controls">
                    <label>Title or Tag</label>
                    
                    <input type="text" id="title" class="form-control" name="name" required data-validation-required-message="Please enter.">
                    
                  
                    <p class="help-block"></p>
                </div>
            </div>
          </div>


          <div class="col-lg-3" style="width: 23%;">
            <div class="control-group form-group">
                <div class="controls">
                    <label>Name of Author</label>
                    
                    <input type="text" id="author" class="form-control" name="name" required data-validation-required-message="Please enter.">
                    
                  
                </div>
            </div>
          </div>

        

          <div class="col-lg-3" style="width: 23%;">
            <div class="control-group form-group">
                <div class="controls">
                    <label></label>
                     <div class="input-group">
                         <a href="javascript: call_ajax()"><button class="btn btn-default">Search</button></a>
                    </div>
            </div>
            </div>
          </div>
  </div>

  <div class="row">

        <div class="col-md-3">
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search Results</h3>
                </div>
                
                <div class="panel-body">


                </div>
            </div>
        </div>


  </div>
