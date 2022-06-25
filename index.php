<?php

require_once 'vendor/autoload.php';

// Database
require_once 'database.php';

// Views
// install twig with
// composer require "twig/twig:^3.0"

// Init twig object
$twigLoader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($twigLoader, [
    // 'cache' => 'cache',
]);



// Routing

require_once "./routes.php";

$requestURI = $_SERVER['REQUEST_URI'];

foreach ($routes as $uri => $handler) {
	if ($uri == $requestURI) {		
		$handler = explode('::', $handler);
		require_once 'controllers/' . $handler[0] . '.php';
		$controller = new ReflectionClass($handler[0]);
		$method = $controller->getMethod($handler[1]);
		$instance = $controller->newInstance($sql, $twig);
		$method->invoke($instance);
		die;
	}
}

echo $twig->render('404.html');