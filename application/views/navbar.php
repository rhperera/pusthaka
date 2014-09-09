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
            <a class="navbar-brand" href="index.html">UCSC DIGITAL LIBRARY</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($this->session->userdata('user_name'))
                {
                    echo ' <li class="active">
                               <a href="#">'; echo $this->session->userdata('user_name'); echo '</a>
                               </li>';
                }
                ?>
                <li>
                    <a href="about.html">About</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="#">Advanced</a>
                </li>
				
				

				
				
				<?php
				
				echo ' <li>
							<a href="'; echo base_url(); echo 'users/register'; echo '">Register</a></li>';
				
				
				?>
				
                <?php
                if($this->session->userdata('user_name'))
                {
                    echo ' <li>
                               <a href="'; echo base_url(); echo 'users/logout'; echo '">Logout</a></li>';

                   #<a href="; echo base_url(); echo 'posts/item/'; echo $row['material_id']; echo '>';echo $row['name'];
                #echo   '</a>


                }
                else
                {
                    echo ' <li>
                               <a href="'; echo base_url(); echo 'users/login'; echo '">Login</a></li>';

                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
