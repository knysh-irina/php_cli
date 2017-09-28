<?php

//reads a csv file, returning an array of rows
function read_csv($filename){
    $rows = array();
    foreach (file($filename, FILE_IGNORE_NEW_LINES)  as $line){
        $rows[] = str_getcsv($line);
    }
    return $rows;

}

//writes the given array of rows to a CSV file
function write_csv($filename, $rows){
    $file = fopen($filename, 'w');
    foreach ($rows as $row) {
        fputcsv($file, $row );
    }
    fclose($file);
}