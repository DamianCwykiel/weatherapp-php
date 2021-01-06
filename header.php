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
        body {
            background: url("img/1-bcg.jpg") no-repeat center center fixed;
            background-size: cover;
            }
        .container {
            text-align:center;
            width: 600px;
            font-weight: 600;
        }
        .container h1{
            margin-top:40px;
            font-size:35px;
            font-weight:bold;
        }
        #button {
            width:20%;
        }
        input {
            margin: 5% 0;
            }
            #city {
                width: 80%;
                height:40px;
                margin-left: 10%;
            }
            #alert {
                margin-left: 10%;
                margin-top: 5%;
                width: 80%;
            }
            #openweathermap-widget-11 {
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