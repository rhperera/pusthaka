<!--The Container-->
<!--The closing div tag is in the footer.php-->
<style>
    .form-control 
    {
        width: 42%;
    }
</style>
<div class="container">
    <div class="row">
            <div class="col-md-8">
                <h3>Upload</h3>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Title</label><span style="color:red"> *</span>
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Author</label><span style="color:red"> *</span>
                            <input type="text" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Category</label><span style="color:red"> *</span>
                            <select class="form-control">
                                <option selected disabled>Select Category</option>
                                <?php
                                    if(!isset($categories))
                                    {
                                        echo '<option value="Empty">No categories</option>';
                                    }
                                    else
                                    {
                                        foreach($categories as $row)
                                        {
                                            echo '<option value="';echo $row['category_id']; echo'">'; echo $row['category_name']; echo'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Short Description</label>
                            <textarea rows="4" cols="100" class="form-control" id="description" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Add tags</label>
                            <textarea rows="4" cols="100" class="form-control" id="tags" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

        </div>