<div class="container">
  <div class="row">
    <br/>
    <div class="col-lg-4">
        <h2>My Collections</h2>
    </div>
  </div>
<?php

	foreach($records as $rec){
        
		echo "ISBN   :   ";
		echo $rec->ISBN."<br>"; 
    
    }
?>
