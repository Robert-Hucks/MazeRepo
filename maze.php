<?php

// Maze Class
// This class is used to create the maze, made up of tiles. It generates the tiles
// and adds them to an array which keeps them in order, ready to be converted 
// to an image to finally display the completed maze.

class Maze
{

	// Properties
	private $tileArray = [];


	// Constructor
	function __construct($numOfTiles, $sizeOfTile, $avoidCellsCompleteArr){
		for ($i = 0; $i < $numOfTiles; $i++) {
	
			self::createTile($sizeOfTile, $i, $avoidCellsCompleteArr[$i]);
		
		}
	}


	// Methods
	private function createTile($size, $pos, $avoidCells) {
		$avoidCellArray = $avoidCells; // Contains an array that holds value pairs, also held in arrays
		$tilePosition = $pos;
		$startCell = 0;
		$endCell = 0;
		$this->tileArray[] = new Tile ($avoidCellArray, $tilePosition, $size, $startCell, $endCell);
	}

	private function addNewTileToArray($tile) {
		$this->tileArray[] = $tile;
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

					echo "</div>";

					if ($selectedTileCellPosition->returnCol() == 3) {
						echo "</div></br'><hr style='clear:both;></br><div style='width:400px;'>";
					}
				}

			}

		}

		echo "</div>";

	}

}

echo "Maze class imported</br>";

?>