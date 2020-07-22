<?php


namespace app;


class Router
{

    private $controller;

    private $method;

    public $handlerUrl;

    public function init(array $urlManager)
    {
        $this->handlerUrl = $_SERVER['REQUEST_URI'];

        if(!empty($this->handlerUrl)) {
            $this->handlerUrl = trim($this->handlerUrl, '/');

            $this->handlerUrl = explode('/', $this->handlerUrl);
        }

        $this->controller = $this->getController($urlManager);

        if($this->controller)
            $this->getMethod($urlManager);


        if(!empty($this->method))
        {
            if(empty($urlManager[$this->handlerUrl[0]]['arguments'][$this->handlerUrl[1]]))
                (new $this->controller)->{$this->method}();
            else {
                $param = $this->handlerParam($urlManager);
                (new $this->controller)->{$this->method}($param);
            }
        }

    }

    private function handlerParam($urlManager)
    {
        $param = $this->handlerUrl[2];

        switch ($urlManager[$this->handlerUrl[0]]['arguments'][$this->handlerUrl[1]])
        {
            case 'int':
                $param = intval($this->handlerUrl[2]);
                break;
        }
        return $param;
    }

    public function getMethod(array $urlManager)
    {

        if(!empty($this->handlerUrl[1]))
            $this->method = $this->handlerUrl[1];


        if(method_exists($this->controller, $this->method))
            return $this->method;
    }

    public function getController(array $urlManager)
    {

        if(is_array($this->handlerUrl))
            $className =  $urlManager[$this->handlerUrl[0]]['class'];
        else
            $className = $urlManager[$this->handlerUrl]['class'];

        if(class_exists($className))
            return $className;
    }

}