
<!-- Navigation -->
<?#php include('slider.php')?>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Home
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a>
                </li>
                <li class="active">Blog Home One</li>
            </ol>
        </div>
    </div>

    <?php include('panel.php');?>

    <!-- /.row -->

    <div class="row">
    <h3>Recently Uploaded</h3>
        <!-- Blog Entries Column -->
        <div class="col-md-8">

        <?php if(!isset($posts))
        {
            #<!-- First Blog Post -->
            echo '<h2>No books to show</h2>';
        }
        else
        {
            foreach($posts as $row)
            {
                echo   "<h2>
                            <a href="; echo base_url(); echo 'posts/item/'; echo $row['material_id']; echo '>';echo $row['name'];
                echo   '</a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php">'; echo $row['author'];
                echo   '</a>
                        </p>
                        <p><i class="fa fa-clock-o"></i> Uploaded on - '; echo $row['upload_date'];
                echo   '</p>
                        <!--<hr>
                        <a href="blog-post.html">
                            <img class="img-responsive img-hover" src="http://placehold.it/900x300" alt="">
                        </a>
                        <hr>-->
                        <p>Categories: '; echo $row['cat_list'];
                echo   '</p>


                        <hr>';
            }
        }?>
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">

                            <?php if(!isset($categories))
                            {
                                echo '<p>No categories to show</p>';
                            }
                            else
                            {
                                foreach($categories as $row)
                                {
                                    echo '<li><a href="#">'; echo $row['category_name'];
                                    echo '</a>
                             </li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
<!-- /.container -->




