<?php

namespace app;

class Application
{

    static function run(array $config)
    {
        if(!empty($config['routerClass']))
           $router = new $config['routerClass'];

        if(!empty($config['urlManager']))
            $router->init($config['urlManager']);

    }

}