<?php
// or full path: str_replace("\\", "/", "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
namespace core;
use app\service\logger\FileLogger; // !!!

//use app\service\logger\FileLogger;

class Router
{
//    protected $registry;
    protected array $routes = [];
    protected string $uri;
    protected string $method;

    public function __construct()
    {
//        $this->registry=$registry;
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        // try to find: Journal-v2/public/index.php
        // must be: auth
        // REQUEST_URI = Journal-v2/public/index.php
//        $path = str_replace('Journal-v2/public/index.php', '', $path);
//        $path = str_replace('Journal-v2/public/', '', $path);
//        $path = str_replace('index.php', '', $path);

//        $this->uri = trim($path, '/');
        $this->method = $_SERVER['REQUEST_METHOD'];

        echo "finally URI:" . $this->uri . PHP_EOL;


    }

    public function add($uri, $controller, $method, $controller_method){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            // for method from controller (cuz now work only index by default)
            'controller_method' => $controller_method
        ];
    }

    public function get($uri, $controller, $controller_method){
       $this->add($uri, $controller, "GET", $controller_method);
    }

    public function post($uri, $controller, $controller_method){
        $this->add($uri, $controller, "POST", $controller_method);
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
//            echo "try to find" . $this->uri . PHP_EOL; // !auth, output: ournal-v2/public/index.php
            //echo "method: " . $this->method . PHP_EOL;
//            echo "<pre>";
//                var_dump($this->routes);
//            echo "</pre>";
//$router->post("announcement/add", "app\\controller\\announcement\\AnnouncementController", "add");
//           echo "_____________";
//
//            echo "<pre>";
//            var_dump($route);
//            echo "</pre>";
//           die();
            $class_name = $route['controller'];

            if ($this->uri === $route['uri'] && $this->method === $route['method']){
            //echo " ok";
            //echo $class_name; app\controller\testClass
//                $route['controller_method'];
                return array($class_name, $route['controller_method']);
            }

//            echo $class_name . " does not match " . $route['uri'] . PHP_EOL;
            // app\controller\account\Register does not match auth
        }
//        $logger = $registry->get("logger");
//        $$this->logger->error("Route not found" . $this->uri . ", method: " . $this->method);
        $logger = new FileLogger();
        $logger->error("route not found: " . $this->uri . PHP_EOL);

        header('Content-Type: application/json');
        http_response_code(404);
        echo json_encode(["status" => "error", "msg" => "Route not found"]);
        die();
    }
}