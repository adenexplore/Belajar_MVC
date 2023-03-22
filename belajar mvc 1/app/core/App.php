<?php 

class App {
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		$url = $this->parseURL();
		// var_dump($url);

		if ( file_exists('../app/controllers/' . $url[0] . '.php') ) {
			$this->controller = $url[0];
			unset($url[0]);
		}

	}	

	public function parseURL()
	{
		if( isset($_GET['url']) ){
			$url = rtrim( $_GET['url'],'/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url );
			return $url;

		}
	}
}


