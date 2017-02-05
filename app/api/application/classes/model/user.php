<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {
public static function get_password_validation($values)
    {
		parent::get_password_validation($values);
        return Validation::factory($values)
            ->rule('password', 'min_length', array(':value', 5))
			->rule('password', 'max_length', array(':value', 15));
			
    }
	 public function create_user($values, $expected)
    {
		
        $extra_validation = Model_User::get_password_validation($values)
		//email
			->rule('email', 'not_empty')
		//username
			->rule('username', 'not_empty')
			->rule('username', 'alpha_dash', array(':value', TRUE))
			->rule('username', 'min_length', array(':value', 3))
			->rule('username', 'max_length', array(':value', 15))
            ->rule('username','regex', array(':value', '/^[_\pL\pN]++$/uD'))
		//password	
		    ->rule('password', 'not_empty')
			->rule('password', 'alpha_numeric', array(':value', TRUE))
			->rule('password', 'regex', array(':value', '/^[a-z0-9]+$/'))
	   //password_confirm
	   		->rule('password', 'not_empty')
			->rule('password', 'alpha_numeric', array(':value', TRUE))
			->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'))
			->rule('username', 'min_length', array(':value', 5))
			->rule('username', 'max_length', array(':value', 15))
			->rule('password', 'regex', array(':value', '/^[a-zA-Z0-9]+$/'))
	    //first_name
			->rule('first_name', 'not_empty')
			->rule('first_name', 'alpha_dash', array(':value', TRUE))
			->rule('first_name', 'min_length', array(':value', 3))
			->rule('first_name', 'max_length', array(':value', 30))
            ->rule('first_name','regex', array(':value', '/^[-\pL]++$/uD'))
		//last_name
			->rule('last_name', 'not_empty')
			->rule('last_name', 'alpha_dash', array(':value', TRUE))
			->rule('last_name', 'min_length', array(':value', 3))
			->rule('last_name', 'max_length', array(':value', 30))
            ->rule('last_name','regex', array(':value', '/^[-\pL]++$/uD'))
		//country
			->rule('country', 'not_empty')
			->rule('country', 'alpha_dash', array(':value', TRUE))
			->rule('country', 'min_length', array(':value', 3))
			->rule('country', 'max_length', array(':value', 30))
            ->rule('country','regex', array(':value', '/^[-\pL]++$/uD'))
		//city
			->rule('city', 'not_empty')
			->rule('city', 'alpha_dash', array(':value', TRUE))
			->rule('city', 'min_length', array(':value', 3))
			->rule('city', 'max_length', array(':value', 30))
            ->rule('city','regex', array(':value', '/^[-\pL]++$/uD'))
		//company
			->rule('company', 'not_empty')
			->rule('company', 'alpha_dash', array(':value', TRUE))
			->rule('company', 'min_length', array(':value', 3))
			->rule('company', 'max_length', array(':value', 30))
            ->rule('company','regex', array(':value', '/^[-\pL]++$/uD'))
       //phone_number
			->rule('phone_number', 'not_empty')
			->rule('phone_number', 'min_length', array(':value', 8))
			->rule('phone_number', 'max_length', array(':value', 15))
			->rule('phone_number', 'regex', array(':value', '/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){8,15}(\s*)?$/'));
	   //Return validation function
	    return $this->values($values, $expected)->create($extra_validation);
    }
	
 public function labels()
    {
        return array();
    }

    public function rules()
	{
		return array();	
	}
} 
