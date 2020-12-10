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


// print_r($newArray);


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
			$numberOfValidPassports++;
		}
	}

	$i++;
	if ($i == 1) {
		break;
	}

}



// echo '

// ';
// print_r(count($array));
// echo '

// ';
// print_r($numberOfValidPassports);



function validatePassport($possiblePassport) {
	$valid = true;
	$tmpArray = array_filter(explode(' ', $possiblePassport));
	// print_r($tmpArray);

	foreach ($tmpArray as $value) {
		
		$tmpArrayTwo = explode(':', $value);
		// print_r($tmpArrayTwo);

		$value = $tmpArrayTwo[1];

		switch ($tmpArrayTwo[0]) {
			case 'byr':
				if ((strlen($value) != 4) || ($value < 1920) || ($value > 2020)) {
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

				echo $heightValue = substr($value, 0 , -2) . '
';
				echo $unitValue = substr($value, -2) . '
';
				if ($unitValue == 'cm') {
					if ($heightValue < 150 || $heightValue > 193) {
						$value = false;
					}
				}
				elseif ($unitValue == 'in') {
					if ($heightValue < 59 || $heightValue > 76) {
						$value = false;
					}
				}

				# code...
				break;

			case 'hcl':
				# code...
				break;

			case 'ecl':
				# code...
				break;

			case 'pid':
				# code...
				break;
		}


		echo '
';
	}

	return $valid;
}
