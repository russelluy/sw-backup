<?php 
if (!function_exists('scandir')) {
	function scandir($directory, $sorting_order=0) {
		if(!is_dir($directory)) {
			return false; 
		}
		$files = array();
		$handle = opendir($directory);
		while (false !== ($filename = readdir($handle))) {
			$files[] = $filename; 
		}
		closedir($handle);
 
		if($sorting_order == 1) {
			rsort($files); 
		} else {
			sort($files); 
		}
		return $files;
		}
}

function folder_content($folder='.') {
	$content = "";
 	global $include_result;
	foreach(scandir($folder) as $file) {
		if($file[0] != '.') { 
			if(is_dir($folder.'/'.$file)) {
				$folderArray[] = $file;
			} else {
				$fileArray[] = $file;
			}
		}
	}
	
	if(isset($folderArray)) {
		foreach($folderArray as $row) {
			$include_result[] = folder_content($folder.'/'.$row); 
		}
	}


	if(isset($fileArray)) {
		foreach($fileArray as $row) {
			if(preg_match("/.php$/",$row) &&! preg_match("/no_auto_include.php$/",$row) ){
			$include_result[] = $folder.'/'.$row; 
			}
		}
	}
	
	return $content;
}

function contains_content($var){
	return $var != "";
}

$include_result[] = folder_content(dirname(__FILE__));
$includes = array_filter($include_result, "contains_content");
arsort($includes);

foreach ($includes as $include)
{
include_once($include);
}


?>