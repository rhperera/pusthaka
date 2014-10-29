<?php
    
class App
{
    protected $controller = 'main';
    protected $method ='index';
    protected $params =array();

    public function __construct()
    {
        $url = $this->parseUrl();

        if(file_exists('../app/controllers/'.$url[0].'.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/'.$this->controller.'.php';

        $this->controller = new $this->controller;

        //check a method exists

        if(isset($url[1]))
        {
            if(method_exists($this->controller,$url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : array();

        call_user_func_array(array($this->controller, $this->method),$this->params);
    }

    protected function parseUrl()
    {
        if(isset($_GET['url']))
        {
            return explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
            //print_r($url);
        }
    }
}
