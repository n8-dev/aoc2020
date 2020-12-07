<?
require_once('map.php');
echo 'max width = ' . count($map[0]);
echo '
';

echo 'max distance = ' . count($map);
echo '
';
$treesInRoute = [];

$maxWidth = count($map[0]);

$options = [
	[
		'vectorRight' => 1,
		'vectorDown' => 1,
	],
	[
		'vectorRight' => 3,
		'vectorDown' => 1,
	],
	[
		'vectorRight' => 5,
		'vectorDown' => 1,
	],
	[
		'vectorRight' => 7,
		'vectorDown' => 1,
	],
	[
		'vectorRight' => 1,
		'vectorDown' => 2,
	],
];

foreach ($options as $route) {
	$vectorRight = $route['vectorRight'];
	$vectorDown = $route['vectorDown'];

	$x = 0;
	$y = 0;

	$trees = 0;

	while($y <= count($map) - 1) {

		// Move right
		$x += $vectorRight;
		// If right is too far loop around.
		if ($x >= $maxWidth) {
			$x -= $maxWidth;
			// $x --;
			// if ($x == -1) {
			// 	$x = 0;
			// }
		}

		// Move down
		$y += $vectorDown;

		// echo 'x = ' . $x .'. ';
		// echo 'y = ' . $y . ' ';
		if ($y >= 323) {
			break;
		}
		// x,y
		$location = $map[$y][$x];

		// echo $location . '
// ';

		if ($location == '#') {
			$trees ++;
		}
	}
	echo $trees . ' trees
';
	$treesInRoute[] = $trees;

}
print_r($treesInRoute);

echo $treesInRoute[0] * $treesInRoute[1] * $treesInRoute[2] * $treesInRoute[3] * $treesInRoute[4];