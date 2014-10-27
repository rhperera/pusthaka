<?php
/**
 * Created by PhpStorm.
 * User: Raveen
 * Date: 8/24/14
 * Time: 12:32 PM
 */
class Users extends CI_Controller
{
    function login()
    {
        $data['error']=0;
        if($_POST)
        {
            $this->load->model('user');
            $user_name = $this->input->post('user_name',true);
            $password  = $this->input->post('password',true);
            $user=$this->user->login($user_name,$password);
            if(!$user)
            {
                $data['error']=1;
            }
            else
            {
                $this->session->set_userdata('user_name',$user['user_name']);
                $this->session->set_userdata('user_type',$user['user_type']);
                $this->session->set_userdata('user_id',$user['user_id']);


                if($user['user_type']=='librarian')
                {
                    
                    redirect(base_url().'Lpanel');
                }
                else
                {
                    redirect(base_url().'posts');
                }
                
            }
        }
        $this->load->view('header',$data);
        $this->load->view('login',$data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'posts');
    }
}