<?php

spl_autoload_register('autoloader');

function autoloader($class)
{
	$classPath = str_replace('\\', '/', $class);

	$arrClassPath = explode("/", $classPath);

	for ($i = 0; $i < count($arrClassPath) - 1; $i++) {
		$arrClassPath[$i] = strtolower($arrClassPath[$i]);
	}

	$classPath = implode("/", $arrClassPath);

	$file =  __DIR__ . "/" . $classPath . '.php';

	if (file_exists($file)) {
		require $file;
	}
}
