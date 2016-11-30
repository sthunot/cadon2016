
<?php
function debug($variable){
  echo '<pre>'.print_r($variable, true).'</pre>';
}


function secure($str){
    $str = trim($str);
    $str = strip_tags($str);
    return $str;
}

function str_random($length){
    $alphabet ="0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)),0, $length);
}

function logout(){
  session_start();
  $_SESSION=array();
  session_destroy();
}
