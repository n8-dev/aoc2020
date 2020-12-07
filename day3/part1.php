<?
require_once('map.php');

echo 'max width = ' . count($map[0]);
echo '
';

echo 'max distance = ' . count($map);
echo '
';
$trees = 0;

$maxWidth = count($map[0]);

$vectorRight = 3;
$vectorDown = 1;

$x = 0;
$y = 0;

while($y <= count($map) - 1) {

	// Move right
	$x += $vectorRight;
	// If right is too far loop around.
	if ($x >= $maxWidth) {
		$x -= $maxWidth;
	}

	// Move down
	$y ++;

// 	echo 'x = ' . $x .'. ';
// 	echo 'y = ' . $y . '
// ';
	if ($y == 323) {
		break;
	}
	// x,y
	$location = $map[$y][$x];

//	echo $location . '
//';

	if ($location == '#') {
		$trees ++;
	}
}

echo $trees . ' trees';