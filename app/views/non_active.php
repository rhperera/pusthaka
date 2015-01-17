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
    
    foreach($data['inactive_list'] as $pair)
    {
        $id = $pair[0]->get_id();
?>      
        
        <div class="row">
            
            <div class="col-md-7">
                <h3><?php echo $pair[0]->get_name();?><small> by <?php echo $pair[0]->get_author();?></small></h3>
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
