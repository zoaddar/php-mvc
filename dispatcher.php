<?php

class Dispatcher {
	private $request;

	public function dispatch() {
		$this->request = new Request();
		Router::parse($this->request->url, $this->request);

		$controller = $this->loadController();
		call_user_func_array([$controller, $this->request->action], $this->request->params);
	}

	public function loadController() {
		$name = $this->request->controller . "Controller";
		$file = ROOT . 'app/controllers/' . $name . '.php';
		if(!file_exists($file)) {
			error("<b>Failed to open stream:</b> No such file ". $file);
		}
		require($file);

		$controller = new $name();
		$controller->ctrlpath = $file;
		$controller->cname = $name;
		$controller->fname = $this->request->action;
		if(!method_exists($controller, $this->request->action)) {
			error("<b>Failed to call {$this->request->action}:</b> No such function in ". $file);
		}
		return $controller;
	}

}