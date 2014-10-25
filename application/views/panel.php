<!-- Service Panels -->
<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
<style>
    .panel 
    {
        -webkit-box-shadow: none !important;
        color: #fff;
    }

   
      
    
</style>

<script>
    $(document).ready(function () {

      
        $("#read").mouseover(function () {
            $("#advance1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#upload1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#collection1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#read1").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0}, 200);
        });
        $("#advance").mouseover(function () {
            $("#advance1").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0}, 200);
            $("#upload1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#collection1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#read1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
        });
        $("#upload").mouseover(function () {
            $("#advance1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#upload1").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0}, 200);
            $("#collection1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#read1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
        });
        $("#collection").mouseover(function () {
            $("#advance1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#upload1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
            $("#collection1").css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0}, 200);
            $("#read1").css({opacity: 0.0, visibility: "visible"}).stop(true, true).animate({opacity: 0.0}, 200);
        });

    });
</script>



    <br><br>
    <!-- Page Heading/Breadcrumbs -->
 <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <h1 style="font-size: 43px; color: #fff; text-align: center">WELCOME<br><small>Digial Library of UCSC</small></h1>
        </div>
        <div class="col-lg-4">
        </div>
    </div> 
<br><br>
<div class="row">
    </br>
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default text-center" style=" background-color: transparent !important; border-color: transparent">
            <div class="panel-heading" style=" background-color: transparent !important; border-color: transparent">
                        <span class="fa-stack fa-5x" id="read">
                              <i class="fa fa-circle fa-stack-2x text-primary" ></i>
                              <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
                <div class="panel-body" style=" background-color: transparent !important; visibility: hidden" id="read1">
                    <h4>Read Online</h4>
                    <p>View and read most recently uploaded books now.</p>
                    <a href="<?php echo base_url()?>posts/recent" class="btn btn-primary">Recent Books</a>
                </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6" >
        <div class="panel panel-default text-center" style=" background-color: transparent !important; border-color: transparent">
            <div class="panel-heading" style=" background-color: transparent !important; border-color: transparent">
                        <span class="fa-stack fa-5x" id="advance">
                              <i class="fa fa-circle fa-stack-2x text-primary" style="color:#CA4252" ></i>
                              <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
                <div class="panel-body" style=" background-color: transparent !important; visibility: hidden" id="advance1">
                     <h4>Search</h4>
                     <p>Use our Advance Search for a customized search</p>
                     <a href="#" class="btn btn-primary" style="background-color:#CA4252; border-color:#CA4252">Advance Search</a>
                </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default text-center" style=" background-color: transparent !important; border-color: transparent">
            <div class="panel-heading" style=" background-color: transparent !important; border-color: transparent">
                        <span class="fa-stack fa-5x" id="upload">
                              <i class="fa fa-circle fa-stack-2x text-primary" style="color:#42CA68" ></i>
                              <i class="fa fa-upload fa-stack-1x fa-inverse" ></i>
                        </span>
            </div>
                <div class="panel-body" style=" background-color: transparent !important; visibility: hidden" id="upload1">
                    <h4>Upload</h4>
                    <p>Upload and share books on your own.</p>
                    <a href="<?php echo base_url()?>uploads" class="btn btn-primary" style="background-color:#42CA68; border-color:#42CA68  ">Upload now</a>
                </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="panel panel-default text-center" style=" background-color: transparent !important; border-color: transparent">
            <div class="panel-heading" style=" background-color: transparent !important; border-color: transparent">
                        <span class="fa-stack fa-5x" id="collection">
                              <i class="fa fa-circle fa-stack-2x text-primary" style="color: #b050bb "></i>
                              <i class="fa fa-folder-open fa-stack-1x fa-inverse"></i>
                        </span>
            </div>
                <div class="panel-body" style=" background-color: transparent !important; visibility: hidden " id="collection1">
                    <h4>Manage Collections</h4>
                    <p>Get your favourite books and add them to collections.</p>
                    <a href="#" class="btn btn-primary" style="background-color:#b050bb; border-color:#b050bb">My Collections</a>
                </div>
        </div>
    </div>
</div>

