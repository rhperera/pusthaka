<style type="text/css">


#pdf {
    width: 700px;
    height: 800px;
    margin: 2em auto;
   
}



#pdf object {
   display: block;
   border: solid 1px #666;
}


</style>



<script type="text/javascript">

window.onload = function (){

    var success = new PDFObject({ url: "<?php echo ASSET_PATH?>/home" }).embed("pdf");
    
};

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

<div class="container">

    <div class="container">
                         <div class="col-lg-12" style="text-align: center;">
                    <h1 class="page-header">Review
                        <small><?php echo $_SESSION['full_name'];?></small>
                    </h1>
                    </div>
</br></br></br>
 <div class="row row-centered">



    <div class="col-md-4 col-centered">

                <br><br><br>
                <h4>Uploader Details</h4>
                <ul>    <li><b>Name :</b><?php echo " ".$data['user']['full_name']?></li>
                    <li><b>Registration number :</b><?php echo " ".$data['user']['reg_number']?></li>
                </ul><br>

            
                <form action="<?php echo ASSET_PATH;?>/uploads/do_update/<?php echo $data['material'][0]['material_id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>ISBN Number</label>
                            <input type="text" value="<?php echo " ".$data['material'][0]['ISBN']?>"  
                            class="form-control" name="ISBN" required data-validation-required-message="Please enter.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Title</label>
                            <input type="text" value="<?php echo " ".$data['material'][0]['name']?>"
                            class="form-control"  name="name" required data-validation-required-message="Please enter.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Author</label>
                            <input type="text" value="<?php echo " ".$data['material'][0]['author']?>"
                            class="form-control" name="author" required data-validation-required-message="Please enter.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Category</label><span style="color:red"> *</span>
                            <select class="form-control" name="category">
                                <option selected disabled style="color:blue">selected <?php echo $data['category'][0]['category_name'];?></option>
                                <?php
                                    if(!isset($data['categories']))
                                    {
                                        echo '<option value="Empty">No categories</option>';
                                    }
                                    else
                                    {
                                        foreach($data['categories'] as $row)
                                        {
                                           echo '<option  value="';echo $row['category_id']; echo'">'; echo $row['category_name']; echo'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Description</label>
                            <textarea rows="4"  value="<?php echo " ".$data['material'][0]['description']?>"
                                placeholder="<?php echo " ".$data['material'][0]['description']?>"
                            name="description" cols="100" class="form-control" id="description" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Tags</label>
                            <textarea rows="4" 
                            value="<?php echo " ".$data['material'][0]['tags']?>"
                            placeholder ="<?php echo " ".$data['material'][0]['tags']?>"
                            name="tags" cols="100" class="form-control" id="tags" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>

                    <?php
                        if($data['material'][0]['privacy']==0)
                        {
                            $public = "Yes";
                        }
                        else
                        {
                            $public = "No";
                        }
                    ?>

                     <div class="control-group form-group">
                        <div class="controls">
                            <label>Public availability |</label><span style="color:blue"><?php echo " ".$public; ?></span>
                            <select class="form-control" name="privacy">
                                <?php if($public=="Yes") 
                                {   ?>
                                <option selected value="0">Yes</option>
                                <option value="1">No</option>
                                <?php   }   
                                elseif($public=="No")   
                                    {  ?>
                                <option value="0">Yes</option>
                                <option selected value="1">No</option>
                                <?php  }  ?>
                            </select>
                        </div>
                    </div>

                    <div id="success"></div>
                     
                    <div class="control-group form-group" style="width:365px;">
                        <div class="controls">
                            <?php if($_SESSION['user_type']=='librarian')
                            {
                            ?>
                            <input type="submit" name="submit" class="btn btn-default" value="Update and authenticate">
                            <a class="btn btn-danger" href="<?php echo ASSET_PATH;?>/lpanel/delete_material/<?php echo $data['material'][0]['material_id'] ?>">Remove material and notify</a>
                            <?php }  
                            else{        ?>
                            <input type="submit" name="submit" class="btn btn-default" value="Update">
                            <a style="padding-left:37px; color:red;" 
                            href="<?php echo ASSET_PATH;?>/mytable/delete_material/<?php echo $data['material'][0]['material_id'] ?>">Remove material</a>
                            <?php } ?>
                            
                        </div>
                    </div>


                </form>


            </div>

            <!--the book pdf view-->
            <div class="col-md-8">
                <div id="pdf">
                    <object data="<?php echo $data['material'][0]['path']?>" type="application/pdf" width="100%" height="600%"></object>
                </div>

            </div>
      

            <!-- Sidebar Column -->

        </div>