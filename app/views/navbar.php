<script>
    function showSearch(){
        $('#search').slideToggle();
    }

    function do_search(){
        var a = $('#search_box').val();
        if(a.length<3)
        {
            $('#search_box').css("color","red");
        }
        else
        {
            location = '<?php echo ASSET_PATH;   echo '/search/quick/';?>'+a;
        }
    }




  
</script>



<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container" style="background-color: rgb(248, 248, 248);">


        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">

            <div class="col-md-3" style="position: fixed; left: 331px; width: 242px; margin-left: -225px; border: none; border-radius: 0; overflow-y: auto; background-color:#fff; -moz-box-shadow: 0 0 10px 0 #000; -webkit-box-shadow: 0 0 10px 0 #000; -webkit-border-radius: 0 0 10px 10px; -moz-border-radius: 0 0 10px 10px;" >
            <a href="<?php
                                    if(isset($_SESSION['user_name']))
                                    {
                                        if($_SESSION["user_type"]=='user')
                                        {
                                            echo ASSET_PATH; echo "/main";
                                        }
                                        elseif($_SESSION["user_type"]='librarian')
                                        {
                                            echo ASSET_PATH; echo "/main";
                                        }
                                        else
                                        {
                                            echo ASSET_PATH;
                                        }
                                    }
                                    else
                                    {
                                        echo ASSET_PATH;
                                    }
                                        ?>">
            <img src="<?php echo ASSET_PATH;?>/images/logo.png" ></a>
            </div>


        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
   <!-- Logout -->
                <?php
                    # code...
                    if(isset($_SESSION['user_name']))
                    {
                        echo ' 
                            <li>
                            
                                <a href="';
                                            
                                        if($_SESSION["user_type"]=='user')
                                        {
                                            echo ASSET_PATH; echo "/mytable";
                                        }
                                        elseif($_SESSION["user_type"]='librarian')
                                        {
                                            echo ASSET_PATH; echo "/Lpanel";
                                        }
                                       
                                            echo '" ><i class="fa fa-user"></i> '; echo $_SESSION['full_name']; echo' </a>

                            </li>';


                            echo '
                            <li>
                                <a href="';   echo ASSET_PATH;   echo '/main/browse"><i class="fa fa-fw fa-file"></i> Browse</a>
                            </li>

                            <li>
                                <a href="';   echo ASSET_PATH;   echo '/uploads"><i class="fa fa-fw fa-upload"></i> Upload</a>
                            </li>

                            <li>
                                <a href="';   echo ASSET_PATH;   echo '/users/logout"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                            </li>

                            <li>
                                <div class="navbar-form navbar-left" role="search">
                                      <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search" id="search_box" >
                                      </div>
                                  <button onclick="do_search()" class="btn btn-default" >Search</button>
                                </div>
                            </li>';


                    }
                ?>


 

    
                    
                    <?php if(!isset($_SESSION['user_name'])){ ?>

                           <form action="<?php echo ASSET_PATH; ?>/users/login" method="post" class="navbar-form navbar-left" >
                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Username" required data-validation-required-message="Please enter your name." id="name" name="user_name">
                                <input type="password" class="form-control" placeholder="Password" required data-validation-required-message="Please enter your name." id="password" name="password">
                      
                            </div>
                                <input type="submit" class="btn btn-primary" placeholder="sad" value="Sign in" align="center">
                                <a class="btn btn-warning" href="<?php echo ASSET_PATH; ?>/reset_password">Forgot password</a>
                            </form>


                    <?php } ?>



                

            </ul>

        <!-- Blog Sidebar Widgets Column -->




        </div>
        <!-- /.navbar-collapse -->



    </div>
    <!-- /.container -->




    <!--Search search -->
    <div id="search" style="display:none">
      <a class="btn btn-default" onclick="do_search()" type="button" style="position:fixed; right:3px; top:50px; border-radius:5px; border:2px solid;">
      <i class="fa fa-search"></i>
      </a>
      <input type="text" id="search_box" class="form-control" style="width:230px; position:fixed; right:42px; top:50px; border-radius:5px; border:2px solid; height:36px; font-size:17px"/>
      </div>
      
    <style>
                #search::-webkit-input-placeholder { font-style: italic; }
                #search::-moz-placeholder { font-style: italic; }
                #search::-ms-input-placeholder { font-style: italic; }
    </style>





</nav>