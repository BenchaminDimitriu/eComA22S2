<?php
namespace app\core;

/* Rounting all request to the appropriate controller method
e.g
localhost/person/add -> run the add method in the personController class
localhost/person/delete -> run the delete method in the personController class
*/







class App{

	private $controller = 'Main';
	private $method = 'index';  //default name of index

	public function __construct(){
		echo $_GET['url'];
		//place the routing algorithm here

		/*Objectif: seperate the url in parts 
		use the first part to determine the class to load
		use the second part to determine the method to run
		while passing all other parts as arguments
		*/

		$url = self::parseUrl(); //get the url parsed and returned as an array of URL parts

		//use the first part to determine the controller class to load

		if(isset($url[0])){
		if(file_exists('app/controllers/' . $url[0] . '.php')){
			$this->controller = $url[0]; //$this refers to the current object
		}
		unset($url[0]);
}
		$this->controller = 'app\\controllers\\' . $this->controller; //provide a fully qualified classname
		$this->controller = new $this->controller;

		//use the second part to determine the method to run
		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
			}
			unset($url[2]);
		}

//ALL THE WORK IS DONE HERE TO CALL THE METHOD AND PARAMETER
		// ... while passing all other parts as argument
		// repackage the parameters

		$params = $url ? array_values($url) : []; 

		call_user_func_array([$this->controller, $this->method ], $params);

		//var_dump($url); // nice tool to verify w/e data using in application


	}

	public static function parseUrl(){
		if (isset($_GET['url'])) //get url exists
		{ 							
			return explode('/', //return parts in an array, separated by /
				filter_var(	//remove non-URL characters and sequences
					rtrim($_GET['url'],'/'))
					,FILTER_SANITIZE_URL);  
				

		}
	}
}