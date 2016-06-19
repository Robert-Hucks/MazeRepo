<?php

// Position Class
// This class is used to hold the row and column (or in other words the x and y) values for
// positioning of other objects. It can be used for positioning the tiles or the cells themselves
// within the tiles.

class Position
{

	// Properties
	private $row;
	private $col;


	// Constructor
	function __construct($row, $col){
		$this->row = $row;
		$this->col = $col;
	}


	// Methods
	public function returnRow() {
		return $this->row;
	}

	public function returnCol() {
		return $this->col;
	}

	public function setRow($newRow) {
		$this->row = $newRow;
	}

	public function setCol($newCol) {
		$this->col = $newCol;
	}

	static function calcDirection($pos1, $pos2) {
		$returnVal = "";
		$posArr1 = [$pos1->returnRow(), $pos1->returnCol()];
		$posArr2 = [$pos2->returnRow(), $pos2->returnCol()];

		if ($posArr1[0] == $posArr2[0]) { // If rows are the same...

			if ($posArr1[1] > $posArr2[1]) { // and Pos1 is below Pos2, therefore moving North

				$returnVal = "W";

			} else {

				$returnVal = "E";

			}

		} else { // If they aren't on the same row

			if ($posArr1[0] > $posArr2[0]) { // and Pos1 is to the right of Pos2

				$returnVal = "N";

			} else { // otherwise...

				$returnVal = "S";

			}

		}

		return $returnVal;
	}

	static function OppDir($dir) {
		$newDir = "";

		switch ($dir) {
			case 'N':
				$newDir = "S";
				break;

			case 'E':
				$newDir = "W";
				break;

			case 'S':
				$newDir = "N";
				break;

			case 'W':
				$newDir = "E";
				break;
		}
		return $newDir;
	}
}

//echo "Position class imported</br>";

?>
