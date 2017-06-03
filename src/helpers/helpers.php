<?php

/**
 * Mejor visualizacion de print_r y de var_dump
 * @param  * $mixed Mixed data to print
 */
function vdd($mixed){
	echo "<pre>";
		var_dump($mixed);
		print_r($mixed);
	echo '</pre>';
	exit;
}