<?php

// get file configuration
require 'aplication/config/config.php';
require 'aplication/config/database.php';
require 'aplication/config/routes.php';

define('ROUTER', $route);
define('baseurl', $config['base_url']);
define('database', $database);

function show_404()
{
	if (file_exists('aplication/views/errors/404.php'))
	{
		require_once 'aplication/views/errors/404.php';
		die;
	}
}

function base_url($url = null)
{
	return baseurl.$url;
}

function redirect($url = null)
{
	header('location:'.baseurl.$url);
	exit;
}

function is_logged_in()
{
	if (empty(@$_SESSION['token']))
	{
		redirect('home/login');
	}
}