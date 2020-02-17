<?php

function findStrings($prefix, $array) {
	$result = [];
	foreach ($array as $value) {
		if (strpos($value, $prefix) === 0)	 {
			array_push($result, $value);
		}
	}
	return $result;
}