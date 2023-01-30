<?php


class Routers
{

	public $rota;
	public function rota($path, $arg)
	{
		$this->rota = $path;
		$url = @$_GET['url'];
		if (($url == $path) || ($url == $path . "/")) {

			if (isset($arg[$_SERVER['REQUEST_METHOD']])) {
				$arg[$_SERVER['REQUEST_METHOD']]();
			}

			die();
		}

		$path = explode('/', $path);
		$url = explode('/', @$_GET['url']);
		$ok = true;
		$par = [];


		if ((count($path) + 1 == count($url)) || (count($path) == count($url))) {
			foreach ($path as $key => $value) {
				if (($value == '?') || ($value == '?/')) {
					$par[$key] = $url[$key];
				} else if ($url[$key] != $value) {
					$ok = false;
					break;
				}
			}
			if ($ok) {
				if (isset($arg[$_SERVER['REQUEST_METHOD']])) {
					$arg[$_SERVER['REQUEST_METHOD']]($par);
				}
				die();
			}
		}
	}
}
