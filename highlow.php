<?php
$correct=rand(0,100);
fwrite(STDOUT, 'Guess?' . PHP_EOL);
$guess=fgets(STDIN);
$exit = 'exit(0)';
while($guess!=$correct){
	if($guess==$exit){
		break;
	}elseif($guess>$correct){
		echo 'LOWER' . PHP_EOL;
	}elseif($guess<$correct){
		echo 'HIGHER' .PHP_EOL;
	}
	fwrite(STDOUT, 'Guess?' . PHP_EOL);
	$guess=fgets(STDIN);
}
echo 'GOOD GUESS!' . PHP_EOL; 
echo 'Total number of arguments: ' . $argc . PHP_EOL; 