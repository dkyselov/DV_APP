<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {
 public static function get_password_validation($values)
    {
        return Validation::factory($values)
            ->rule('password', 'min_length', array(':value', 5))
			->rule('password', 'max_length', array(':value', 15));
		
    }

    public function create_user($values, $expected)
    {
        // Validation for passwords
        $extra_validation = Model_User::get_password_validation($values)
            ->rule('password', 'not_empty');

        return $this->values($values, $expected)->create($extra_validation);
    }
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
			'username' => array(
				array('not_empty'),
				array('min_length', array(':value', 5)),
				array('max_length', array(':value', 32)),
				array('regex', array(':value', '/^[a-z]+([-_]?[a-z0-9]+){0,2}$/i')),
			),
            'first_name' => array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 32)),
			),
			'password' => array(
				array('not_empty'),
			),
			'email' => array(
				array('not_empty'),
				array('min_length', array(':value', 6)),
				array('max_length', array(':value', 65)),
				array('email'),
			),
		);
	}
} 
