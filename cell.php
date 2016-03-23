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
		echo $this->cellNumber;
	}

	public function returnAdjacentCellsArray() {
		echo $this->adjacentCells;
	}

	public function setCellNumber() {
		echo $this->adjacentCells;
	}

	public function setAdjacentCellsArray() {
		echo $this->adjacentCells;
	}

}

?>