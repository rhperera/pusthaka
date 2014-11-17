<!-- Page Content -->
<script>
  function do_search(){
      var a = $('#search_box2').val();
      if(a.length<3)
      {
          $('#search_box2').css("color","red");
      }
      else
      {
          location = '<?php echo ASSET_PATH;   echo '/search/quick/';?>'+a;
      }
  }
</script>


<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
      <br/><br/>


    <div class="col-lg-4">
            <div class="input-group">
                <input type="text" class="form-control" id="search_box2">
                <span class="input-group-btn">
                    <button class="btn btn-default" onclick="do_search()" type="button"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
    <div class="col-lg-4">
            <a href="<?php echo ASSET_PATH; echo '/search'; ?>">Use the advance search</a>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
    <?php
    $i=1;
    foreach($data['quick_results'] as $row)
    {
    ?>
        <div class="col-md-4 img-portfolio">
            <a href="<?php echo ASSET_PATH?>posts/item/<?php echo $row['material_id']?>">

            </a>
            <h3>
                <a href="<?php echo ASSET_PATH?>posts/item/<?php echo $row['material_id']?>"><?php echo $row['name'];?></a>
            </h3>
            <p>by <?php echo $row['author']; ?></p>
        </div>
        <?php
        if($i%3==0)
        { ?>
    </div>
    <?php if($i==9)
    {   break;}
    else
    { ?>
    <div class="row"><?php } } ?>
    <?php

        $i = $i+1;

    } ?></div>
    <!-- /.row -->



    <!-- Pagination
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>-->
    <!-- /.row -->
