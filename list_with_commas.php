 <?php

 // Converts array into list n1, n2, ..., and n3
 function humanizedList($array, $alphabetize=false) {
 	if($alphabetize==true){
 		$sorted=$array;
 		sort($sorted);
 		print_r($sorted);
 		$array=$sorted;
 	}
 	$array[sizeof($array)-1] = 'and ' . $array[sizeof($array)-1];
   	$string = implode(', ', $array);
   	return $string;
 }

 // List of famous peeps
 $physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';

 // TODO: Convert the string into an array
 $physicistsArray = explode(', ', $physicistsString);

 // Humanize that list
 $famousFakePhysicists = humanizedList($physicistsArray, true);

 // Output sentence
 echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}.";

 