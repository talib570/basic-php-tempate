<?php
ob_start();

// Turn off all error reporting
// while on production using 0
// while on production using E_ALL
error_reporting(E_ALL);

/* 
 * sets default time zone
 */
date_default_timezone_set(DEFAULT_TIMEZONE);

/**
 * @return boolean return TRUE if a session was successfully started
 */        
function my_session_start()
{
      $sn = session_name();
      if (isset($_COOKIE[$sn])) {
          $sessid = $_COOKIE[$sn];
      } else if (isset($_GET[$sn])) {
          $sessid = $_GET[$sn];
      } else {
          return session_start();
      }

     if (!preg_match('/^[a-zA-Z0-9,\-]{22,40}$/', $sessid)) {
          return false;
      }
      return session_start();
}

if ( !my_session_start() ) {
    session_id( uniqid() );
    session_start();
    session_regenerate_id();
}

require 'config/routes.php';

// splits ROUTE and FUNCTION
// from URL.
if (isset($_GET['url'])) {
  $url = preg_split('/\-/', $_GET['url']);
  if (count($url) == 1) {
    $_GET[ROUTE_FUNCTION] = $url[0];
  }elseif (count($url) == 2) {
    $_GET[ROUTE_TYPE] = $url[0];
    $_GET[ROUTE_FUNCTION] = $url[1];
  }
}

// sets default route type if none found.
if (!isset($_GET[ROUTE_TYPE]) || !isset($_GET[ROUTE_FUNCTION])) {
  if (strpos($_SERVER['REQUEST_URI'], 'backend') !== FALSE) {
    // is admin backend
    $_GET[ROUTE_TYPE] = 'admin';
    $_GET[ROUTE_FUNCTION] = 'login';
  }else{
    /**
     * Is a user based view
     * if the $userFunction is for login (or any known route), route them there
     */
    $userFunction = basename($_SERVER['REQUEST_URI'],'/');
    if (strpos($userFunction, '?') !== FALSE)
      $userFunction = substr($userFunction, 0, strpos($userFunction, '?'));

    $page = false;
    foreach ($routes as $route)
      if ($route[ROUTE_TYPE] == 'user' && $route[ROUTE_FUNCTION] == $userFunction)
        $page = true;
    if(!$page || ($page && $userFunction == 'login')) {
      $userFunction = 'login';
    }

    $_GET[ROUTE_TYPE] = 'user';
    $_GET[ROUTE_FUNCTION] = $userFunction;
  }
}

// Iterates through all routes to find
// user call.
foreach ($routes as $route) {
  if ($_GET[ROUTE_TYPE] == $route[ROUTE_TYPE] &&
    $_GET[ROUTE_FUNCTION] == $route[ROUTE_FUNCTION]) {
    $name = ucwords($_GET[ROUTE_TYPE]).'Controller';
    $controllerPath = "controllers/$name.class.php";
    if (file_exists($controllerPath)) {
      include_once($controllerPath);
      $controller = new $name;
      if (method_exists($controller, $route[ROUTE_FUNCTION])){
        $viewData = $controller->$route[ROUTE_FUNCTION]();
      }
    }

    if (isset($route[ROUTE_VIEW]))
      include_once("views/templates/".$route[ROUTE_TYPE].".php");
    exit();
  }
}
header('location: ./login');
?>
