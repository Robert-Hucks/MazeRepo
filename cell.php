<?php

// Cell Class
// This class is used to create the individual cells inside a tile, which are in turn used 
// to create the mazes, whether that be on their own or multiple.

class Cell
{

	// Properties
	private $cellPos;
	private $adjacentCells = [];


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