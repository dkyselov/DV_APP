<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Авторизация
 */
class Controller_Index_Auth extends Controller_Index {

    public function action_login() {
         $json = file_get_contents('php://input');
         $data=json_decode($json,true);
         //print_r($data); 
        // $data=array('username'=>'dimka','password'=>'12345678','remember'=>true);
         $auth=Auth::instance();
        if($auth->logged_in()) {
           $user=$auth->get_user()->username;
           print_r(json_encode(array("username"=>$user,))); 
           echo "Уже залогинен";
        }
        else { 
           // $data = json_decode($json, TRUE);
            $status = Auth::instance()->login($data['username'], $data['password'], (bool) $data['remember']);
            if ($status){
                $auth=Auth::instance();
                $user=$auth->get_user()->username;
                print_r(json_encode(array("username"=>$user,))); 
                echo "Только залогинился";
               // print_r(json_encode($user));
               // print_r(json_encode(array('status' => $status,'login'=>$login))); 
            }
            else {
                $errors = array(Kohana::message('auth/user', 'no_user'));
                print_r(json_encode($errors));
            }
        }
    
    }
    public function action_register() {
       /* $json = file_get_contents('php://input');
        $data=json_decode($json,true); */
        $data=array(
            "email"=>"dkiselov.ua@gmail.com",
            "username"=>"dimka",
            "password"=>"12345678",
            "password_confirm"=>"12345678",
            "first_name"=>"DMYTRO",
            "last_name"=>"KYSELOV",
            "country" =>"UKRAINE",
            "city" => "DNIPRO",
            "company"=>"DV",
            "phone_number"=>"+380501305970",
        );
        
        if (isset($data) && count($data)>0 ){
           //print_r($data);
            //$data = Arr::extract($_POST, array('username', 'password', 'first_name', 'password_confirm', 'email'));
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
                echo "Вы зарегестрированы";
                //$this->action_login();
                //$this->request->redirect('account');
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('auth');
                print_r($errors);   
            }
        }
        else{ 
            echo "Not data";
        }
    }
    
    public function action_logout() {
        echo "logout";
        if(Auth::instance()->logout()) {
           // $this->request->redirect();
        }
    }

}