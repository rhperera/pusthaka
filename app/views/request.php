

<div class="container">
</br></br></br>
 <div class="row row-centered">
 	<div class="col-md-3 col-centered"></div>
 	<div class="col-md-6 col-centered">
 		<h2 style="margin-left: 21px;">You don't have permission to view this</h2>
 		</br></br>
 		<img src="<?php echo ASSET_PATH;?>/images/noentry.png" style="height: 346px; margin-left: 99px;">
 		</br></br>
 		<h2 style="margin-left: 89px;"><?php 
 				$material_id = $data['item'][0]['material_id'];
 				$uploader_id = $data['item'][0]['uploader_id'];
 				?>

 				<?php 
 				if($data['requested'])
 					{
 						echo 'Request has been sent';
 					}	
 					else
 					{				?>
						<a href="<?php echo ASSET_PATH;?>/settings/request_permission/
							<?php echo $material_id;?>/<?php echo $uploader_id;?>">
							Send a request to view this</a></h2>

 				<?php  }  ?>
 	</div>
 	<div class="col-md-3 col-centered"></div>
 </div>