<?php
(file_exists("word.php")) ? require 'word.php' : exit("file not found");
foreach ($array as $key => $value) {
	$array[$key] = "$key";
}

echo $array[0];
echo $array[3];
echo $array[6];
echo $array[9];
?>