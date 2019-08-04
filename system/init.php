<?php
require 'env/config.php';
spl_autoload_register(function ($class) {
	require 'core/'.$class.'.php';
});