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

</script>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">


            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" style="color:#ffffff" href="<?php
                            if($_SESSION)
                            {
                                if($_SESSION["user_type"]=='user')
                                {
                                    echo ASSET_PATH; echo "/main";
                                }
                                elseif($_SESSION["user_type"]='librarian')
                                {
                                    echo ASSET_PATH; echo "/Lpanel";
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
                                ?>">DIGITAL LIBRARY</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                //if($this->session->userdata('user_name'))
                //{
                    echo ' <li>
                               <a href="#" style="color:#ffffff">'; //echo $this->session->userdata('user_name');
                               echo '</a>
                               </li>';
                //}
                ?>
                <li>
                    <a href="about.html" style="color:#ffffff">About</a>
                </li>
                <li>
                    <a href="contact.html" style="color:#ffffff">Contact</a>
                </li>
                <li>
                    <a href="#" style="color:#ffffff">Advanced</a>
                </li>
                

                <?php

                    # code...

                    if($_SESSION)
                    {
                        echo ' <li>
                                   <a style="color:#ffffff" href="';   echo ASSET_PATH;   echo '/users/logout">Logout</a></li>';

                       #<a href="; echo base_url(); echo 'main/item/'; echo $row['material_id']; echo '>';echo $row['name'];
                    #echo   '</a>

                    }
                    else
                    {
                        echo ' <li>
                                   <a style="color:#ffffff" href="';   echo ASSET_PATH;   echo '/users/login">Login</a></li>';

                    }

                ?>


                <li>
                    <a href="#" onclick="showSearch()" style="color:#ffffff">Search</a>
                </li>


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
                </li>
                

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
