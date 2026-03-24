<?php
// or full path: str_replace("\\", "/", "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
namespace core;

class Router
{
    protected array $routes = [];
    protected string $uri;
    protected string $method;

    public function __construct()
    {
//        $this->uri= trim(parse_url($_SERVER['REQUEST_URI']));
        $this->uri= trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $this->method=$_SERVER['REQUEST_METHOD'];
    }

    public function add($uri, $controller, $method){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller){
       $this->add($uri, $controller, "GET");
    }

    public function post($uri, $controller){
        $this->add($uri, $controller, "POST");
    }

    public function show(){
        var_dump($this->routes);
    }

    // match

    public function match(){
        $isMatch = false;
        foreach ($this->routes as $route){
            if($this->uri === $route['uri'] && $this->method === $route['method']){
                echo "ok";
                    $isMatch = true;
                    // require controller
                    break;

            }
            else{
                echo "not ok";
            }
        }
        if(!$isMatch){
            // redirect to not faund page
            echo "404 - NOT FOUDN";
            die();
        }
    }

}