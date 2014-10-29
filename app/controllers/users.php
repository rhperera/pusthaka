<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/24/14
 * Time: 12:32 PM
 */
class Users extends Controller
{
    function login()
    {
        $data['error']=0;
        if($_POST)
        {
            $log = $this->model('user');
            $user_name = $_POST['user_name'];
            $password  = $_POST['password'];
            $user = $log->login($user_name,$password);

            if(!$user)
            {
                $data['error']=1;
            }
            else
            {
                //session_start();
                $_SESSION['user_name'] = $user[0]['user_name'];
                $_SESSION['user_type'] = $user[0]['user_type'];
                $_SESSION['user_id']   = $user[0]['user_id'];



                if($_SESSION['user_type']=='librarian')
                {
                    
                    header("Location: ".ASSET_PATH."/Lpanel");
                }
                else
                {

                    //header("Location: " + ASSET_PATH + "/main");
                    header("Location: ".ASSET_PATH."/main");

                }
                
            }
        }
        $this->view('header',$data);
        $this->view('login',$data);
    }

    function logout()
    {
        session_destroy();
        header("Location: ".ASSET_PATH."/main");
    }
}