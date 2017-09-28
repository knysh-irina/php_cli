<?php

//return array of images urls on page
function getImgUrls($url){
    $html = file_get_contents($url);
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $tags = $doc->getElementsByTagName('img');
    $src = [];
    foreach ($tags as $tag) {
        $string = $tag->getAttribute('src');
        if (strpos($string, '?')){
            $str =  substr($string , 0,strpos($string, '?'));
        } else {
            $str = $string;
        }


        $src[]= [$str, $url];

    }

   return $src;
}

//return array of Links on page
function getAllLinks($url){
    $html = file_get_contents($url);
    $doc = new DOMDocument();
    @$doc->loadHTML($html);
    $tags = $doc->getElementsByTagName('a');
    $href = [];
    $url = substr($url, 5);
    foreach ($tags as $tag) {
        $link = $tag->getAttribute('href');
        if(strpos($link, $url)){
          $href[] = $link;
        }

    }
    return $href;

}


