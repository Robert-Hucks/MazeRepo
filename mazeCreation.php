<?php
	
	// Import classes
	include_once('position.php');
	include_once('cell.php');
	include_once('tile.php');
	include_once('maze.php');

	// Required variables
	$numOfTiles = 1;
	$tileSize = 4;


	// Create new Maze
	$maze = new Maze ($numOfTiles, $tileSize);

	//$maze->dumpTileArray();
	$maze->returnTileArray();

?>