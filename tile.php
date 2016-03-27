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
	private $generatedWith;
	


	// Constructor
	function __construct($avoidCellArr, $tilePos, $tileSize, $sCell, $eCell, $methodToCreate){
		$this->avoidCellArray = self::convertToPositionArray($avoidCellArr); // Contains the cell positions to avoid in arrays
		$this->tilePosition = $tilePos;
		$this->size = $tileSize;
		$this->startCell = $sCell;
		$this->endCell = $eCell;
		$this->generatedWith = $methodToCreate;


		for ($i = 0; $i < $this->size; $i++) { //height of Tile (Row)

			for ($j = 0; $j < $this->size; $j++ ) { //width of Tile (Column)

				// Create the Cell object
				$avoidStatus = false;
				$tempPos = new Position($i, $j);


				if (in_array($tempPos, $this->avoidCellArray)) {
					$avoidStatus = true;
				}

				$this->cellArray[$i][$j] = new Cell($i, $j, $avoidStatus);

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
		
		self::GenerateRoute();
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

		for ($x = 0; $x < count($adjCellArr); $x++) {

			if ($adjCellArr[$x]->returnAvoid() == 1) {

				unset($adjCellArr[$x]);

			}
		}

		$adjCellArr = array_values($adjCellArr);

		$ref->setAdjacentCellsArray($adjCellArr);

	}

	private function convertToPositionArray($arr) {

		$newArr = [];

		

		foreach ($arr as $coords) {

			if (!empty($coords)){

				$newArr[] = new Position ($coords[0], $coords[1]);

			}

		}

		

		return $newArr;
	}

	private function GenerateRoute() {

		switch ($this->generatedWith) {
			case '1':
				// Growing Tree Algorithm

				$cellPool = [];
				$complete = false;

				// Select a single cell at random to start from
				$cellPool[] = $this->cellArray[mt_rand(0, $this->size - 1)][mt_rand(0, $this->size - 1)];

				while (count($cellPool) < count($this->cellArray)) {
					
					$currentCell = end($cellPool); // Take last cell added

					$currentAdjCells = $currentCell->returnAdjacentCellsArray(); // Get list of adjacent cells

					$randAdjCellIndex = mt_rand(0, count($currentAdjCells) - 1);
					$chosenAdjCell = $currentAdjCells[$randAdjCellIndex]; // Pick random adjacent cell

					while (in_array($chosenAdjCell, $cellPool)) {
						unset($currentAdjCells[$randAdjCellIndex]);
						$currentAdjCells = array_values($currentAdjCells);
						$randAdjCellIndex = mt_rand(0, count($currentAdjCells) - 1);
						$chosenAdjCell = $currentAdjCells[$randAdjCellIndex]; // Pick another random adjacent cell
					}
					
					$currentCell->addExits(Position::calcDirection($currentCell->returnCellPos(), $chosenAdjCell->returnCellPos())); // Get the direction of exit and pass it to the selected cell.
					$chosenAdjCell->addExits(Position::OppDir(Position::calcDirection($currentCell->returnCellPos(), $chosenAdjCell->returnCellPos())));

					$cellPool[] = $chosenAdjCell; // Add the chosen cell to the cell pool.

				}

				break;
			
		}

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