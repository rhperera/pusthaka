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


<div class="container">

    <!-- Page Heading/Breadcrumbs -->
     
 <div class="row row-centered">

  <div class="col-md-3 col-centered">
  	</br></br></br>
    <h2 style="margin-top: 119px; ">Add to collection</h2></br>
        

        <div class="input-group">
                <input type="text" class="form-control" id="search_box2">
                <span class="input-group-btn">
                    <button class="btn btn-default" onclick="do_search(<?php echo  $data['collection_id'];?>)" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>
       
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
    <?php
    $i=1;
    foreach($data['quick_results'] as $row)
    {
    ?>
        <div class="col-md-12 img-portfolio"></br>
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
    <div class="row"><?php } } ?>
    <?php

        $i = $i+1;

    } ?></div>
  </div>

  <div class="col-md-1 col-centered"></div>

    <div class="col-lg-5">

            <h1><a href="<?php echo ASSET_PATH;?>/collections">
            	<i  class="fa fa-arrow-left"></i></a>
            	&nbsp;&nbsp;<?php echo $data['collection_name'][0]['collection_name'];?></h1>
    	</br></br>
    	<?php foreach ($data['books'] as $key) { ?>
    	
    		<h4><li>
    			<a href="<?php echo ASSET_PATH?>/main/item/<?php echo $key['material_id']?>">
    				<?php echo $key['name'] ?>
    			By :<?php echo " ".$key['author'];  ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
    			<a href="<?php echo ASSET_PATH?>/collections/remove_material_from_collection/<?php 
    			echo $key['material_id']?>/<?php 
    			echo  $data['collection_id'];?>">
    				<i  class="fa fa-trash-o"></i></a>
    		</li></h4>

    	<?php }  ?>
    	<ul>


     </div>
  </div>
