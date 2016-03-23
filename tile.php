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
		return $this->cellNumber;
	}

	public function returnAvoidCellArray() {
		return $this->avoidCellArray;
	}

	public function returnTilePosition() {
		return $this->adjacentCells;
	}

	public function returnSize() {
		return $this->size;
	}

	public function returnStartCell() {
		return $this->startCell;
	}

	public function returnEndCell() {
		return $this->endCell;
	}

	public function setCellArray($cellArr) {
		$this->cellArray = $cellArr;
	}

	public function setAvoidCellArray($avoidCellArr) {
		$this->avoidCellArray = $avoidCellArr;
	}

	public function setTilePosition($tilePos) {
		$this->tilePosition = $tilePos;
	}

	public function setStartCell($startPos) {
		$this->startCell = $startPos;
	}

	public function setEndCell($endPos) {
		$this->endCell = $endPos;
	}

}

?>