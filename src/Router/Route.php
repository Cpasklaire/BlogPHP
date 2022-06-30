<?php
/* $routes = [
	'/' => 'PostController::index',
	'/post' => 'PostController::show'
]; */

namespace App\Router;

class Route {

    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable) {

        $this->path = trim($path, '/');
        $this->callable = $callable;

    }

    public function with(string $param,string $regex) {
        
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    public function match(string $url): bool {
        
        // remove '/'
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'] , $this->path);
        $regex = "#^$path$#i";
        //watch if url = path
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        
        // Delete the first element of matches array
        array_shift($matches);
        
        $this->matches = $matches;

        return true;
        
    }
    
    private function paramMatch($match): string {
        
        if(isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        
        return '([^/]+)';
    }
    
    public function call() {

        if(is_string($this->callable)) {
            $params = explode('#', $this->callable);
            
            $controller = "App\\Controller\\" . $params[0] . "Controller";
            $controller = new $controller();
            
            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
        
    }

}