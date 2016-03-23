<?php

// Cell Class
// This class is used to create the individual cells inside a tile, which are in turn used 
// to create the mazes, whether that be on their own or multiple.

class Cell
{

	// Properties
	private $cellNumber;
	private $adjacentCells = [];


	// Constructor
	function __construct($cellNum, $adjCellArray){
		$this->cellNumber = $cellNum;
		$this->adjacentCells = $adjCellArray;
	}


	// Methods
	public function returnCellNumber() {
		return $this->cellNumber;
	}

	public function returnAdjacentCellsArray() {
		return $this->adjacentCells;
	}

	public function setCellNumber($num) {
		$this->adjacentCells = $num;
	}

	public function setAdjacentCellsArray($adjCellArr) {
		$this->adjacentCells = $adjCellArr;
	}

}

?>