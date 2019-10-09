<?php

class App
{
	public function __construct(){
		$url = $this->getURL();
		$route = Route::getRouteByUrl($url);
		$route->run();
	}

	//Get url which user enter
	public function getURL(){
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		return $url;
	}
}