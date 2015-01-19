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


    $(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
        });
    });


    
    function scroll() {
    $('html, body').animate({
        scrollTop: $("#sign").offset().top
    }, 600);

}

  
</script>



<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container" style="background-color: rgb(248, 248, 248);">


        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">

            <div class="col-md-3" style="position: fixed; left: 331px; width: 242px; margin-left: -225px; border: none; border-radius: 0; overflow-y: auto; background-color:#fff; -moz-box-shadow: 0 0 10px 0 #000; -webkit-box-shadow: 0 0 10px 0 #000;" >
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> '; echo $_SESSION['full_name']; echo' <b class="caret"></b></a>
                                <ul class="dropdown-menu">


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
                                       
                                            echo '"><i class="fa fa-fw fa-gear"></i>Dashboard</a>
                                        </li>


                                         <li>
                                            <a href="'; echo ASSET_PATH; echo "/settings";
                                        
                                        echo '"><i class="fa fa-fw fa-user"></i>Settings</a>
                                        </li>
                                </ul>
                            </li>';


                            echo '<li>
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


                <!-- <li>
                    <a href="#" onclick="showSearch()" style="color:#ffffff">Search</a>
                </li> -->


                <!-- search -->
 

    
                    
                    <?php if(!$_SESSION){ ?>
                           <form action="<?php echo ASSET_PATH; ?>/users/login" method="post" class="navbar-form navbar-left" >
                            <div class="form-group">
                                    <!-- <?php
                                        if($data['error']==1)
                                        {
                                            echo '<p style="color: red;">username / password did not match</p>';
                                        }
                                    ?> -->
                                <input type="text" class="form-control" placeholder="Username" required data-validation-required-message="Please enter your name." id="name" name="user_name">
                                <input type="password" class="form-control" placeholder="Password" required data-validation-required-message="Please enter your name." id="password" name="password">
                      
                            </div>
                                <input type="submit" class="btn btn-primary" placeholder="sad" value="Sign in" align="center">
                            </form>

                    <?php } ?>


<!--raveen

                
                <?php
                if(isset($_SESSION['user_name']))
                    {
                    echo ' <li>
                               <a href="'; echo ASSET_PATH; echo '/mytable';    
                               echo '" style="color:#000">'; echo $_SESSION['full_name'];
                               echo '</a>
                               </li>';
                }
                
                ?>
                
                 <li>
                    <a href="#" onclick="showSearch()" style="color:#000">Search</a>
                </li>

                <?php

                    # code...

                    if(isset($_SESSION['user_name']))
                    {   
                        echo ' <li>
                                   <a style="color:#000" href="';   echo ASSET_PATH;   echo '/users/logout">Logout</a></li>';

                      

                    }
                    else
                    {
                        echo ' <li>
                                   <a style="color:#000" href="javascript: scroll()" >Login</a></li>';

                    }

                ?>

                -->


               

                <!--
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                        <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                            <form method="post" action="login" accept-charset="UTF-8">
                                <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                                <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                                <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                                <label class="string optional" for="user_remember_me"> Remember me</label>
                                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                            </form>
                        </div>
                </li>-->
                

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