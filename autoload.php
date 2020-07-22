<?php
spl_autoload_register(function ($class) {

    $arPathClass = explode('\\', $class);

    if(count($arPathClass) <= 2 && $arPathClass[0] == 'app')
    {
        require_once 'vendor/'.$arPathClass[1].'.php';
    }else{
        require_once $arPathClass[1].'/'.$arPathClass[2].'.php';
    }

});