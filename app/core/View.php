<?php

/**
* 
*/
class View
{
	private $template;
	private $data;

	public function __construct($template, $data = [])
	{
		$this->template = ROOT . 'resources/views/' . $template . '.php';
		$this->data = $data;	
	}

	public function setTemplate($template){
		$this->template = $template;
	}

	public function getTemplate(){
		return $this->template;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getData(){
		return $this->data;
	}

	public function render(){
		foreach ($this->data as $key => $value) {
			$$key = $value;
		}
		require $this->template;
	}
}