function draw() {

	var canvasBackground = document.getElementById('background-layer');
	var ctxBackground = canvasBackground.getContext('2d');

	var cellSize = 100;

	// 4 cells back to back
	for (i = 0; i < 4; i++) {
		for (j = 0; j < 4; j++) {
			drawCell(canvasBackground, ctxBackground, 0 + (cellSize * i), 0 + (cellSize * j), cellSize, "NESW");
		}
	}
	
	//drawCell(canvasBackground, ctxBackground, 10, 10, cellSize, "NESW");

};

function drawCell(canvas, ctx, startingX, startingY, size, dirString) {

	// Cell Base
	ctx.fillStyle = "rgb(248, 250, 215)";
	ctx.fillRect(startingX, startingY, size, size);

	ctx.fillStyle = "rgb(0, 0, 0)";
	//// Corner Pieces
	// Left Top
	//canvas.fillStyle = "rgba(255, 0, 0)";
	ctx.fillRect(startingX, startingY, size*0.125 - 1, size*0.125 - 1);
	// Left Bottom
	//canvas.fillStyle = "rgba(255, 0, 0)";
	ctx.fillRect(startingX, ((startingY + size) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
	// Right Top
	//canvas.fillStyle = "rgba(255, 0, 0)";
	ctx.fillRect(((startingX + size) - (size*0.125)) + 1, startingY, size*0.125 - 1, size*0.125 - 1);
	// Right Bottom
	//canvas.fillStyle = "rgba(255, 0, 0)";
	ctx.fillRect(((startingX + size) - (size*0.125)) + 1, ((startingY + size) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);

	var directionArray = dirString.split("");

	for (a = 0; a < directionArray.length; a++) {
		switch(directionArray[a]) {
			case "N":
				//console.log("N is here!");
				// First square along
				ctx.fillRect((startingX + (size*0.25)), startingY, size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect((startingX + (size*0.25)) - (size*0.125 - 1), startingY, size*0.125 - 1, size*0.125 - 1);
				// Second square along
				ctx.fillRect((startingX + (size*0.5)), startingY, size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect((startingX + (size*0.5)) - (size*0.125 - 1), startingY, size*0.125 - 1, size*0.125 - 1);
				// Third square along
				ctx.fillRect((startingX + (size*0.75)), startingY, size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect((startingX + (size*0.75)) - (size*0.125 - 1), startingY, size*0.125 - 1, size*0.125 - 1);
				break;
			case "E":
				//console.log("E is here!");
				// First square along
				ctx.fillRect(((startingX + size) - (size*0.125)) + 1, (startingY + size*0.25), size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect(((startingX + size) - (size*0.125)) + 1, ((startingY + size*0.25) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				// Second square along
				ctx.fillRect(((startingX + size) - (size*0.125)) + 1, (startingY + size*0.5), size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect(((startingX + size) - (size*0.125)) + 1, ((startingY + size*0.5) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				// Third square along
				ctx.fillRect(((startingX + size) - (size*0.125)) + 1, (startingY + size*0.75), size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect(((startingX + size) - (size*0.125)) + 1, ((startingY + size*0.75) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				break;
			case "S":
				//console.log("S is here!");
				// First square along
				ctx.fillRect((startingX + (size*0.25)), ((startingY + size) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect((startingX + (size*0.25)) - (size*0.125 - 1), ((startingY + size) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				// Second square along
				ctx.fillRect((startingX + (size*0.5)), ((startingY + size) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect((startingX + (size*0.5)) - (size*0.125 - 1), ((startingY + size) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				// Third square along
				ctx.fillRect((startingX + (size*0.75)), ((startingY + size) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect((startingX + (size*0.75)) - (size*0.125 - 1), ((startingY + size) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				break;
			case "W":
				//console.log("W is here!");
				// First square along
				ctx.fillRect(startingX, (startingY + size*0.25), size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect(startingX, ((startingY + size*0.25) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				// Second square along
				ctx.fillRect(startingX, (startingY + size*0.5), size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect(startingX, ((startingY + size*0.5) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				// Third square along
				ctx.fillRect(startingX, (startingY + size*0.75), size*0.125 - 1, size*0.125 - 1);
				ctx.fillRect(startingX, ((startingY + size*0.75) - (size*0.125)) + 1, size*0.125 - 1, size*0.125 - 1);
				break;
		}
	}

	//for (i = 0; i < 4; i++) {
	//	ctx.fillStyle = "rgba(0, 200, 200)";
	//	ctx.fillRect(startingX);
	//}
};