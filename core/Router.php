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
        //echo "method show: ";
        //echo "<pre>";
          //  var_dump($this->routes);
//            var_dump($this->uri);
        //echo "</pre>";
    }

    // match

    public function match()
    {
        foreach ($this->routes as $route) {
//            echo "<pre>";
//                var_dump($route);
//            echo "</pre>";

            $class_name = $route['controller'];
            if ($this->uri === $route['uri'] && $this->method === $route['method']) {
            //echo " ok";
            //echo $class_name; app\controller\testClass
                return $class_name;
            }
        }
        file_put_contents("../testSystem.txt", "Route not found: $this->uri \n", FILE_APPEND);
        header('Content-Type: application/json');
        http_response_code(404);
        echo json_encode(["status" => "error", "msg" => "Route not found"]);
        die();
    }
}