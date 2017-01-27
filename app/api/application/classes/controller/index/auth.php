<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Auth
 */
class Controller_Index_Auth extends Controller_Index {
    public function action_login() {
         $info="errors";
         $auth=Auth::instance();
         if($auth->logged_in()) {
           $user=$auth->get_user()->username;
           $info="login";
           print_r(json_encode(array("info"=>$info,"username"=>$user,))); 
         }
        else { 
           $json = file_get_contents('php://input'); 
           $data=json_decode($json,true);
           $status = Auth::instance()->login($data['username'], $data['password'], (bool) $data['remember']);
           if ($status){
                $auth=Auth::instance();
                $user=$auth->get_user()->username;
                $info="login";
                print_r(json_encode(array("info"=>$info,"username"=>$user,)));  
            }
            else {
                $errors = array(Kohana::message('auth/user', 'no_user'));
                $info="errors";
                print_r(json_encode(array("info"=>$info,"errors"=>$errors)));
               
            }
        }
    
    }
    public function action_register() {
        $json = file_get_contents('php://input');
        $data=json_decode($json,true);
       /* $data=array(
            "email"=>"dkiselo11v113.ua@gmail.com//",
            "username"=>"dimа_15",
            "password"=>"12345",
            "password_confirm"=>"12345",
            "first_name"=>"DMYTRO",
            "last_name"=>"KYSELOV",
            "country" =>"UKRAINE",
            "city" => "DNIPRO",
            "company"=>"DVD",
            "phone_number"=>"+380501305970",
        );*/
        if (isset($data) && count($data)>=10 ){
            $data = Arr::map('trim', $data);
            $users = ORM::factory('user');
            try {
                $users->create_user($data, array(
                    'email',
                    'username',
                    'password',
                    'first_name',
                    'last_name',
                    'country',
                    'city',
                    'company',
                    'phone_number',
                ));
                $role = ORM::factory('role')->where('name', '=', 'login')->find();
                $users->add('roles', $role);
                $info="Complete";
                print_r(json_encode(array("info"=>$info,"message"=>"welcome" )));
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('auth');
                $info="error";
                print_r(json_encode(array("info"=>$info,"message"=>$errors)));  
            }
        }
        else{ 
            $info="not_data";
             print_r(json_encode(array("info"=>$info,"message"=>"Enter all data")));
        }
    }
    
    public function action_logout() {
        if(Auth::instance()->logout()) {
            $this->action_login();
        }
    }
}