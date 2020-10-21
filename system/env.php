<?php

if(file_exists($fname = ROOT .".env")) {
	$file = fopen($fname, "r");

	while(!feof($file)) {
		$line = trim(fgets($file));
		$var = explode('=', $line);
		if(count($var) != 2) continue;

		putenv(trim($var[0])."=".trim($var[1]));
	}
	fclose($file);
} else {
	error("<b class=red>.env</b> file not found!", 404);
}