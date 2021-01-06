<?php

	$weather = "";
	$error = "";
	
	if($_GET['city']){
		
	$urlContents =
	
	file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",usa&appid=c370ffd1db14642ec487c80adea004d4");
	
	$weatherArray = json_decode($urlContents, 2);
	
	//print_r($weatherArray);
	
	
	if ($weatherArray['cod'] == 200){
	
	$weather = "The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";
	
	$tempInCelcius = intval($weatherArray['main']['temp'] - 273);
	$weather = $weather."The temperature is " .$tempInCelcius."&deg;C"."."; 
	
	$weather = $weather." <br> The wind speed is ".$weatherArray['wind']['speed']." "."m/s".".";
	
	} else {
		$error = "Sorry, I couldn't find the city you like. <br> Please, check the spelling (for Polish cities use their native
		spelling).";
		}
	
	}
   

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, shrink-to-fit=yes">
	<title>Weather App</title>
	
    <!--CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="icon" href="icon/favicon.ico">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  </head>
  <style>
  body{
	 background: url("img/1-bcg.jpg") no-repeat center center fixed;
	 background-size: cover;
    }
  .container{
	  text-align:center;
	  width: 600px;
	  font-weight: 600;
  }
  .container h1{
	  margin-top:40px;
	  font-size:35px;
	  font-weight:bold;
  }
  #button{
	  width:20%;
  }
  input{
	  margin: 5% 0;
	}
	#city{
		width: 80%;
		height:40px;
		margin-left: 10%;
	}
	#alert{
		margin-left: 10%;
      	margin-top: 5%;
      	width: 80%;
	}
	#openweathermap-widget-11{
		margin-left: -10%;
		margin-top: 10%;
	}
       
    /*Media Queries*/
  @media (max-width: 576px) { 
       body{
         height: 100vh;
         overflow: hidden;
       }
      .container{
       	 width: 360px;
	  }
      .container h1{
	     margin-top:100px;
	  }
      #openweathermap-widget-11{
      	 display:none;
      }
  }
    @media (min-width: 576px) and (max-width: 767.98px) { 
      body{
         height: 100vh;
       }
      .container{
        width: 360px;
	  }
      #openweathermap-widget-11{
      	 display:none;
      }
 }
  </style>
  
  <body>
  <div class ="container">
		
		<h1 id="h1">TheWeatherApp</h1>
		
			<form>
				  
				  <div class="form-group">
						<label for="city">Enter the name city's name.</label>
						<input type="text" class="form-control" name="city" id="city" placeholder="Eg. Rzeszów, Sydney" value = "<?php
							if (array_key_exists('city', $_GET)){
								
								echo $_GET['city'];
								
							}
						
						?>">
				  </div>
				  <button type="submit" class="btn btn-primary" id="button">Check</button>
			</form>
			
			<div id="forecast"><?php
				
				if($weather){
					echo '<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
						  '.$weather.'
                          	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
						</div>';
					
				}else if($error){
					echo '<div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
  							'.$error.'
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>';
				}
				?>
			</div>
			
	<div id="openweathermap-widget-11"></div>
			
</div>
   
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<!--weatherWidget-->
	<script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script>
	<script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 11,cityid: '759734',appid: '5de97bbf5669e89d597d4e31fe1d7312',units: 'metric',containerid: 'openweathermap-widget-11',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
  </body>
</html>
