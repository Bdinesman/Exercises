<?php
function add($a, $b)
{
    return $a + $b;
}

function subtract($a, $b)
{
    return $a - $b;
}

function multiply($a, $b)
{
    return $a * $b;
}

function divide($a, $b)
{
	if($b==0){
		return 'ERROR: CANNOT DIVIDE BY 0';
	}else{
		return $a/$b;
	}
}
function modulous($a,$b){
	if($b==0){
		return 'ERROR CANNOT DIVIDE BY 0';
	}else{
		return $a % $b;
	}
}
echo '$a+$b=' . add($a,$b) . PHP_EOL;
echo '$a-$b=' . subtract($a,$b) . PHP_EOL;
echo '$a*$b=' . multiply($a,$b) . PHP_EOL;
echo '$a/$b=' . divide($a,$b) . PHP_EOL;
echo '$a%$b=' . modulous($a,$b) . PHP_EOL;
// Add code to test your functions here
