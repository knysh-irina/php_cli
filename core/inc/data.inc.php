<?php
//return info on all url
function fetch_all_info(){
    $urls = array();
    $lnk = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($lnk, 'parser');
    $result = mysqli_query( $lnk, 'select * FROM  `info` ');
    while ($row = mysqli_fetch_assoc($result)){
        $urls[] = $row;
    }

    return $urls;
}


function addImageToDB(array $array){
    $lnk = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($lnk, 'parser');
    foreach ($array as $item){
        $query = 'INSERT INTO `info` (`url`, `source`) VALUES ("'.$item[0].'", "'.$item[1].'")';
        echo $query;
        if($lnk){
            mysqli_query( $lnk, $query);
        } else {
            "Problem with DB";
        }



    }


}

