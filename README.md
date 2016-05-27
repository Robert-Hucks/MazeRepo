# mazeCreation
OO-PHP code for generating Maze's and outputting the result as a JSON string to be used in other programs.

## Usage
There are a number of settings that can be used, although only a few of them are completely finished. To get a maze to be generated, use the mazeCreation.php file to generate a completely randomized maze for use in whatever application you like.

### Settings (Finished)
$numOfTiles - This setting sets the amount of completed mazes to be made. It was meant to facilitate larger mazes being made without the overhead of having to perform huge recursive functions but it was never fully implemented to join the resulting 'tiles' together.

$tileSize - This is your scale for the size of the generated maze. All mazes are made square so the resulting maze will contain $tileSize^2 cells.

$avoidCellArray - This can get fairly confusing, so there are some premade array's in the code for you to see how it works. Basically, this is used to set cells that need to be left out of the path finding algorithm and can be used to cut off whole sections of the maze or to make more interesting maze designs. You need to pass it a 3D array designed like this;

	-> Maze array
	
	-> Tile array
	
	-> Cell array
        
        
As an example, lets assume you wanted to cut off the top left corner of a single tile. It would look like this: 

```PHP
$avoidCellArray = [ [ [0 , 0] ] ];
```

Another example could be creating a line down the middle of the second tile:

```PHP
$avoidCellArray = [ [ [ ] ], [ [1 , 0] , [1 , 1] , [1 , 2] ] ];
```

## Options

### Draw the Maze
For testing purposes, you can use a function of the 'Maze' object to output the maze visually using some small images to represent the various possible cell's. To do this, just use this example below:

```PHP
$maze = new Maze ($numOfTiles, $tileSize, $avoidCellArray, $methodToCreate);

$maze->drawMaze();
```

### Get JSON
To get the JSON string, just use the method below:

```PHP
$maze = new Maze ($numOfTiles, $tileSize, $avoidCellArray, $methodToCreate);

$maze->returnJSON();
```
