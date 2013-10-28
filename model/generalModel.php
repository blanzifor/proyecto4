<?php



/**
 * Read config file to array
 * @param string $filename
 * @return array config
 */
function readConfig($filename)
{
	$config=parse_ini_file($filename);
	return $config;
}