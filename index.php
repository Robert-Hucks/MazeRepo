<!DOCTYPE HTML5>

<html lang="en">
  	<head>

		<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>HTML5 Canvas Test</title>

		<!-- CSS Files -->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- JavaScript Files -->
    	<script src="js/main.js"></script>

  	</head>

  	<body onload="pageLoad();">

		<div id="stage">
		  
			<canvas id="ui-layer" width="480" height="480"></canvas>
			<canvas id="player-layer" width="480" height="480"></canvas>
			<canvas id="maze-layer" width="480" height="480"></canvas>
			<canvas id="background-layer" width="480" height="480"></canvas>

		</div>


		<script src="js/jquery.min.js"></script>
	</body>

</html>