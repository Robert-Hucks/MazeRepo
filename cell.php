<?php

// Cell Class
// This class is used to create the individual cells inside a tile, which are in turn used 
// to create the mazes, whether that be on their own or multiple.

class Cell
{

	// Properties
	private $cellPos;
	private $adjacentCells = []; // Any cell that is N/E/S/W of it
	private $exits = []; // Any cells that it actually joins to


	// Constructor
	function __construct($row, $col){
		$this->cellPos = new Position ($row, $col);
		//$this->adjacentCells = $adjCellArr;
	}


	// Methods
	public function returnCellPos() {
		return $this->cellPos;
	}

	public function returnAdjacentCellsArray() {
		return $this->adjacentCells;
	}

	public function returnExitArray() {
		return $this->exits;
	}

	public function setCellPos($newRow, $newCol) {
		$this->cellPos->setRow($newRow);
		$this->cellPos->setCol($newCol);
	}

	public function setAdjacentCellsArray($adjCellArr) {
		$this->adjacentCells = $adjCellArr;
	}

}

echo "Cell class imported</br>";

?>