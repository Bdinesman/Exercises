<?php
fwrite(STDOUT,'WHAT STARTING NUMBER?' . PHP_EOL);
$numberStart = intval(fgets(STDIN),10);
while(is_numeric($numberStart)==false or $numberStart==0){
	fwrite(STDOUT, 'ERROR: PLEASE ENTER IN A NUMBER:' . PHP_EOL);
	$numberStart = intval(fgets(STDIN),10);
}
fwrite(STDOUT, 'WHAT ENDING NUMBER?' . PHP_EOL);
$numberEnd = intval(fgets(STDIN),10);
while(is_numeric($numberEnd)==false or $numberEnd==0){
	fwrite(STDOUT, 'ERROR: PLEASE ENTER IN A NUMBER:' . PHP_EOL);
	$numberEnd = intval(fgets(STDIN),10);
}
while($numberEnd<=$numberStart){
	fwrite(STDOUT,  "ERROR: PLEAESE ENTER A NUMBER GREATER THAN $numberStart" . PHP_EOL);
	$numberEnd = intval(fgets(STDIN),10);
}
fwrite(STDOUT, 'WHAT INCEMENT?' . PHP_EOL);
$increment = intval(fgets(STDIN),10);
if($increment<1){
	$increment=1;
}
for($i=0;($numberStart+$i)<=$numberEnd;$i+=$increment){
	echo ($numberStart+$i) . PHP_EOL;
}