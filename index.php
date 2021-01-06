<?php

	$weather = "";
	$error = "";
	
	if($_GET['city']) {
		$urlContents =
			file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city']).",usa&appid=c370ffd1db14642ec487c80adea004d4");
		$weatherArray = json_decode($urlContents, 2);
	//print_r($weatherArray);
		if ($weatherArray['cod'] == 200) {
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
<?php include("header.php");?>
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
					} else if($error) {
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
<?php include("footer.php");?>
		