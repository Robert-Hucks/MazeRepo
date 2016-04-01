window.addEventListener("keydown", keyPressListener, false);

function pageLoad() {
	// // Set up globals
	// JSON import of maze (remove this string, import instead.. perhaps with ajax)
	JSONString = '[{"size":4,"0":{"position":{"row":0,"column":0},"directions":"","avoid":true},"1":{"position":{"row":0,"column":1},"directions":"S","avoid":false},"2":{"position":{"row":0,"column":2},"directions":"","avoid":true},"3":{"position":{"row":0,"column":3},"directions":"S","avoid":false},"4":{"position":{"row":1,"column":0},"directions":"E","avoid":false},"5":{"position":{"row":1,"column":1},"directions":"ENSW","avoid":false},"6":{"position":{"row":1,"column":2},"directions":"EW","avoid":false},"7":{"position":{"row":1,"column":3},"directions":"NSW","avoid":false},"8":{"position":{"row":2,"column":0},"directions":"","avoid":true},"9":{"position":{"row":2,"column":1},"directions":"N","avoid":false},"10":{"position":{"row":2,"column":2},"directions":"","avoid":true},"11":{"position":{"row":2,"column":3},"directions":"NS","avoid":false},"12":{"position":{"row":3,"column":0},"directions":"E","avoid":false},"13":{"position":{"row":3,"column":1},"directions":"EW","avoid":false},"14":{"position":{"row":3,"column":2},"directions":"EW","avoid":false},"15":{"position":{"row":3,"column":3},"directions":"NW","avoid":false}}]';

	// Maze Canvas globals
	canvasMaze = document.getElementById('maze-layer');
	ctxMaze = canvasMaze.getContext('2d');
	canvasMaze.width = window.innerWidth;
	canvasMaze.height = window.innerHeight;

	// Player Canvas globals
	canvasPlayer = document.getElementById('player-layer');
	ctxPlayer = canvasPlayer.getContext('2d');
	canvasPlayer.width = window.innerWidth;
	canvasPlayer.height = window.innerHeight;

	// Drawing Params
	cellSize = 100;
	gridSize = 4

	// // 


	// Starting Location
	var randCell = randomCell("start");
	console.log(randCell);
	adjustMazeCanvas(randCell);

	// Draw Maze
	drawMaze();
	// Draw Player
	drawPlayer("N");
};

function readJSON() {
	// Work out!
};

function adjustMazeCanvas(randCell) {
	var xDif = (canvasMaze.width/2 - ((randCell["row"] * cellSize) + (cellSize * 0.5)));
	var yDif = (canvasMaze.height/2 - ((randCell["col"] * cellSize) + (cellSize * 0.5)));
	ctxMaze.translate(Math.round(xDif), Math.round(yDif));
};



function randomCell(use) {
	var arr;
	switch (use) {

		case "start":
			arr = {row: Math.floor((Math.random() * gridSize)), col: Math.floor((Math.random() * gridSize))};
			break;

	}

	return arr;
};



// // // // // // // // // // // //
// i. Deal with player movement  //
// // // // // // // // // // // //


function keyPressListener(e) {
	

	if (e.keyCode == "38" || e.keyCode == "87") {
		//Up arrow or W key
		console.log("Up!");
		ctxMaze.translate(0, -100);
		drawMaze();
	} else if (e.keyCode == "37" || e.keyCode == "65") {
		// Left arrow or A key
		console.log("Left!");
		ctxMaze.translate(-100, 0);
		drawMaze();
	} else if (e.keyCode == "40" || e.keyCode == "83") {
		// Down arrow or S key
		console.log("Down!");
		ctxMaze.translate(0, 100);
		drawMaze();
	} else if (e.keyCode == "39" || e.keyCode == "68") {
		// Right arrow or D key
		console.log("Right!");
		ctxMaze.translate(100, 0);
		drawMaze();
	}

};




// // // // // // // // // // // // //
// ii. Deal with drawing the Maze   //
// // // // // // // // // // // // //


function drawMaze() {

	//Clear canvas for drawing.
	ctxMaze.save();
	ctxMaze.setTransform(1, 0, 0, 1, 0, 0);
	ctxMaze.clearRect(0, 0, canvasMaze.width, canvasMaze.height);
	ctxMaze.restore();

	var maze = JSON.parse(JSONString);

	for (var tile in maze) { // Loop through the tiles
		var tilePiece = maze[tile];

		for (i = 0; i < Math.pow(gridSize, 2); i++) { // Loop through the cells
			var cellPiece = tilePiece[i];
			var cellPos = cellPiece["position"];

			// Draw cell
			drawCell(canvasMaze, ctxMaze, 0 + (cellSize * cellPos["column"]), 0 + (cellSize * cellPos["row"]), cellSize, cellPiece["directions"]);
		}

	}

};


function drawCell(canvas, ctx, startingX, startingY, size, dirString) {

	cellOffset = 1;
	// Cell Base
	//ctx.fillStyle = "rgb(248, 250, 215)";
	ctx.fillStyle = "rgb(0, 0, 215)";
	ctx.fillRect(startingX, startingY, size, size);

	ctx.fillStyle = "rgb(0, 0, 0)";
	//// Corner Pieces
	// Left Top
	//canvas.fillStyle = "rgba(255, 0, 0)";
	ctx.fillRect(Math.round(startingX), Math.round(startingY), Math.round(size*0.125 - cellOffset), Math.round(size*0.125 - cellOffset));
	// Left Bottom
	//canvas.fillStyle = "rgba(255, 0, 0)";
	ctx.fillRect(Math.round(startingX), Math.round(((startingY + size) - (size*0.125)) + cellOffset), Math.round(size*0.125 - cellOffset), Math.round(size*0.125 - cellOffset));
	// Right Top
	//canvas.fillStyle = "rgba(255, 0, 0)";
	ctx.fillRect(Math.round(((startingX + size) - (size*0.125)) + cellOffset), Math.round(startingY), Math.round(size*0.125 - cellOffset), Math.round(size*0.125 - cellOffset));
	// Right Bottom
	//canvas.fillStyle = "rgba(255, 0, 0)";
	ctx.fillRect(Math.round(((startingX + size) - (size*0.125)) + cellOffset), Math.round(((startingY + size) - (size*0.125)) + cellOffset), Math.round(size*0.125 - cellOffset), Math.round(size*0.125 - cellOffset));

	switch(dirString) {
		case "N":
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "E":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "S":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "W":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "EN":
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "ENS":
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "ENSW":
			break;
		case "ENW":
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "ES":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "ESW":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "EW":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "N":
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "NS":
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "NSW":
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "NW":
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "S":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "SW":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "W":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			break;
		case "":
			drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset);
			drawCenter(canvas, ctx, startingX, startingY, size, cellOffset);
	}

};

function drawNorthWall(canvas, ctx, startingX, startingY, size, cellOffset) {
	// First square along
	ctx.fillRect(Math.round((startingX + size*0.125) + cellOffset), Math.round(startingY), Math.round(size*0.25 - cellOffset*2), Math.round(size*0.125 - cellOffset));
	// Second square along
	ctx.fillRect(Math.round((startingX + size*0.375) + cellOffset), Math.round(startingY), Math.round(size*0.25 - cellOffset*2), Math.round(size*0.125 - cellOffset));
	// Third square along
	ctx.fillRect(Math.round((startingX + size*0.625) + cellOffset), Math.round(startingY), Math.round(size*0.25 - cellOffset*2), Math.round(size*0.125 - cellOffset));
};

function drawEastWall(canvas, ctx, startingX, startingY, size, cellOffset) {
	// First square along
	ctx.fillRect(Math.round((startingX + size*0.875) + cellOffset), Math.round((startingY + size*0.125) + cellOffset), Math.round(size*0.125 - cellOffset), Math.round(size*0.25 - cellOffset*2));
	// Second square along
	ctx.fillRect(Math.round((startingX + size*0.875) + cellOffset), Math.round((startingY + size*0.375) + cellOffset), Math.round(size*0.125 - cellOffset), Math.round(size*0.25 - cellOffset*2));
	// Third square along
	ctx.fillRect(Math.round((startingX + size*0.875) + cellOffset), Math.round((startingY + size*0.625) + cellOffset), Math.round(size*0.125 - cellOffset), Math.round(size*0.25 - cellOffset*2));
};

function drawSouthWall(canvas, ctx, startingX, startingY, size, cellOffset) {
	// First square along
	ctx.fillRect(Math.round((startingX + size*0.125) + cellOffset), Math.round((startingY + size*0.875) + cellOffset), Math.round(size*0.25 - cellOffset*2), Math.round(size*0.125 - cellOffset));
	// Second square along
	ctx.fillRect(Math.round((startingX + size*0.375) + cellOffset), Math.round((startingY + size*0.875) + cellOffset), Math.round(size*0.25 - cellOffset*2), Math.round(size*0.125 - cellOffset));
	// Third square along
	ctx.fillRect(Math.round((startingX + size*0.625) + cellOffset), Math.round((startingY + size*0.875) + cellOffset), Math.round(size*0.25 - cellOffset*2), Math.round(size*0.125 - cellOffset));
};

function drawWestWall(canvas, ctx, startingX, startingY, size, cellOffset) {
	// First square along
	ctx.fillRect(Math.round(startingX), Math.round((startingY + size*0.125) + cellOffset), Math.round(size*0.125 - cellOffset), Math.round(size*0.25 - cellOffset*2));
	// Second square along
	ctx.fillRect(Math.round(startingX), Math.round((startingY + size*0.375) + cellOffset), Math.round(size*0.125 - cellOffset), Math.round(size*0.25 - cellOffset*2));
	// Third square along
	ctx.fillRect(Math.round(startingX), Math.round((startingY + size*0.625) + cellOffset), Math.round(size*0.125 - cellOffset), Math.round(size*0.25 - cellOffset*2));
};

function drawCenter(canvas, ctx, startingX, startingY, size, cellOffset) {
	// Middle square
	ctx.fillRect(Math.round((startingX + size*0.125) + cellOffset), Math.round((startingY + size*0.125) + cellOffset), Math.round(size*0.75 - cellOffset*2), Math.round(size*0.75 - cellOffset*2));
};




// // // // // // // // // // // //
//iii. Deal with drawing player  //
// // // // // // // // // // // //


function drawPlayer(facing) {
	ctxPlayer.fillStyle = "rgb(255, 0, 0)";
	ctxPlayer.beginPath();
	ctxPlayer.arc(Math.round(canvasPlayer.width/2), Math.round(canvasPlayer.height/2), 20, 0, 2*Math.PI);
	ctxPlayer.fill();
	ctxPlayer.stroke();

};