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
                header("Location: ".ASSET_PATH."/main#sign");
            }
            else
            {
                //session_start();
                $_SESSION['user_name'] = $user[0]['user_name'];
                $_SESSION['user_type'] = $user[0]['user_type'];
                $_SESSION['user_id']   = $user[0]['user_id'];
                $_SESSION['full_name']   = $user[0]['full_name'];
                $_SESSION['reg_number'] = $user[0]['reg_number'];
                $_SESSION['email']  =$user[0]['email'];
                



                if($_SESSION['user_type']=='librarian')
                {
                    
                    header("Location: ".ASSET_PATH."/Lpanel");
                }
                else
                {
                    $_SESSION['reg_number']   = $user[0]['reg_number'];
                    //header("Location: " + ASSET_PATH + "/main");
                    header("Location: ".ASSET_PATH."/main");

                }
                
            }
        }
        
    }

    function logout()
    {
        session_unset(); 
        header("Location: ".ASSET_PATH."/main");
    }

    function add_user()
    {
        if(isset($_SESSION['user_name']))
        {
            if($_SESSION['user_type']=='librarian' or $_SESSION['user_type']=='admin')
            {
                $user_name  = $_POST['user_name'];
                $email      = $_POST['email'];
                $password   =$_POST['password'];
                $again_password=$_POST['again_password'];
                $user_type  ='user';
                $full_name  =$_POST['full_name'];
                $reg_number =$_POST['reg_number'];
                $batch_year =$_POST['batch_year'];

                if($password==$again_password)
                {
                    if($user_name and $email and $password and $full_name and $reg_number and $batch_year)
                    {
                        $user = $this->model('user');
                        $result = $user->register_user($user_name,$email,$password,$user_type,$full_name,$reg_number,$batch_year);
                        if($result)
                            {
                                $_SESSION['register_user']='success';
                                header("Location: ".ASSET_PATH."/settings");
                            }
                        else
                            {
                                $_SESSION['register_user']='unsuccess';
                                header("Location: ".ASSET_PATH."/settings");
                            }
                    }
                    else
                    {
                        $_SESSION['register_user']='fill_all';
                        header("Location: ".ASSET_PATH."/settings");
                    }   
                }
                else
                {
                    $_SESSION['register_user']='wrong_password';
                    header("Location: ".ASSET_PATH."/settings");
                }
            }
            else
            {
                header("Location: ".ASSET_PATH."/main");
            }
    }
    else
    {
        header("Location: ".ASSET_PATH."/main");
    }

    
    }
}