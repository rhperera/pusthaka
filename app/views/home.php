<style>
     #con
    {
        background-image:url('<?php echo ASSET_PATH;?>/images/slider.jpg'); 
        background-size: cover;

        height:100%;
    	width:100%;
    }

</style>
<script type="text/javascript">
    $('#anchor1').click(function()
    {
        $('html, body').animate(
        {
            scrollTop: $( $(this).attr('class') ).offset().top
        }, 1000);
        return false;
    });

  
</script>
<!-- Navigation -->
<?php //include('slider.php')?>
<!-- Page Content -->
<div id="con">
    <div class="container">

        <?php include('panel.php');?>
        <h3><a id='#anchor1' href="#recent">Recent Books</a></h3>

    </div>
</div>

<div class="container">
    <br><br>


    <div class="row" id="recent">
            <div class="col-lg-6">
                <h3 class="page-header">Recent Books</h3>
            </div></div>
     


    <div class="row">
         <?php
    $i=1;
    foreach($data['recents'] as $row)
    {
    ?>
        <div class="col-md-3 img-portfolio">

            <h4>
                <a href="<?php echo ASSET_PATH; echo '/main/item/'; echo $row['material_id']?>"><?php echo $row['name'];?></a>
            </h4>
            <p>by <?php echo $row['author']; ?></p>
        </div>
        <?php
        if($i%2==0)
        { ?>
    </div>
    <?php if($i==9)
    {   break;}
    else
    { ?>
    <div class="row"><?php } } ?>
    <?php

        $i = $i+1;

    } ?>
            
                
    </div>

    <!-- /.row -->



    <!-- /.row -->

 

    <!-- Footer -->
<!-- /.container -->




