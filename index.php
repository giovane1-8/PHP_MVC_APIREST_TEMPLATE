<?php


header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Content-Type: application/json");
$autoload = function ($class) {
    $arquivo = explode("\\", $class);
    
    if (count($arquivo) >= 2) {
        $arquivo = $arquivo[0] . "/" . $arquivo[1] . ".php";
    } else {

        $arquivo = $arquivo[0] . ".php";
    }
    if (file_exists($arquivo)) {
        include($arquivo);
    } else {
        echo '{
    "status": 404,
    "description": "Pagina não encontrada"    
}';
        die();
    };
};


spl_autoload_register($autoload);
$app = new Application();
$app->executar();
