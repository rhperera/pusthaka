<div class="container">
  </br></br></br>
 <div class="row row-centered">

  <div class="col-md-4 col-centered" style="left: 69px;">
    <h1 style="margin-top: 119px; ">Collections</h1></br>
        <p><a href="<?php echo ASSET_PATH;?>/mytable"><button style="width: 129px;" type="button" class="btn btn-default">Dashboard</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/main/browse"><button style="width: 129px;" type="button" class="btn btn-default">Browse</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/search/quick"><button style="width: 129px;" type="button" class="btn btn-default">Advance Search</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/settings"><button style="width: 129px;" type="button" class="btn btn-default">Settings</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/uploads"><button style="width: 129px;" type="button" class="btn btn-default">Upload</button></a></p>
  </div>

<div class="col-md-4">
  <ul>
<?php

	foreach($data['records'] as $rec){
      echo '<span><li><a style="display: -webkit-inline-box;" href="';
      echo ASSET_PATH.'/collections/book/'.$rec['collection_id'];
      echo '"><p><b>';
		  echo $rec['collection_name']."";
      echo '</p></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'; 
      echo ASSET_PATH.'/collections/delete_collection/'.$rec['collection_id'];
      echo'"><i  class="fa fa-trash-o"></i></a></li></span>';
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