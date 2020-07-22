<?php

namespace app\controllers;

use app\Controller;

class Category extends Controller
{

    public function get(int $id)
    {
        return $this->responseJson([$id]);
    }

    public function add()
    {
        return 'add';
    }

}