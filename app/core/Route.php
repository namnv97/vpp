<?php

/**
* 
*/
class Route
{
	private $controller;
	private $action;
	private $params;

	//Default: HomepageController@index
	public function __construct()
	{
		$this->controller = 'HomePageController';
		$this->action = 'index';
		$this->params = [];
	}

	public function getController(){
		return $this->controller;
	}

	public function setController($controller){
		$this->controller = $controller;
	}

	public function getAction(){
		return $this->action;
	}

	public function setAction($action){
		$this->action = $action;
	}

	public function getParams(){
		return $this->params;
	}

	public function setParams($params){
		$this->params = $params;
	}

	//Get Route by URL
	public static function getRouteByUrl($url){
		$route = new Route();
		if(isset($url)){
			$url = trim($url, '/');
			$url = explode('/', $url);
			if(isset($url[0]) &&  $url[0] == 'admin') {
				if(isset($url[1]) && $url[1] == 'options')
				{
					unset($url[0]);
					$controller = 'OptionsController';
					$action = isset($url[2]) ? $url[2] : 'index';
					$action = preg_replace('/-/','_',$action);
					unset($url[1]);
					unset($url[2]);
				}
				else
				{
					$controller = 'AdminController';
					$action = isset($url[1]) ? $url[1] : 'index';
					$action = preg_replace('/-/','_',$action);
					unset($url[0]);
					unset($url[1]);
				}
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) &&  $url[0] == 'user') {
				$controller = 'UserController';
				$action = isset($url[1]) ? $url[1] : 'index';
				$action = preg_replace('/-/','_',$action);
				unset($url[0]);
				unset($url[1]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) &&  $url[0] == 'category') {
				if(isset($url[1]))
				{
					$controller = 'CategoryController';
					$action = 'category';
					unset($url[0]);
					$params = array_values($url);
					$route->setController($controller);
					$route->setAction($action);
					$route->setParams($params);
				}
				else
				{
					$controller = 'CategoryController';
					$action = 'index';
					unset($url[0]);
					$params = array_values($url);
					$route->setController($controller);
					$route->setAction($action);
					$route->setParams($params);
				}

			}

			if(isset($url[0]) && $url[0] == 'post')
			{
				$controller = 'PostController';
				$action = 'index';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);
			}

			if(isset($url[0]) && $url[0] == 'product')
			{
				$controller = 'ProductController';
				$action = 'index';
				$action = preg_replace('/-/','_',$action);
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);
			}

			if(isset($url[0]) && $url[0] == 'tin-tuc')
			{
				$controller = 'CategoryPostController';
				$action = 'index';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);
			}
			if(isset($url[0]) && $url[0] == 'ajax')
			{
				$controller = 'Ajax';
				$action = isset($url[1]) ? $url[1] : 'index';
				unset($url[0]);
				unset($url[1]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) && $url[0] == 'cart')
			{
				$controller = 'HomePageController';
				$action = 'cart';
				unset($url[0]);
				unset($url[1]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) && $url[0] == 'list-don-hang')
			{
				$controller = 'HomePageController';
				$action = 'list_dh';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) && $url[0] == 'login')
			{
				$controller = 'LoginController';
				$action = 'login';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) && $url[0] == 'logout')
			{
				$controller = 'LoginController';
				$action = 'logout';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) && $url[0] == 'send_mail')
			{
				$controller = 'HomepageController';
				$action = 'send_mail';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) && $url[0] == 'don-hang')
			{
				$controller = 'CartController';
				$action = 'don_hang';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}


			if(isset($url[0]) && $url[0] == 'search')
			{
				$controller = 'HomepageController';
				$action = 'search';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

			if(isset($url[0]) && $url[0] == 'thankyou')
			{
				$controller = 'HomepageController';
				$action = 'thankyou';
				unset($url[0]);
				$params = array_values($url);
				$route->setController($controller);
				$route->setAction($action);
				$route->setParams($params);

			}

		}
		return $route;
	}

	//Dynamic call action in controller buy URL
	public function run()
	{
		$controllerPath = APP . 'controllers/' . $this->controller . '.php';

		if(file_exists($controllerPath)){
			require_once $controllerPath;
			$controller = new $this->controller;
			if(method_exists($controller, $this->action)){
				call_user_func_array([$controller, $this->action], $this->params);
			}else{
				header('Location: '.base_url);
			}
		}else{
			header('Location: '.base_url);
		}
	}
}