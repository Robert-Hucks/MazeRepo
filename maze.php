<?php

// Maze Class
// This class is used to create the maze, made up of tiles. It generates the tiles
// and adds them to an array which keeps them in order, ready to be converted 
// to an image to finally display the completed maze.

class Maze
{

	// Properties
	private $tileArray = [];
	private $completeCellArray = [];


	// Constructor
	function __construct($numOfTiles, $sizeOfTiles, $avoidCellsCompleteArr, $methodToCreate){
		for ($i = 0; $i < $numOfTiles; $i++) {
	
			self::createTile($sizeOfTiles, $i, $avoidCellsCompleteArr[$i], $methodToCreate);
		
		}

		self::returnAllCells();
		
	}


	// Methods
	private function createTile($size, $pos, $avoidCells, $methodToCreate) {
		$avoidCellArray = $avoidCells; // Contains an array that holds value pairs, also held in arrays
		$tilePosition = $pos;
		$startCell = 0;
		$endCell = 0;
		$this->tileArray[] = new Tile ($avoidCellArray, $tilePosition, $size, $startCell, $endCell, $methodToCreate);
	}

	private function addNewTileToArray($tile) {
		$this->tileArray[] = $tile;
	}

	private function returnAllCells() {

		foreach($this->tileArray as $tile){

			$this->completeCellArray = $tile->returnCellArray();

		}
	}

	public function dumpTileArray() {
		print "<pre>";
		print_r($this->tileArray);
		print "</pre>";
	}

	public function returnTileArray() {
		
		echo "<div style='width:1000px;'>";

		foreach($this->tileArray as $selectedTile){

			foreach($selectedTile->returnCellArray() as $selectedTileCellArray){

				foreach($selectedTileCellArray as $selectedTileCell) {

					$selectedTileCellPosition = $selectedTileCell->returnCellPos();

					echo "<div style='width:250px;float:left;'>Pos: " . $selectedTileCellPosition->returnRow() . "/" . $selectedTileCellPosition->returnCol() . "</br>";


					$selectedTileCellAdjacents = $selectedTileCell->returnAdjacentCellsArray();

					echo "Joins to: ";

					foreach($selectedTileCellAdjacents as $adjCell){
						$adjCellPos = $adjCell->returnCellPos();
						print_r($adjCellPos);
					}

					echo "</br>Avoid? ";
					if ($selectedTileCell->returnAvoid() == true) {
						echo "True</br>";
					} else {
						echo "False</br>";
					}

					echo "</div>";

					if ($selectedTileCellPosition->returnCol() == 3) {
						echo "</div></br'><hr style='clear:both;></br><div style='width:400px;'>";
					}
				}

			}

		}

		echo "</div>";

	}

	public function drawMaze() {
		
		foreach($this->tileArray as $selectedTile){

			$cellsInTile = $selectedTile->returnCellArray();
			$tileSize = $selectedTile->returnSize();

			echo "<table>";

			foreach ($cellsInTile as $rowOfCells) {

				echo "<tr>";

				foreach ($rowOfCells as $indivCell) {

					echo "<td>";

					if ($indivCell->returnAvoid() == false) {

						echo "<img src='img/tilePieces/" . $indivCell->returnExits() . ".png'>";

					} else {

						echo "<img src='img/tilePieces/empty.png'>";

					}

					echo "</td>";

				}

				echo "</tr>";
				
			}

			echo "</table>";

		}
	}

}

echo "Maze class imported</br>";

?>