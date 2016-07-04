<?php
for($i=0;$i<=100;$i++){
	if(($i%3)==0){
		echo 'Fizz' . PHP_EOL;
		if(($i%5)==0){
			echo 'Fizzbuzz' . PHP_EOL;
		}
	}elseif(($i%5)==0){
		echo 'Buzz' . PHP_EOL;
		if(($i%3)==0){
			echo 'Fizzbuzz' . PHP_EOL;
		}
	}else{
		echo $i . PHP_EOL;
	}
}