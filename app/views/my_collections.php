<div class="container">
  <div class="row">
    <br/>
    <div class="col-lg-4">
        <h2>My Collections</h2>
    </div>
  </div>
  <div class="row">
<div class="col-md-3"></div>
<div class="col-md-3">
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
<div class="col-md-3"></div>
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