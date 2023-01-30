<?php


namespace Controllers;

class MainController extends Controller
{
    public function __construct($model)
    {
        parent::__construct($model);
    }
    public function index()
    {

        $this->router->rota("main/teste", [
            "POST" => function () {
                echo '{
                    "type": "POST"
                }';
            },
            "GET" => function () {
                echo '{
                    "type": "GET"
                }';
            },
            "DELETE" => function () {
                echo '{
                    "type": "DELETE"
                }';
            },
            "PUT" => function () {
                echo '{
                    "type": "PUT"
                }';
            }
        ]);
    }
}
