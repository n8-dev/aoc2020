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

print_r($array);


$requiredFields = [
	'byr', // (Birth Year)
	'iyr', // (Issue Year)
	'eyr', // (Expiration Year)
	'hgt', // (Height)
	'hcl', // (Hair Color)
	'ecl', // (Eye Color)
	'pid', // (Passport ID)
	//'cid', // (Country ID) // optional
];
$count = 0;
$valid = 0;
