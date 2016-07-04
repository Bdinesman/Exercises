<?php
$books = array(
    'The Hobbit' => array(
        'published' => 1937,
        'author' => 'J. R. R. Tolkien',
        'pages' => 310
    ),
    'Game of Thrones' => array(
        'published' => 1996,
        'author' => 'George R. R. Martin',
        'pages' => 835
    ),
    'The Catcher in the Rye' => array(
        'published' => 1951,
        'author' => 'J. D. Salinger',
        'pages' => 220
    ),
    'A Tale of Two Cities' => array(
        'published' => 1859,
        'author' => 'Charles Dickens',
        'pages' => 544
    )
);
foreach($books as $key=>$value){
    $bookArray = $value;
    echo "Title: $key\n";
    foreach($bookArray as $bookKey => $bookValue){
        echo "$bookKey: $bookValue\n"; 
    }
    echo '****************************' . PHP_EOL;
}
echo 'Books Published After 1950' . PHP_EOL;
echo '****************************' . PHP_EOL;
foreach ($books as $key => $value) {
    if($value['published']>1950){
            $bookArray = $value;
            echo "Title: $key\n";
            foreach($bookArray as $bookKey => $bookValue){
                echo "$bookKey: $bookValue\n"; 
            }
            echo '****************************' . PHP_EOL;
    } 
}