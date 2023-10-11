<?php

namespace August\Helpers;

class Router{
  private $routes = [];

  public function addRoute($pattern, $controller, $action)
  {
    $this->routes[] = [
      'pattern' => $pattern,
      'controller' => $controller,
      'action' => $action
    ];
  }

  public function matchRoute($url)
  {
    foreach ($this->routes as $route) {
      $pattern = $this->convertPatternToRegex($route['pattern']);
      if (preg_match($pattern, $url, $matches)) {
        array_shift($matches); // Remove the full match
        return [
          'controller' => $route['controller'],
          'action' => $route['action'],
          'params' => $matches
        ];
      }
    }
    return null; // No matching route
  }

  private function convertPatternToRegex($pattern)
  {
    $regex = preg_replace('/\//', '\\/', $pattern);
    $regex = preg_replace('/\{([a-z]+)\}/', '(?P<$1>[a-zA-Z0-9-]+)', $regex);
    return '/^' . $regex . '$/';
  }

  public function route()
  {
    $url = $_SERVER['REQUEST_URI'];
    $route = $this->matchRoute($url);
    if ($route) {
      $controllerName = $route['controller'];
      $action = $route['action'];
      $params = $route['params'];

      // Include and instantiate the controller

      $controller = new $controllerName();

      // Call the action method with parameters
      call_user_func_array([$controller, $action], $params);
    } else {
      // Handle 404
      header("HTTP/1.0 404 Not Found");
      echo "404 Not Found";
    }
  }
}