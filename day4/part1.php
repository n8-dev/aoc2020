<?



$fileContent = file(__DIR__ . "/data.txt");

$array = [];
$string = '';



foreach ($fileContent as $line) {
	if (strpos($line, ':') > 0) {
		$string .= $line;
	}
	else {
		// clean up spacing
		$string = preg_replace('/\R/', ' ', $string);
		$array[] = $string;
		$string = '';
	}
}


// print_r($array);


$requiredFields = [
	'byr', // (Birth Year)
	'iyr', // (Issue Year)
	'eyr', // (Expiration Year)
	'hgt', // (Height)s
	'hcl', // (Hair Color)
	'ecl', // (Eye Color)
	'pid', // (Passport ID)
	//'cid', // (Country ID) // optional
];

$i = 0;

$numberOfValidPassports = 0;

foreach ($array as $possiblePassport) {
	$valid = true;

	echo $possiblePassport . '
';

	foreach ($requiredFields as $requiredField) {

// 		echo $requiredField . '
// ' . strpos($possiblePassport, $requiredField) . '
// ';
		// if the current required field is present
		if (strpos($possiblePassport, $requiredField) !== false) {
			// $valid = true;
			// echo ' string present
// ';
		}
		else {
			$valid = false;
			// echo ' string not present
// ';
		}
	}


	if ($valid) {
		$numberOfValidPassports++;
	}

	$i++;
	// if ($i == 1) {
	// 	break;
	// }

}


echo '

';
print_r(count($array));
echo '

';
print_r($numberOfValidPassports);