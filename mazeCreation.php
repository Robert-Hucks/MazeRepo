<?php
	// Start timer...
	$time_start = microtime(true);

	// Import classes
	include_once('position.php');
	include_once('cell.php');
	include_once('tile.php');
	include_once('maze.php');

	// Required variables
	$methodToCreate = 1;
	// 1 = Growing Tree Algorithm

	$numOfTiles = 1;
	$tileSize = 4; // Cant be < 2
	$avoidCellArray = [ [ [ ] ] ];
	//$avoidCellArray = [ [ [ 0, 0 ], [ 0, 2 ], [ 2, 0 ], [ 2, 2 ] ] ]; // Test
	//$avoidCellArray = [ [ [ 0, 0 ] ], [ [ 1, 1] ] ]; // Test
	//$avoidCellArray = [ [ [  ] ], [ [  ] ], [ [  ] ], [ [  ] ] ]; // An array that contains arrays (one for each tile) that in turn contain arrays (hold Position objects for cell positions to be avoided by the algorithm)

	// Note on avoidCellArray: Despite being a list of cells that dont need to be used, the cells still need to be created to generate a complete and error free tile without any holes. This should only be used to make sure those cells are not included in the final display, nor in the creation of paths or cell adjacency arrays.


	// Create new Maze
	$maze = new Maze ($numOfTiles, $tileSize, $avoidCellArray, $methodToCreate);

	// Display Maze
	//$maze->returnTileArray();
	$maze->drawMaze();
	$jsonString = $maze->returnJSON();

	echo $jsonString;
	//file_put_contents("generatedMazes/" . date("Y-m-d") . "-" . time() . ".json", addslashes($jsonString));

	//print "JSON String (length " . strlen($jsonString) . "): ";
	//print "<pre>";
	//print_r($jsonString);
	//print "</pre>";

	//echo "Total execution time: " . (microtime(true) - $time_start) . "s";
?>