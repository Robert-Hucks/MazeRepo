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
	function __construct($avoidCellArr, $tilePos, $tileSize, $sCell, $eCell){
		$this->avoidCellArray = self::convertToPositionArray($avoidCellArr); // Contains the cell positions to avoid in arrays
		$this->tilePosition = $tilePos;
		$this->size = $tileSize;
		$this->startCell = $sCell;
		$this->endCell = $eCell;

		for ($i = 0; $i < $this->size; $i++) { //height of Tile (Row)

			for ($j = 0; $j < $this->size; $j++ ) { //width of Tile (Column)

				// Create the Cell object
				$this->cellArray[$i][$j] = new Cell($i, $j);

			}
		}

		// Work out any adjacent cells and create array of them
		foreach ($this->cellArray as $rowOfCells) {

			foreach ($rowOfCells as $cellRef) {

				$cellPos = $cellRef->returnCellPos();
				$cellRow = $cellPos->returnRow();
				$cellCol = $cellPos->returnCol();
				self::calcAdjCells($cellRow, $cellCol, $cellRef);

			}
			
		}
		
		//self::GenerateRoute();
	}


	// Methods
	private function calcAdjCells($row, $col, $ref) {
		// Case statement to work out what ~valid~ cells are around. (remove cells to avoid at the end of this process.)
		$adjCellArr = [];
		
		// Vertical cells
		switch ($row) {
			case 0:
				
				$adjCellArr[] = $this->cellArray[$row+1][$col]; // Below
				break;

			case ($this->size)-1:

				$adjCellArr[] = $this->cellArray[$row-1][$col]; // Above
				break;

			default:
				
				$adjCellArr[] = $this->cellArray[$row-1][$col]; // Above
				$adjCellArr[] = $this->cellArray[$row+1][$col]; // Below
				break;

		}

		// Horizontal cells
		switch ($col) {
			case 0:
				
				$adjCellArr[] = $this->cellArray[$row][$col+1]; // Right
				break;

			case ($this->size)-1:

				$adjCellArr[] = $this->cellArray[$row][$col-1]; // Left
				break;

			default:
				
				$adjCellArr[] = $this->cellArray[$row][$col-1]; // Left
				$adjCellArr[] = $this->cellArray[$row][$col+1]; // Right
				break;

		}

		// $adjCellArr[] = $this->cellArray[$row-1][$col]; // Above
		// $adjCellArr[] = $this->cellArray[$row+1][$col]; // Below
		// $adjCellArr[] = $this->cellArray[$row][$col-1]; // Left
		// $adjCellArr[] = $this->cellArray[$row][$col+1]; // Right


		for ($x = 0; $x < count($adjCellArr); $x++) {

			if (in_array($adjCellArr[$x]->returnCellPos(), $this->avoidCellArray)) {

				unset($adjCellArr[$x]);

			}

		}

		$adjCellArr = array_values($adjCellArr);

		// Remove any cells on the avoidance list and send the remaining to the cells setAdjacentCellsArray() method.
		$ref->setAdjacentCellsArray($adjCellArr);

	}

	private function convertToPositionArray($arr) {

		$newArr = [];

		foreach ($arr as $coords) {

			$newArr[] = new Position ($coords[0], $coords[1]);

		}

		return $newArr;
	}

	public function returnCellArray() {
		return $this->cellArray;
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

echo "Tile class imported</br>";

?>