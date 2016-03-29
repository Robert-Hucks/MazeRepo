<?php

// Cell Class
// This class is used to create the individual cells inside a tile, which are in turn used 
// to create the mazes, whether that be on their own or multiple.

class Cell
{

	// Properties
	private $cellPos;
	private $adjacentCells = []; // Any cell that is N/E/S/W of it
	private $exits = ""; // String of directions pointing to cells that it connects to. eg. NE would be a for connecting to a cell above and to the right.
	private $avoid;


	// Constructor
	function __construct($row, $col, $avoidStatus){
		$this->cellPos = new Position ($row, $col);
		$this->avoid = $avoidStatus;
	}


	// Methods
	public function returnCellPos() {
		return $this->cellPos;
	}

	public function returnAdjacentCellsArray() {
		return $this->adjacentCells;
	}

	public function returnExits() {
		return $this->exits;
	}

	public function returnAvoid() {
		return $this->avoid;
	}

	public function setCellPos($newRow, $newCol) {
		$this->cellPos->setRow($newRow);
		$this->cellPos->setCol($newCol);
	}

	public function setAdjacentCellsArray($adjCellArr) {
		$this->adjacentCells = $adjCellArr;
	}

	public function setExits($exitString) {
		$this->exits = $exitString;
		self::reorderDirs();
	}

	public function addExits($exitString) {
		$this->exits .= $exitString;
		self::reorderDirs();
	}

	public function setAvoid($bool) {
		$this->avoid = $bool;
	}

	private function reorderDirs() {
		$stringParts = str_split($this->exits);
		sort($stringParts);
		$this->exits = implode("", $stringParts);
	}

	static function displayPositionOnly($arr) {
		print "<pre>";
		foreach($arr as $item) {
			print_r($item->returnCellPos());
		}
		print "</pre>";
	}
}

echo "Cell class imported</br>";

?>