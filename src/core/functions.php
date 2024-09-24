<?php

function redirect($path)
{
	header("Location: " . ROOT."/".$path);
	die;
}

function convertToCamelCase($url)
{
	$name = str_replace('-', ' ', $url);
	$name = str_replace(' ', '', ucwords($name));
	return $name;	
}

function clean($str)
{
	return htmlspecialchars(trim($str));
}
