<?php

// Tile Class
// This class is used to create the tiles, which can be used individually
// or used alongside with others to create the complete maze.
class Tile
{

	// Properties
	private $cellArray = [];
	private $avoidCellArray = [];
	private $tilePosition;
	private $size; // All tiles are equal in height and width.
	private $startCell; // Reference to index of $cellArray for starting position
	private $endCell; // Reference to index of $cellArray for ending position
	


	// Constructor
	function __construct($cellArr, $avoidCellArr, $tilePos, $tileSize, $sCell, $eCell){
		$this->cellArray = $cellArr;
		$this->avoidCellArray = $avoidCellArr;
		$this->tilePosition = $tilePos;
		$this->size = $tileSize;
		$this->startCell = $sCell;
		$this->endCell = $eCell;
	}


	// Methods
	public function returnCellArray() {
		echo $this->cellNumber;
	}

	public function returnTilePosition() {
		echo $this->adjacentCells;
	}

	public function returnSize() {
		echo $this->size;
	}

	public function setCellArray() {
		echo $this->adjacentCells;
	}

	public function setTilePosition() {
		echo $this->adjacentCells;
	}

}

?>