<script>
    function showSearch(){
        $('#search').slideToggle();
    }
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
 
                                if($this->session->userdata('user_type')=='user')
                                {
                                    echo base_url();
                                }
                                elseif($this->session->userdata('user_type')=='librarian')
                                {
                                    echo base_url(); echo 'Lpanel';
                                }
                                ?>">DIGITAL LIBRARY</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($this->session->userdata('user_name'))
                {
                    echo ' <li>
                               <a href="#" style="color:#ffffff">'; echo $this->session->userdata('user_name'); echo '</a>
                               </li>';
                }
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
                if($this->session->userdata('user_name'))
                {
                    echo ' <li>
                               <a style="color:#ffffff" href="'; echo base_url(); echo 'users/logout'; echo '">Logout</a></li>';

                   #<a href="; echo base_url(); echo 'posts/item/'; echo $row['material_id']; echo '>';echo $row['name'];
                #echo   '</a>

                }
                else
                {
                    echo ' <li>
                               <a href="'; echo base_url(); echo 'users/login'; echo '">Login</a></li>';

                }
                ?>
                <li>
                    <button class="btn btn-default" type="button" onclick="showSearch();" style="position:relative; top:6px"><i class="fa fa-search"></i></button>
                </li>
            </ul>
			
		<!-- Blog Sidebar Widgets Column -->

			       
		
		
        </div>
        <!-- /.navbar-collapse -->
		

		
    </div>
    <!-- /.container -->

    <!--Search search -->
    
    <input type="text" class="form-control" style="width:255px; position:fixed; right:3px; top:51px; display:none; border-radius:5px; border:2px solid; height:40px; font-size:17px" id="search">
    <style>
                #search::-webkit-input-placeholder { font-style: italic; }
                #search::-moz-placeholder { font-style: italic; }
                #search::-ms-input-placeholder { font-style: italic; }
    </style>
            
        
	

			
</nav>
