<?php
/*
Template Name: Validation Page Template
*/
	
  try{
echo 'validation page ......... ';
//error_reporting(0);
$tokenCache1 = get_option(TOKEN_CACHE);

echo "\nToken Cache: ".var_export($tokenCache1, true);
$token = stripslashes(htmlentities($_POST['SafewayToken']));
$track = 0;
foreach($tokenCache1 as $k=>$v){
        if($token === $v){
                unset($tokenCache1[$k]);
                $track++;
                break;
        }
}
update_option(TOKEN_CACHE, $tokenCache1);
if($track > 0){
        echo true;
}
}
catch(Exception $ee){
var_dump($ee);
}
