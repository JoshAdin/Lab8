<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Location</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="assets/animate/animate.css" />
<link rel="stylesheet" href="assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">


<link rel="stylesheet" href="assets/style.css">

</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="http://adinfon.myweb.cs.uwindsor.ca/lab8/"><img src="images/logo.png" alt="logo"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
                 <li ><a href="http://adinfon.myweb.cs.uwindsor.ca/lab8/index.php"><b>Home</b></a></li>
                 <li ><a href="http://adinfon.myweb.cs.uwindsor.ca/lab8/weather.php"><b>Weather API</b></a></li>
                 <li class="active"><a href="javascript:;"><b>Map API</b></a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
<!-- #Header Starts -->




<!-- Cirlce Starts -->
<div id="about"  class="container spacer about">
<h2 class="text-center">    </h2> 
    <div class="row">
         <div class="col-md-4">
        
        </div>

        <div  class="col-md-4">
    
            <div id="floating-panel">
                <input class = "form-control" id="address" type="text" placeholder="Enter a city or address here">
            </div>

        </div>
        
        <div class="col-md-4">
        
        </div>
    </div>
    
  <div class="row">
        <div class="col-md-2">
        
        </div>
        
      <div class="text-center col-md-8 wowload fadeInUp">
            <h4></h4>
          <h4><i class="fa fa-home"></i><b>Location</b></h4>

            <!--div to containing the map  -->
            <div id="map" style="width:100%;height:500px"></div>
            <script>
            //start map function here. Map defaults to windsor location when page loads
            function myMap() {
              var mapCanvas = document.getElementById("map");
              var mapOptions = {
                //center to windsor latitude and longitude at zoom level 8
                center: new google.maps.LatLng(42.3, -83.03),
                zoom: 8
              }
              //create map instance
              var map = new google.maps.Map(mapCanvas, mapOptions);
                var geocoder = new google.maps.Geocoder();

             document.getElementById('address').addEventListener('keyup',
                    function(event){
                        //if enter key is press or released call function geocodeAddress
                        if((event.which === 27)||(event.which === 13)){
                            geocodeAddress(geocoder, map);
                            event.preventDefault();
                           
                            //delete value from input box
                            event.currentTarget.value = "";
                        }

                    });
            }
             /**
             *This creates a map along with a text input address value. 
             *When you press the enter key, the sample sends a geocoding request, 
             *then pans the map to the geocoded location
             */
            function geocodeAddress(geocoder, resultsMap){
                var address = document.getElementById('address').value;
                
                geocoder.geocode({'address':address}, function(results, status){
                    if(status === 'OK'){
                        resultsMap.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: resultsMap,
                            position: results[0].geometry.location
                        });
                    } else{
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>

      </div>
      
      <div class="col-md-2">
        
      </div>
          
  </div><!-- end of div row -->

  <div class="process">
  <h3 class="text-center wowload fadeInUp"></h3>
  <ul class="row text-center list-inline  wowload bounceInUp">
      <li>
            <span><i class="fa fa-history"></i><b>Research</b></span>
        </li>
        <li>
            <span><i class="fa fa-puzzle-piece"></i><b>Plan</b></span>
        </li>
        <li>
            <span><i class="fa fa-database"></i><b>Develop</b></span>
        </li>
      
    </ul>
  </div>
</div>
<!-- #Cirlce Ends -->


<!-- Footer Starts -->
<div class="footer text-center spacer">
<p class="wowload flipInX"><a href="#"><i class="fa fa-facebook fa-2x"></i></a> <a href="#"><i class="fa fa-instagram fa-2x"></i></a> <a href="#"><i class="fa fa-twitter fa-2x"></i></a> <a href="#"><i class="fa fa-flickr fa-2x"></i></a> </p>
Copyright 2016 Softwork Studio. All rights reserved.
</div>
<!-- # Footer Ends -->
<a href="#works" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>





<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">Title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>


<!-- jquery -->
<script src="assets/jquery.js"></script>

<!-- wow script -->
<script src="assets/wow/wow.min.js"></script>


<!-- boostrap -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>
<script src="assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<script src="assets/script.js"></script>

</body>
</html>