<?php
namespace app\models;

class Food{
	public $name;
	private static $file = 'app/resources/foods.txt';

	public function getAll(){
		//return all the food records
		$foods = file(self::$file); //self refer to its class name
		$output = [];
		foreach ($foods as $key => $value) {
			$newFood = new Food();
			//kinda like a primary key
			$newFood->id = $key;

			$newFood->name = $value; //huh? $newFood->name not $newFood->$name ? reply: NAH 
			$output[] = $newFood;
		}
		return $output;
	}

	public function insert(){
		//insert a new food record

		//seperate the case when I send data from the one I don't
		//run different code when I send stuff

		$fh = fopen('app/resources/foods.txt', 'a'); //to open & append
			flock($fh, LOCK_EX);
			fwrite($fh, $this->name . " \n"); // to write
			flock($fh,LOCK_UN);
			fclose($fh); // to close it (saves ressources)

	}

	public function deleteAt($index){
		//TODO: validate the index
		$foods = file(self::$file);
		// if you hate math
		if(!isset($foods[$index])){
			return;
		}
		//delete element $line_num
		unset($foods[$index]);
		$foods = array_values($foods);
		$fh = fopen(self::$file,'w'); //to open & append
		flock($fh, LOCK_EX);
		// write everything back
		foreach ($foods as $key => $value) {
			fwrite($fh, $value); // to write

}
			flock($fh,LOCK_UN);
			fclose($fh); // to close it (saves ressources)
		}
	}

	public function __toString(){
		return $this->name;
	}

}

?>