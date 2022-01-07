<?php

$paragraph = Olioses($_POST["Paragraph"]); $words = Olioses($_POST["Words"]);
$bytes = Olioses($_POST["Bytes"]);$list = Olioses($_POST["List"]);
$caps = Olioses($_POST["Caps"]); $shuffle = Olioses($_POST["Shuffle"]);

$mainarray = Sention($paragraph,$words,$bytes,$list);

// $text = ($shuffle == 1) ? Shake($text) : $text;

$subarray = Dalnion($mainarray[$mainarray[4]-1],$mainarray[4]);

echo ($caps == 1) ? strtoupper($subarray[0]) : $subarray[0];

echo ($mainarray[4] == 2 || $mainarray[4] == 3) ? "<br><br>" : "";

echo ($subarray[1]);

echo "<br><br>";

echo ($subarray[2]);

exit();

function Olioses($a){ 
	(isset($a)) ? $b = 1 : exit("Sorry, Something Went Wrong. Error 00a UD");  
	(is_string($a) && $b == 1) ? $b = 2 : exit("Sorry, Something Went Wrong. Error 00b NS");
	(strlen($a) < 20 && $b == 2) ? $a = preg_replace("/\D/", "", $a) : exit("Sorry, Something Went Wrong. Error 00c LS");
	($a != "") ? $a = intval($a) : exit("Sorry, Something Went Wrong. Error 00d ZONNIS");
	return $a;	
}

function Sention($a,$b,$c,$d){
	$array = array($a,$b,$c,$d);
	(in_array(0,$array)) ? $array = array_count_values($array) : exit("Sorry, Something Went Wrong. Error 00f NIZF"); // no int zero found
	if ($array[0] == 3) {
		if ($a != 0) { return array($a,$b,$c,$d,1);}
		elseif ($b != 0) { return array($a,$b,$c,$d,2);}
		elseif ($c != 0) { return array($a,$b,$c,$d,3);}
		else { return array($a,$b,$c,$d,4);}
	}else{
		exit("Sorry, Something Went Wrong. Error 00e MOLZs"); //more or less zero than 3
	}
}

function Shake($a){              //
	$new = "";
	$array = explode("*", $a);
	shuffle($array);
	foreach ($array as $value) {
		$value = trim($value,"* ");
		$new = $new . "*" . $value . " ";
	}
	$new = trim($new,"* ");
	return $new;
}

function Find($a){
	(file_exists("word.php")) ? require 'word.php' : exit("file not found");
    $found = array();
    foreach ($array as $value) {
        $value = preg_replace("/[,.*]/","",$value);
        if (strlen($value) == $a){
        	$value = strtolower($value);
            array_push($found,$value);
        }
    }
    return $found[rand(0,sizeof($found)-1)];
}

function Dalnion($a,$b){
	$product = ""; $burst = true;
	switch ($b) {
		case 1:
			(file_exists("para.php")) ? require 'para.php' : exit("file not found");
			($a > 120) ? $a = 120 : $burst = false; //limiter
			for ($x = 0; $x < $a; $x++) {
				$product .= $array[$x] . "<br><br>";
			}
			$statement = "<b>Generated " . strval($a) . " Paragraph" . " of text, " . strlen($product) . " Bytes in size.</b>";
			$burst = ($burst) ? "<strong> Your demand is more than the limit </strong><br><br>" : "";
			break;
		case 2:
			(file_exists("word.php")) ? require 'word.php' : exit("file not found");
			($a > 12250) ? $a = 12250 : $burst = false; //limiter
			for ($x = 0; $x < $a; $x++) {
				if (($a - ($x + 1)) < 11) {
					$array[$x] = trim($array[$x], "*,.");
					if (($a - ($x + 1)) < 10) { $array[$x] = strtolower($array[$x]); }
					if (($a - ($x + 1)) == 0 && strlen($array[$x]) < 4) { $array[$x] = (strlen($array[$x])%2 == 0) ? "anlionsel" : "ensenol"; }
				}	
				$array[$x] = preg_replace("/[*]/", "", $array[$x]);
				$product = $product . $array[$x] . " ";
			}
			$product = trim($product, " ");
			$product = ucfirst($product) . ".";
			$statement = "<b>Generated " . strval($a) . " Words of text, " . strlen($product) . " Bytes in size.</b>";
			$burst = ($burst) ? "<strong> Your demand is more than the limit </strong><br><br>" : "";
			break;
		case 3:
			$pass = true; $close = 0;
			(file_exists("word.php")) ? require 'word.php' : exit("file not found");
			($a > 84872) ? $a = 84872 : $burst = false; // limiter
			for ($x = 0; true; $x++) {
    			if ($a - strlen($product) < 81) {
        			if ($a - strlen($product) < 18) {
	    				$close = $a - strlen($product);
            			if ($close < 10) {
            				$product .= Find($close-1,$array);
            				break;
            			}else{
            				$fw = rand(4,$close-6); $lw = ($close - $fw) - 2;
            				$fw = Find($fw); $lw = Find($lw);
            				$product .= $fw . " " . $lw;
            				break;
            			}
        			}
        			($pass) ? $pass = false : $array[$x] = lcfirst($array[$x]);
        			$array[$x] = trim($array[$x], "*,.");
    			}else{
    				$array[$x] = trim($array[$x], "*");
    			}
    			$product .= $array[$x] . " ";
			}
			$product = ucfirst($product) . ".";
			$statement = "<b>Generated " . strlen($product) . " Bytes of text.</b>";
			$burst = ($burst) ? "<strong> Your demand is more than the limit </strong><br><br>" : "";
			break;
		case 4:
			$z = 0;
			(file_exists("list.php")) ? require 'list.php' : exit("file not found");
			($a > 2450) ? $a = 2450 : $burst = false;  //limiter
			for ($x = 0; $x < $a; $x++){
				$array[$x] = ucfirst(strtolower($array[$x])); 
				$product .= $array[$x] . "." . "<br><br>";
			}
			$product = preg_replace("/[,.*]/", "", $product);
			$statement = "<b>Generated ".strval($a)." List of text. Each line content 5 words.</b>";
			$burst = ($burst) ? "<strong> Your demand is more than the limit </strong><br><br>" : "";
			break;
	}
	return array($product,$statement,$burst,$b);
}