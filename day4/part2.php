<?
$fileContent = file(__DIR__ . "/data.txt");

$array = [];
$string = '';

foreach ($fileContent as $line) {
	if (strpos($line, ':') > 0) {
		$string .= $line;
	} else {
		// clean up spacing
		$string = preg_replace('/\R/', ' ', $string);
		$array[] = $string;
		$string = '';
	}
}


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
	$stillValid = false;

// 	echo $possiblePassport . '
// ';

	foreach ($requiredFields as $requiredField) {

		// 		echo $requiredField . '
		// ' . strpos($possiblePassport, $requiredField) . '
		// ';
		// if the current required field is present
		if (strpos($possiblePassport, $requiredField) !== false) {
			// $valid = true;
			// echo ' string present
			// ';'
		} else {
			$valid = false;
			// echo ' string not present
			// ';
		}
	}


	if ($valid) {
		$stillValid = validatePassport($possiblePassport);

		if ($stillValid) {
			// echo 'valid
// ';
			$numberOfValidPassports++;
		}else {
			// echo 'not valid
// ';
		}
	}

	// $i++;
	// if ($i == 8) {
	// 	break;
	// }

}
echo $numberOfValidPassports;

function validatePassport($possiblePassport) {
	$valid = true;
	$tmpArray = array_filter(explode(' ', $possiblePassport));

	foreach ($tmpArray as $value) {
		
		$tmpArrayTwo = explode(':', $value);
		// print_r($tmpArrayTwo);

		$value = $tmpArrayTwo[1];

		switch ($tmpArrayTwo[0]) {
			case 'byr':
				if ((strlen($value) != 4) || ($value < 1920) || ($value > 2002)) {
					$valid = false;
				}
				break;

			case 'iyr':
				if ((strlen($value) != 4) || ($value < 2010) || ($value > 2020)) {
					$valid = false;
				}
				break;

			case 'eyr':
				if ((strlen($value) != 4) || ($value < 2020) || ($value > 2030)) {
					$valid = false;
				}
				break;

			case 'hgt':

				$heightValue = substr($value, 0 , -2);
				$unitValue = substr($value, -2);

				if ($unitValue == 'cm') {
					if ($heightValue < 150 || $heightValue > 193) {
						$valid = false;
					}
				}
				elseif ($unitValue == 'in') {
					if ($heightValue < 59 || $heightValue > 76) {
						$valid = false;
					}
				}else {
					// not correct unit
					$valid = false;
				}

				# code...
				break;

			case 'hcl':
				if (preg_match('/#[0-9A-Fa-f]{6}/', $value) == FALSE) {
					$valid = false;
				}else {
					// echo $heightValue = $value . '
// ';
				}
				break;

			case 'ecl':
				// exactly one of amb blu brn gry grn hzl oth.
				if (
					$value == 'amb' ||
					$value == 'blu' ||
					$value == 'brn' ||
					$value == 'gry' ||
					$value == 'grn' ||
					$value == 'hzl' ||
					$value == 'oth'
				) {
					// $valid = true;
				}else {
					$valid = false;
				}
				
				break;

			case 'pid':
				if (preg_match('/[0-9]{9}/', $value)) {
					// it matches
				}else {
					$valid = false;
				}
				break;
		}
	}

	return $valid;
}
