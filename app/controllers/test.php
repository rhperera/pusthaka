<?php

class Test extends Controller
{
    public function index($name)
    {
        echo 'test/index';
        echo $name;
    }
}