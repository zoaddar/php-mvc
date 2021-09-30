# PHP Model View Controller(MVC) base framework

Purpose:
To manage a Web-application

Requirements:
- PHP version >= 5.6
- Enable a2enmod rewrite


### How to setup:
- Please replace **MVC_todo** with your project directory. If you run your project in root url then make it to blank (/). 

``` php
class Router {
	static public function parse($url, $request) {
		$url = trim($url);

		if ($url == "/MVC_todo/") {
			$request->controller = "tasks";
			$request->action = "index";
			$request->params = [];
		} else {
			$explode_url = explode('/', $url);
			$explode_url = array_slice($explode_url, 2);
			$request->controller = $explode_url[0];
			$request->action = $explode_url[1];
			$request->params = array_slice($explode_url, 2);
		}
	}
}
```
