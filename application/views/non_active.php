 <script type="text/javascript">
    function drop(item)
    {
        $("#"+item).slideToggle();    
    }
    
</script>

<div class="container">

     <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Non active books
                    <small>review and authenticate</small>
                </h1>
            </div>
    </div>
    
     
<?php
    
    foreach($inactive_list as $book)
    {
        $id = $book->get_id();
?>      
        
        <div class="row">
            
            <div class="col-md-7">
                <h3><?php echo $book->get_name();?></h3>
                <h4>by <?php echo $book->get_author();?></h4>
                <p>Uploaded by: <?php echo $book->get_uploader_id();?></p>
                <p>Uploaded on: <?php echo $book->get_upload_date();?></p>

                <a class="btn btn-success" onclick="drop(<?php echo $id;?>);">Approve Book</i></a>
                <a class="btn btn-primary" href="portfolio-item.html">Review Book</i></a>
                <div class="row">
                    <div class="col-md-5">
                        <div id="<?php echo $id;?>" style="display: none">
                              <br>
                            <strong>Are You Sure</strong>
                             <a class="btn btn-sm btn-success" href="<?php echo base_url(); echo 'Lpanel/authenticate/'; echo $id;?>">YES</i></a>
                             <a class="btn btn-sm btn-danger" onclick="drop(<?php echo $id;?>);">NO</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>
<?php    }?>
