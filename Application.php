<?php
define("VENDOR_PATH", "http://localhost/");
class Application
{
    const DEFAULT = "Main";

    public function executar()
    {

        if (isset($_GET['url'])) {
            $url = explode("/", $_GET['url']);
            $class = 'Controllers\\' . ucfirst($url[0]) . "Controller";
        } else {
            $class = "Controllers\\MainController";
            $url[0] = self::DEFAULT;
        }
        $model = 'Models\\' . ucfirst($url[0]) . "Model";
        $controller = new $class(new $model);
        $controller->index();
    }
}
