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
}

echo "Position class imported</br>";

?>