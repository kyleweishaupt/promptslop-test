<?php
class Router {
    private $routes = [];

    public function add($method, $path, $handler) {
        $path = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && preg_match('#^' . $route['path'] . '$#', $uri, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                list($controller, $action) = explode('@', $route['handler']);
                $controller = new $controller();
                call_user_func_array([$controller, $action], array_values($params));
                return;
            }
        }
        echo '404 Not Found';
    }
}