<?php
class Loader {
	function __construct() {
	}
	
	public function model($model) {
		$model = ROOT . 'app/models/'. ucfirst($model) .'.php';
		if(!file_exists($model)) error("<b>Failed to open stream:</b> No such file ". $model);

		require($model);
	}
	
	public function library($library) {
		$library = ROOT . 'app/library/'. ucfirst($library) .'.php';
		if(!file_exists($library)) error("<b>Failed to open stream:</b> No such file ". $library);

		require($library);
	}
}