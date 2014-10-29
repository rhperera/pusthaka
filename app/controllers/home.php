<?php

class Home extends Controller
{
    public function index()
    {
        $user = $this->model('User');
        //$rav = $user->get();
        //var_dump($rav);
    }

    public function test()
    {
        echo 'home/test';
    }
}
