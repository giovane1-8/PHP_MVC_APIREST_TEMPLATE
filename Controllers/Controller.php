<?php

namespace Controllers;



class Controller
{
    protected $model;
    protected $router;
    public function __construct($model)
    {
        $this->router = new \Routers();    
        $this->model = $model;
    }
}
