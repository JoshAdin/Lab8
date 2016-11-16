<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Weather Info</title>

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
                 <li class="active"><a href="javascript:;"><b>Weather API</b></a></li>
                 <li ><a href="http://adinfon.myweb.cs.uwindsor.ca/lab8/city.php"><b>Map API</b></a></li>
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

            <form name="cityForm" action="weather.php" method="GET">
                <div class="form-group" >
                    <input type="text" class="form-control"  name = "address" id="address"  placeholder="Enter a city here">
                </div>
            </form>
        </div>
        
        <div class="col-md-4">
        
        </div>

    </div>
        
      
    
  <div class="row">
        <div class="col-md-2">
        
        </div>
        
      <div class="text-center col-md-8 wowload fadeInUp">
          
          <h4><i class="fa fa-cloud"></i><b>Weather Info</b></h4>

      </div>
      
      <div class="col-md-2">
        
      </div>
          
      
      <div>
      
        <!--If the location request is submitted, retrieve weather update from the API.-->  
       <?php
			if(isset($_GET)){
				$user_city = $_GET['address'];
				$user_country = $_GET['country'];
				
				$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $user_city . "&appid=f5bb229775cf72823fc3606461a1fc94";
				$weather_data = file_get_contents($api_url);
				$json = json_decode($weather_data, TRUE);
				
				
				$user_temp = $json['main']['temp'];
				$user_humidity = $json['main']['humidity'];
				$user_condition = $json['weather'][0]['main'];
				$user_wind = $json['wind']['speed'];
				$user_country = $json['sys']['country'];

				/**
                * If no temperature is attained for the entered location
                * dont display the info table below
                */
				if($user_temp){
				
                    $kelvin = 273.15;
                    $user_temp = floatval($user_temp) - $kelvin;
                    
                
                /**
                *Table output the weather information obtained from the API
                */
                $table ="<table class=\"table table-bordered table-striped\" style=\"font-weight:bold\">
                            <tr>
                                <td>City</td><td>" . $user_city . "</td>
                            </tr>
                            <tr>
                                <td>Country Code</td><td>" . $user_country . "</td>
                            </tr>
                            <tr>
                                <td>Current Temperature</td><td>" . $user_temp . "&deg;C</td>
                            </tr>
                            <tr>
                                <td>Humidity</td><td>" . $user_humidity . "</td>
                            </tr>
                            <tr>
                                <td>Current Conditions</td><td>" . $user_condition . "</td>
                            </tr>
                            <tr>
                                <td>Wind Speed</td><td>" . $user_wind . "</td>
                            </tr>
                            
                        </table>"; 
                
                    echo $table;
				
				}
	
			};
         
                /**
                *If alocation with data is obtained Saving the info retrieved from the API to a data.jsonn file
                */
			if(isset($_GET['address'])){
                date_default_timezone_set('Canada/Toronto');
                $date = date('m/d/Y h:i:s a', time());
                $arr = array('location' => $user_city,'temp' => $user_temp, 'humidity' => $user_humidity, 'current condition' => $user_condition, 'wind speed' => $user_wind, 'time' => $date );
				$data = "data.json";
				$json_string = json_encode($arr, JSON_PRETTY_PRINT);
				file_put_contents($data, $json_string, FILE_APPEND);
			};
		?>
	
      
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