<?php

// Maze Class
// This class is used to create the maze, made up of tiles. It generates the tiles
// and adds them to an array which keeps them in order, ready to be converted 
// to an image to finally display the completed maze.

class Maze
{

	// Properties
	private $tileArray = [];


	// Constructor
	function __construct($numOfTiles, $sizeOfTile){
		for ($i = 0; $i < $numOfTiles; $i++) {
			addNewtileToArray(createTile($sizeOfTile, $i));
		}
	}


	// Methods
	private function createTile($size, $pos) {
		return "testing... [" . $size . " / " . $pos . "]";
	}

	private function addNewTileToArray($tile) {
		$this->tileArray[] = $tile;
	}

	public function returnTileArray() {
		var_dump($tileArray);
	}

}

?>