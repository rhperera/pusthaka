<div class="container">
  
 <div class="row row-centered">

  <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
                  <li>
                        <a href="<?php echo ASSET_PATH;?>/mytable"><i class="fa fa-fw fa-dashboard"></i>My Table</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/collections"><i class="fa fa-fw fa-table"></i>My Collections</a>
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
            </div>

  <div class="col-md-3 col-centered" style="left: 69px;">
    
  </div>

<div class="col-md-4">
  <ul>
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
  </ul>
</div>

<div class="col-md-3">
                <h3>Add a new collection</h3>
                <form name="sentMessage" action="<?php echo ASSET_PATH;?>/collections/add_collection" method="post" id="contactForm" novalidate="">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Enter collection name</label>
                            <input type="text" class="form-control" name="collection_name" required="" data-validation-required-message="">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-warning" style="padding: 6px 73px;">Add new collection</button>
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