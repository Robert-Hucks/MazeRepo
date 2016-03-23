<?php
	
	// Import classes
	include_once('cell.php');
	include_once('tile.php');

	// Required variables
	$numOfTiles = 4;
	$tileSize = 9;


	// Create new Maze
	$maze = new Maze ($numOfTiles, $tileSize);

	$maze->returnTileArray();

?>