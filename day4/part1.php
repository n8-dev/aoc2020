<?

require_once('data.php');


echo count($passports) . '
';



$requiredFields = [
	'byr', // (Birth Year)
	'iyr', // (Issue Year)
	'eyr', // (Expiration Year)
	'hgt', // (Height)
	'hcl', // (Hair Color)
	'ecl', // (Eye Color)
	'pid', // (Passport ID)
	//'cid', // (Country ID)
];
$count = 0;
$valid = 0;
foreach ($passports as $passport){
	echo $passport .'
';
	$currentValid = 0;

	foreach ($requiredFields as $key) {	
		if (strpos($passport , $key) != FALSE) {
			$currentValid ++;
		}
	}
echo 'valid count: '.  $currentValid . '

';
	if ($currentValid == 7) {
		$valid ++;
	}
	$count++;

	if ($count == 10) {
		break;
	}
}
echo $valid;