<?php

if ($argv[1] == 'parse'){
   parser(strval($argv[2]));
}

include("core/init.inc.php");

$url='http://skripnik.com.ua/';


function parser($url){
    addImageToDB(getImgUrls($url));
    $links = getAllLinks($url);
    foreach ($links as $link){
        parser($link);
    }
}
//parser($url);
function writeParseToFile(){
    $rows = fetch_all_info();
    if(!empty($rows)){
        array_unshift($rows, array_keys($rows[0]));
        write_csv('test.csv', $rows);
    }
}



