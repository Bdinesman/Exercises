<?php
for($i=0;$i<=100;$i++){
	if(($i%2)==0){
		continue;
	}
	echo $i . PHP_EOL;
}
for($i=0;$i<=100;$i++){
	if($i==11){
		break;
	}
	echo $i . PHP_EOL;
}