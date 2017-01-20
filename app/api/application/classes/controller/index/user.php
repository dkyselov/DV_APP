<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Base Class Client API
 */
class Controller_Index_User extends Controller_Index {
   public function action_index(){ 
	$json = file_get_contents('php://input');
	$data = json_decode($json,true);
	$post=Validation::factory($data);
		$post->rule('login','not_empty')
		->rule('password','not_empty')
		->rule('login', 'max_length', array(':value', 10))
		->rule('password', 'max_length', array(':value', 10))
		->rule('login', 'alpha_numeric')
		->rule('password', 'alpha_numeric')
		->rule('login', 'min_length', array(':value', 3))
		->rule('password', 'min_length', array(':value', 3));

		if($post->check()){
			$status=true;
			$data=array("Данные введены коректно");
			$messege=array($status,$data);
			echo json_encode($messege);
		}
		else{
			$errors=$post->errors('validation1');
			$status=false;
			$data=$errors;
			$messege=array($status,$data);
			print_r(json_encode($messege));
		}

   }
   public function action_user(){
	 echo "work";
   }
}
