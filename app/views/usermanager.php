<script type="text/javascript">


$( document ).ready(function() {
    


	$("#search_bar").keyup(function(){
		var q = $("#search_bar").val();
		var base_url = window.location.origin + window.location.pathname;
        var data = {
            "action": 'recent'
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({

            type: "POST",
            dataType: "json",
            url: 'usermanager/search_user/'+q,//Relative or absolute path to response.php file
            data: data,
            success: function (data) {
            	
                if (data['json'][0]) {
                    $('#tab-window2').html("");
                    $('#tab-window3').html("");
                    for (var j = 0; j < data['json'].length; j++) {
                        $('#tab-window2').append(
                        	'<tr>\
                                <td>' + data['json'][j]['reg_number'] + '</td>\
                                <td>' + data['json'][j]['full_name'] + '</td>\
                                <td>' + data['json'][j]['user_name'] + '</td>\
                                <td><a href="'+ base_url + '/ban_user/' + data['json'][j]['user_id'] + '">ban user</a></td>\
                            </tr>');	
                    }                   
                }
                else{
                	$('#tab-window3').html("NO RESULTS");
                	$('#tab-window2').html("");
                }              
            }
        });
        return false;
    });
});

    

</script>


<div class="container">

	<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>User Manager</small>
                </h1>
            </div>
    </div> 



	<div class ="row">
		<div class="col-md-6">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Black List</h3>
                </div>
                <div class="panel-body">
                    <?php 
                    	if(empty($data['banned_list'])){ echo "Empty";}else{?>
                    	<table class="table table-bordered table-hover table-striped">
                    		<thead>
                    			<tr>
                                    <th>Reg Number</th>
                                    <th>Full Name</th>
                                    <th>User Name</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['banned_list'] as $banned){ ?>      
                                
                                    <tr>
                                        <td><?php echo $banned['reg_number'];?></td>
                                        <td><?php echo $banned['full_name'];?></td>
                                        <td><?php echo $banned['user_name'];?></td>
                                        <td><a href="<?php echo ASSET_PATH;?>/usermanager/unban_user/<?php echo $banned['user_id']; ?>">Authorize</a></td>
                                    </tr>
                                <?php }}?>
                        	</tbody>
                        </table>
                </div>
            </div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="form-group">
                        <input class="form-control" type="text" id="search_bar" placeholder="Search users">
                    </div>
                </div>
                <div class="panel-body">
                	<table class="table table-bordered table-hover table-striped">
                    	<thead>
                    		<tr>
                                <th>Reg Number</th>
                                <th>Full Name</th>
                                <th>User Name</th>
                                    
                            </tr>
                        </thead>
                        <tbody id="tab-window2">
                    			
                    	<tbody>
                    </table>
                    <div id="tab-window3"></div>
                </div>
            </div>
		</div>
	</div>