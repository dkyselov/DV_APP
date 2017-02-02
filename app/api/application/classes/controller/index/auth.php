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
            "email"=>"dkiselov11.ua@gmail.com",
            "username"=>"<script>dimka11",
            "password"=>" $ 12345678>",
            "password_confirm"=>"123456",
            "first_name"=>"DMYTRO",
            "last_name"=>"KYSELOV",
            "country" =>"UKRAINE",
            "city" => "DNIPRO",
            "company"=>"DVD",
            "phone_number"=>"+380501305970",
        );*/
        if (isset($data) && count($data)>=10 ){
            $data = Arr::map('trim', $data);
            $data = Arr::map('strip_tags', $data);
            $data = Arr::map('htmlspecialchars', $data);
            //Check of uniqueness of the user
            $user_uniq = ORM::factory('user')
            ->where('username', '=', $data['username'])
            ->or_where('email', '=', $data['email'])
            ->limit(10)
            ->find();
        if($user_uniq->loaded()){
          $info="found_error";
          $message=array("message"=>"The user with such login or email already exists");
          print_r(json_encode(array("info"=>$info,"message"=>$message)));
        }
        else{
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
                $info="ok";
                print_r(json_encode(array("info"=>$info,"message"=>"welcome" )));
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('auth');
                $info="error";
                print_r(json_encode(array("info"=>$info,"message"=>$errors)));  
            }
         }
        }
        else{ 
            $info="empty_error";
            $message=array("message"=>"Enter all data");
            print_r(json_encode(array("info"=>$info,"message"=>$message)));
        }
    }
    
    public function action_logout() {
        if(Auth::instance()->logout()) {
            $this->action_login();
        }
    }
}