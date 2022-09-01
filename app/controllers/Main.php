<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
		$this->view('Main/index');
	}

	public function index2(){
		$this->view('Main/index2');
	}

	public function say($message="Default message"){
		$this->view('Main/say',$meesage);
	}

	public function foods(){
		//TODO: refactor to place data access in a model class!
		//BELOW US IS NOT PROPER MVC

		if(isset($_POST['action'])){
			$food = new \app\models\Food();
			$food->name = $_POST['new_food'];
			$food->insert();
/*
		//seperate the case when I send data from the one I don't
		//run different code when I send stuff
		//the form is submitted
		if(isset($_POST['action'])){
		$fh = fopen('app/resources/foods.txt', 'a'); //to open & append
			flock($fh, LOCK_EX);
			fwrite($fh, $_POST['new_food'] . " \n"); // to write
			flock($fh,LOCK_UN);
			fclose($fh); // to close it (saves ressources)*/


		}

		//get all the food
		$food = new \app\model\Food();
		$foods = $food->getAll();

		//read a file
		//get current working directory
		
		//echo getcwd();
		
/*		$foods = file('app/resources/foods.txt');*/
		
		//var_dump($foods);
		
		//call a view that displays the file contents
		$this->view('Main/foods',$foods);
	}



}