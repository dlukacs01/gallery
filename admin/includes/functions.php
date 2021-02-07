<?php

// this function is looking for undeclared objects ("backup fn")
function classAutoLoader($class) {

	$class = strtolower($class); // for the filename, for the correct file

	$the_path = "includes/{$class}.php"; // admin index-ből jövünk...

	if(is_file($the_path) && !class_exists($class)) {
		include $the_path;
	}

}

// new version of autoload (lets you specify multiple autoload fns)
spl_autoload_register('classAutoLoader');

function redirect($location){

	header("Location: {$location}");

}

?>