<?php


class User
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
  

    function login($user_name,$password)
    {

        $key="abcdefg";
        $new_password=md5($password.$key);
        $query = $this->db->query("SELECT * FROM users WHERE user_name='".$user_name."' AND password='".$new_password."' AND banned=0");
        //$query = $this->db->get();
        return $query->fetchAll();
    }

    function ban_user($user_id)
    {
        $query = $this->db->query("UPDATE users set banned=1 WHERE user_id=$user_id");
        return $query;
    }

    function unban_user($user_id)
    {
        $query = $this->db->query("UPDATE users set banned=0 WHERE user_id=$user_id");
        return $query;
    }

    function get_banned_list()
    {
        $query = $this->db->query("SELECT * FROM users WHERE banned=1");
        return $query->fetchAll();
    }

    function get_users($key)
    {
        $query = $this->db->query("SELECT * FROM users WHERE banned=0 and reg_number LIKE '%".$key."%'");
        return $query->fetchAll();
    }

    function get_user($user_id)
    {
        $query = $this->db->query("SELECT full_name, user_name, reg_number FROM users WHERE user_id=$user_id");
        $return = $query->fetchAll();
        return $return[0];
    }

    function update_pass($old_password,$new_password,$user_id)
    {
        $query = $this->db->query("SELECT password from users WHERE user_id=$user_id");
        $result = $query->fetchAll();
        $old = $result[0]['password'];

        $old_password=md5($old_password."abcdefg");
        

        if($old_password==$old)
        {
           
            $new_password=md5($new_password."abcdefg");

            $query = $this->db->query("UPDATE users set password='".$new_password."' WHERE user_id=$user_id");
            $result = $query->fetchAll();
            $_SESSION["password_change"]="true";
        }
        else
        {
            $_SESSION["password_change"]="false";
        }
    }

    function user_count()
    {
        $query = $this->db->query("SELECT COUNT(user_id) as user_count from users WHERE user_type='user'");
        $result = $query->fetchAll();
        return $result;

    }

    function get_banned_user_count()
    {
        $query = $this->db->query("SELECT COUNT(user_id) as user_count from users WHERE user_type='user' and banned=1");
        $result = $query->fetchAll();
        return $result;
    }

    function reset_and_mail($email)
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) 
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password = implode($pass);

        $query = $this->db->query("SELECT user_id from users WHERE email='".$email."'");
        $result=$query->fetchAll();
        if($result[0])
        {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) 
            {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $password = implode($pass);
            $new_password = md5($password."abcdefg");
            
            $mail = mail($email, "Password Reset - UCSC Digital Library", "Your new password is ".$password,"dl@ucsc.lk");
            if($mail)
            {
                $query = $this->db->query("UPDATE users set password='".$new_password."'");
                $_SESSION['mail_sent']="true";
                return $query;
            }
            else
            {
                $_SESSION['mail_sent']="mail_error";
                return false;
            }
            
        }
        else
        {
            $_SESSION['mail_sent']="email_error";
            return false;
        }
    }

  
}