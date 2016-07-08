<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];
$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];
function isInList($searchFor,$array){
	$result=array_search($searchFor, $array);
	if(is_numeric($result)){
		return true;
	}else{
		return false;
	}
}
function commonItems($array1,$array2){
	$counter=0;
	foreach($array1 as $key=>$value){
		if(is_numeric(array_search($value,$array2))){
			$counter++;
		}
	}
	return $counter;
}
var_dump(isInList('Tina',$names));
var_dump(isInList('Amy',$names));
var_dump(isInLIst('ghey',$names));
var_dump(commonItems($names,$compare));
