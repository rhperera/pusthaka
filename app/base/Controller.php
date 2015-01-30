<?php

class Controller
{
    protected $db;

    public function __construct()
    {
        session_start();
    }

    public function getDb()
    {
        return new PDO('mysql:host=127.0.0.1;dbname=pusthaka-db','root','');
    }

    protected function model($model)
    {
        require_once('../app/models/'.$model.'.php');

        return new $model($this->getDb());
    }

    protected function view($view,$data=array())
    {
        require_once('../app/views/'.$view.'.php');

    }

    protected function load_class($name)
    {
        require_once('../app/libraries/'.$name.'.php');
    }
}

