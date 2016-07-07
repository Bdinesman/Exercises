<?php
function add($a, $b)
{
	if(is_numeric($a)==false or is_numeric($b)==false){
		throwError('nonnumberic');
	}else{
		return $a + $b;
	}
}

function subtract($a, $b)
{
	if(is_numeric($a)==false or is_numeric($b)==false){
		throwError('nonnumberic');
	}else{
		return $a - $b;
	}
}

function multiply($a, $b)
{
	if(is_numeric($a)==false or is_numeric($b)==false){
		throwError('nonnumberic');
	}else{
		return $a * $b;
	}
}

function divide($a, $b)
{
	if($b===0){
		throwError('zero');
	}elseif(is_numeric($a)==false or is_numeric($b)==false){
		throwError('nonnumberic');
	}else{
		return $a / $b;
	}
}
function modulous($a,$b){
	if($b===0){
		throwError('zero');
	}elseif(is_numeric($a)==false or is_numeric($b)==false){
		throwError('nonnumberic');
	}else{
		return $a % $b;
	}
}
function throwError($type){
	if($type==strtoLower('zero')){
		echo 'ERROR: CANNOT DIVIDE BY 0' . PHP_EOL;
	}elseif($type==strtoLower('nonnumberic')){
		echo 'ERROR: NON-NUMERIC INPUTS' . PHP_EOL;
	}
}

// Add code to test your functions here
