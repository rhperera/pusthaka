

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
     </br></br></br>
 <div class="row row-centered">

  <div class="col-md-4 col-centered" style="left: 69px;">
    <h1 style="margin-top: 119px; ">Browse</h1></br>
        <p><a href="<?php echo ASSET_PATH;?>/mytable"><button style="width: 129px;" type="button" class="btn btn-default">Dashboard</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/main/browse"><button style="width: 129px;" type="button" class="btn btn-default">Browse</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/search/quick"><button style="width: 129px;" type="button" class="btn btn-default">Advance Search</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/settings"><button style="width: 129px;" type="button" class="btn btn-default">Settings</button></a></p>
        <p><a href="<?php echo ASSET_PATH;?>/uploads"><button style="width: 129px;" type="button" class="btn btn-default">Upload</button></a></p>
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
     

  
            
                
   