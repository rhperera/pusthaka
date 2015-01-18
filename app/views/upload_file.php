<!--The Container-->
<!--The closing div tag is in the footer.php-->
<style>
    
</style>

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Upload
                <small>materials to the library</small>
            </h1>
        </div>
    </div>

    <div class="row">
            <div class="col-md-5">
                <form action="<?php echo ASSET_PATH;?>/uploads/do_upload" method="post" enctype="multipart/form-data">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>ISBN Number</label><span style="color:red"> *</span>
                            <input type="text" class="form-control" name="ISBN" required data-validation-required-message="Please enter.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Title</label><span style="color:red"> *</span>
                            <input type="text" class="form-control" name="name" required data-validation-required-message="Please enter.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Author</label><span style="color:red"> *</span>
                            <input type="text" class="form-control" name="author" required data-validation-required-message="Please enter.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Category</label><span style="color:red"> *</span>
                            <select class="form-control" name="category">
                                <option selected disabled>Select Category</option>
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
                            <label>Short Description</label>
                            <textarea rows="4" name="description" cols="100" class="form-control" id="description" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Add tags</label>
                            <textarea rows="4" name="tags" cols="100" class="form-control" id="tags" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>


                     <div class="control-group form-group">
                        <div class="controls">
                            <label>Do you want to make this book publicly available</label><span style="color:red"> *</span>
                            <select class="form-control" name="privacy">
                                <option value="0">Yes</option>
                                <option value="1">No. Let me choose</option>
                            </select>
                        </div>
                    </div>

                    <div id="success"></div>
                     
                    
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="file" name="file" value="file"/>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="submit" name="submit" class="btn btn-primary" value="Upload">
                        </div>
                    </div>


                </form>
            </div>
        <div class="col-md-4" style="top: 30px">
            <?php
                if(isset($_SESSION['save'])){
                 if($_SESSION['save']=='success')
                     {
                        echo '<div class="alert alert-success">
                                    <strong>Success!</strong> You successfully uploaded ';
                                     echo ' to the library.';
                              echo '</div>';
                     }
                     else if($_SESSION['save']=='fail')
                     {
                         echo '<div class="alert alert-success">
                    <strong>Well done!</strong> You successfully read this important alert message.
                </div>';
                     }
                 }
                     ?>
        </div>

            <!-- Sidebar Column -->

        </div>
