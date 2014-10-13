


<div class="container"> 

    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Recent Books
                    <small>uploaded to the library</small>
                </h1>
            </div>
 </div> 

    <div class="row">
         <?php
    $i=1;
    foreach($recents as $row)
    {
    ?>
        <div class="col-md-3 img-portfolio">
            <a href="<?php echo base_url()?>posts/item/<?php echo $row['material_id']?>">
                <img class="img-responsive img-hover" src="/ucsc-digital-library/assets/images/700x400.jpg" alt="">
            </a>
            <h3>
                <a href="<?php echo base_url()?>posts/item/<?php echo $row['material_id']?>"><?php echo $row['name'];?></a>
            </h3>
            <p>by <?php echo $row['author']; ?></p>
        </div>
        <?php
        if($i%4==0)
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