<?php
require_once 'system/env/config.php';
class App
{
	protected $controller = ROUTER['default_controller'];
	protected $method = 'index';
	protected $params = array();
	// protected $routes = ROUTES;

	public function __construct()
	{
		$url = $this->parseURL();
		if (file_exists('aplication/controllers/'.ucfirst($url[0]).'.php'))
		{
			$this->controller = $url[0];
			unset($url[0]);
		} else if ( ! file_exists('aplication/controllers/'.ucfirst($url[0]).'.php') && $url[0] !== null ) {
			show_404();
		}

		require_once 'aplication/controllers/'.ucfirst($this->controller).'.php';
		$this->controller = new $this->controller;
		if (isset($url[1]))
		{
			if (method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				unset($url[1]);
			} else {
				show_404();
			}
		}

		if ( ! empty($url))
		{
			$this->params = array_values($url);
		}

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		if (isset($_GET['url']))
		{
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}