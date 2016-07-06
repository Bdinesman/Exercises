<?php
$student=[];
$total=0;
$awesome=90;
$break = 'break';
function prompt($message){
    fwrite(STDIN, $message . PHP_EOL);
    $response = fgets(STDIN);
    return $response;
}
$name = prompt('What is your name?');
$student['name']=$name;
$subjectName = prompt('What\'s the name of your subject');
$student['subject']=$subjectName;
$grade = prompt('What\'s your grade?');
$student['grades']=[(int)$grade];
$confirm=trim(prompt('Do you want to enter another grade? Y/N'));
while(strcmp($confirm,"Y")==0 or strcmp($confirm, "y")==0){
    $grade = prompt('What\'s your grade?');
    $length=sizeof($student['grades']);
    $student['grades'][$length]=(int)$grade;
    $continue=trim(prompt('Do you want to enter another grade Y/N'));
    if(strcmp($continue,"N")==0 or strcmp($continue,"n")==0){
        break;
    }
}
foreach ($student['grades'] as $key => $value) {
    $total+=$value;
    echo $total , PHP_EOL;
}
$average=$total/(sizeof($student['grades']));
if($average>=$awesome){
    echo "You're awesome!! Your average was $average" . PHP_EOL;
}elseif($avearge<$awesome){
    echo "You need more practice. Your average was $average" . PHP_EOL;
}
