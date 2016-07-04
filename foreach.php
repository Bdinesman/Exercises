<?php
$things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);
var_dump($things[6]);
foreach($things as $value){
	if(is_int($value)){
		echo "$value is an integer" . PHP_EOL;
	}elseif(is_float($value)){
		echo "$value is a float" . PHP_EOL;
	}elseif(is_bool($value)){
		if($value===true){
			echo 'True is a boolean' . PHP_EOL;
		}else{
			echo 'False is a boolean' . PHP_EOL;
		}
	}elseif(is_array($value)){
		echo "$value is an array" . PHP_EOL;
	}elseif(is_null($value)){
		echo 'Null is null' . PHP_EOL;
	}elseif(is_string($value)){
		echo "$value is a string" . PHP_EOL;
	}
}
foreach($things as $value){
	if(is_scalar($value)){
		echo $value . PHP_EOL;
	}
}
foreach($things as $value){
	if(is_array($value)){
		$array = $value;
		echo 'Array' . PHP_EOL;
		foreach($array as $item){
			echo $item . PHP_EOL;
		}
	}else{
		echo $value . PHP_EOL;
	}
}

