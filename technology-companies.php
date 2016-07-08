<?php

$companies = [
    'Sun Microsystems' => [
        'Vinod Khosla',
        'Bill Joy',
        'Andy Bechtolsheim',
        'Scott McNealy'
    ],
    'Silicon Graphics' => [
        'Jim Clark',
        'Ed McCracken'
    ],
    'Cray' => [
        'William Norris',
        'Seymour Cray'
    ],
    'NeXT' => [
        'Steve Jobs',
        'Avie Tevanian',
        'Joanna Hoffman',
        'Bud Tribble',
        'Susan Kare'
    ],
    'Acorn Computers' => [
        'Steve Furber',
        'Sophie Wilson',
        'Hermann Hauser',
        'Jim Mitchell'
    ],
    'MIPS Technologies' => [
        'Skip Stritter',
        'John L. Hennessy'
    ],
    'Commodore' => [
        'Yash Terakura',
        'Bob Russell',
        'Bob Yannes',
        'David A. Ziembicki',
        'Jay Miner'
    ],
    'Be Inc' => [
        'Steve Sakoman',
        'Jean-Louis Gassée'
    ]
];
print_r($companies);
echo '******************************' . PHP_EOL;
krsort($companies);
print_r($companies);
echo '******************************' . PHP_EOL;
foreach($companies as $key => $value) {
    asort($value);
    $array = $value;
    $companies[$key]=$array;
}
echo '******************************' . PHP_EOL;
print_r($companies);
echo '******************************' . PHP_EOL;
foreach($companies as $key=>$value){
    $companies[$key][]= $value['size']=sizeof($value);
}
asort($companies, SORT_NUMERIC);
    print_r($companies);
foreach($companies as $key=>$value){
    asort($key);
    //print_r($companies);
}
//print_r($companies);

