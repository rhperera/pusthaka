

<script type="text/javascript">

    function trigger_recent(call_data) {

        var data = {
            "action": call_data
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: 'browse_call', //Relative or absolute path to response.php file
            data: data,
            success: function (data) {

                var i = 1;
                var item;
                $('#tab-window').html('<div class="row">\
            <div class="col-lg-12">\
                <h1 class="page-header">Recent Books\
                    <small>uploaded to the library</small>\
                </h1>\
            </div></div>');
                $('#tab-window').append('<div class="row');
                for (var j = 0; j < data['json'].length; j++) {
                    $('#tab-window').append(
                        '<div class="col-md-3">\
                            <div class="media"> \
                                <div class="media-body><h4 class="media-heading"><a href="item/' + data['json'][j]['material_id'] + '">' + data['json'][j]['name'] +
                                '</a></h4>\
                                    <p>By ' + data['json'][j]['author'] + '</p> \
                                </div>\
                            </div>\
                        </div>');


                    if (i % 4 == 0) {
                        $('#tab-window').append("</div><div class='row'>");
                    }
                    i = i + 1;
                }
                $('#tab-window').append('</div>');

            }
        });
        return false;
    }

    function trigger_AtoZ() {
        var alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "j", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $('#tab-window').html('<button type="button" class="btn btn-lg btn-default">' + alphabet[0] + '</button>');
        var i;
        for (i = 1; i < alphabet.length; i++) {
            $('#tab-window').append('<button type="button" class="btn btn-lg btn-default">' + alphabet[i] + '</button>');
        }

    }

    function category_tab() {
        var category = ["Hardware", "Stories", "Computer Science", "Networks", "Web Development", "Programming"];
        $('#tab-window').html('<button type="button" class="btn btn-default" onclick=trigger_category(' + 0 + ')>' + category[0] + '</button>');
        var i;
        for (i = 1; i < category.length; i++) {
            $('#tab-window').append('<button type="button" class="btn btn-default" onclick=trigger_category(' + i + ')>' + category[i] + '</button>');
        }
        $('#tab-window').append('<div id="tab-window2"></div>');
    }


    function trigger_category(id) {


        var data = {
            "action": 'recent'
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: 'category_call/' + id, //Relative or absolute path to response.php file
            data: data,
            success: function (data) {
                if (data['json'][0]) {

                    var i = 1;
                    var item;

                    $('#tab-window2').html('<div class="row">\
                                <div class="col-lg-12">\
                                <h1 class="page-header">' + data['json'][0]['category_name'] +
                               '<small> category</small>\
                </h1>\
            </div></div>');
                    $('#tab-window2').append('<div class="row');
                    for (var j = 0; j < data['json'].length; j++) {
                        $('#tab-window2').append(
                        '<div class="col-md-3">\
                            <div class="media"> \
                                <div class="media-body><h4 class="media-heading"><a href="item/' + data['json'][j]['material_id'] + '">' + data['json'][j]['name'] +
                                '</a></h4>\
                                    <p>By ' + data['json'][j]['author'] + '</p> \
                                </div>\
                            </div>\
                        </div>');


                        if (i % 4 == 0) {
                            $('#tab-window2').append("</div><div class='row'>");
                        }
                        i = i + 1;
                    }
                    $('#tab-window2').append('</div>');
                }
                else
                {
                    $('#tab-window2').html('<div class="row">\
                                <div class="col-lg-12">\
                                <h1 class="page-header">Nothing to show\
                </h1>\
            </div></div>');
                }
            }
        });
        return false;
    }




</script>


<div class="container">
 
 <div id="mycontainer" style="height: 500px">   
     
 <div class="row row-centered">
<?php  if(isset($_SESSION['user_name']) and $_SESSION['user_type']=='user') {?>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/mytable"><i class="fa fa-fw fa-dashboard"></i>My Table</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/collections"><i class="fa fa-fw fa-table"></i>My Collections</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/main/browse"><i class="fa fa-fw fa-search"></i>Browse</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/search/quick"><i class="fa fa-fw fa-search"></i>Search</a>
                    </li>
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i>Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i>Upload</a>
                    </li>

                </ul>
            </div>
    <?php } elseif(isset($_SESSION['user_name']) and $_SESSION['user_type']=='librarian'){?>
              <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="margin-left:7.83%; margin-top:14.5%; left:0; top:0; width:18%; z-index:1000">
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/lpanel"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/usermanager"><i class="fa fa-fw fa-table"></i>User Manager</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/main/browse"><i class="fa fa-fw fa-search"></i>Browse</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/search/quick"><i class="fa fa-fw fa-search"></i>Search</a>
                    </li>
                    <li >
                        <a href="<?php echo ASSET_PATH;?>/settings"><i class="fa fa-fw fa-edit"></i>Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo ASSET_PATH;?>/uploads"><i class="fa fa-fw fa-upload"></i>Upload</a>
                    </li>

                </ul>
            </div> <?php }?>


    <div class="col-md-3 col-centered" style="left: 69px;">
        
    </div>

            <div class="col-lg-8">

                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class=""><a onclick="trigger_recent('recent')" href="#tab-window" data-toggle="tab">Recents books uploaded</a>
                    </li>
                    <li class=""><a onclick="category_tab()" href="#tab-window" data-toggle="tab"> Browse by Category</a>
                    </li>
                </ul>
          

    
                <div id="myTabContent" class="tab-content">
                    <br>
                    <div class="tab-pane fade active in" id="tab-window">
                        <h1>Browse The Library</h1>
                        
                    </div>
                </div>

                  </div>
        </div>
            
     </div>
     

  
            
                
   