<?php


namespace app;


abstract class Controller
{

    public function responseJson(array $data)
    {
        header('Content-Type: application/json');

        echo json_encode($data);
    }

    abstract function add();

    abstract protected function get(int $id);

}