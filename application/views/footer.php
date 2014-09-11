<footer>

<div class="row">
<div class="input-group">
<div class="well">

		<!-- Blog Categories Well -->
		<div class="col-md-3 col-sm-6">
			<h4>Categories</h4>
			<div class="row">
				<div class="col-lg-6">
					<ul class="list-unstyled" style="width:140px">

						<?php if(!isset($categories))
						{
							echo '<p>No categories to show</p>';
						}
						else
						{
							foreach($categories as $row)
							{
								echo '<li><a href="';echo base_url(); echo 'categories/view/'; echo $row['category_id']; echo'">'; echo $row['category_name'];
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
		<div class="col-md-3 col-sm-6" style="float:right">
         
			<h4>Side Widget Well</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
		</div>
           

 



		<div class="row">
			<!--<div class="col-lg-12">
				<p>Copyright &copy; Your Website 2014</p>
			</div>-->
		</div>
		
</div>	

</div>
</div>
    
   <hr>

<p>Copyright &copy; University of Colombo School of Computing - 2014</p>
		
</footer>


<!-- /.container -->

<!-- jQuery Version 1.11.0 -->
<script src='/ucsc-digital-library/assets/js/jquery-1.11.0.js'></script>

<!-- Bootstrap Core JavaScript -->
<script src='/ucsc-digital-library/assets/js/bootstrap.min.js'></script>

</body>

</html>