<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {

  public function labels()
    {
        return array(
            'username' => 'Логин',
            'email' => 'E-mail',
            'first_name' => 'ФИО',
            'password' => 'Пароль',
            'password_confirm' => 'Повторить пароль',
        );
    }

    public function rules()
	{
		return array(
			'email' => array(
				array('not_empty'),
				array('min_length', array(':value', 6)),
				array('max_length', array(':value', 25)),
				array('email'),
				//array('email_domain'),
			),
			'username' => array(
				array('not_empty'),
				array('min_length', array(':value', 5)),
				array('max_length', array(':value', 25)),
				//array('regex', array(':value', '/^[a-z]+([-_]?[a-z0-9]+){0,2}$/i')),
			),
			'password' => array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 15)),
			    array('alpha_numeric', array(':value', TRUE)),
			),
			'password_confirm' => array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 15)),
				array('alpha_numeric', array(':value', TRUE)),
			),
            'first_name' => array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 32)),
				//array('regex', array(':value', '^[a-zA-Zа-яёА-ЯЁ]+$')),
			),
			'last_name' => array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 32)),
				//array('regex', array(':value', '^[a-zA-Zа-яёА-ЯЁ]+$')),
			),
			 'country' => array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 32)),
				//array('regex', array(':value', '^[a-zA-Zа-яёА-ЯЁ\s\-]+$')),
			),
			 'city' => array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 32)),
				//array('regex', array(':value', '^[a-zA-Zа-яёА-ЯЁ\s\-]+$')),
			),
			 'company' => array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 32)),
				//array('regex', array(':value', '^[a-zA-Zа-яёА-ЯЁ\s\-]+$')),
			),
			 'phone_number' => array(
				array('not_empty'),
				array('min_length', array(':value', 10)),
				array('max_length', array(':value', 15)),
				//array('regex', array(':value', '^[0-9()\-+ ]+$')),
			),
			
			
		);
	}
} 
