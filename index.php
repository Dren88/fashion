<?php
error_reporting(E_ALL ^ E_NOTICE);
define("CATALOG", true);
session_start();
include 'config.php';

$routes = array(
    array('url' => '#^$|^\?#', 'view' => 'category'),
    array('url' => '#^category/(?P<category_id>[a-z0-9-]+)#i', 'view' => 'category'),
    array('url' => '#^category#i', 'view' => 'category'),
);

$url = trim($_SERVER['REQUEST_URI'], '/');

foreach ($routes as $route){
    if (preg_match($route['url'], $url, $match)){
        $view = $route['view'];
        break;
    }
}

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Если к нам идёт Ajax запрос, то ловим его
    include "core/controllers/{$view}_controller.php";
    exit;
}
extract($match);

include VIEW. "header.php";
if (empty($match)){
    include '404.php';
}else{
    extract($match);
    include "core/controllers/{$view}_controller.php";
}
include VIEW. "footer.php";

