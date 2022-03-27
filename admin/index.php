<?php
error_reporting(E_ALL ^ E_NOTICE);
define("CATALOG", true);
session_start();
include '../config.php';

$app_path = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$app_path = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$app_path = preg_replace('#[^/]+$#', '', $app_path);
define("PATH_ADMIN", $app_path);
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = str_replace(PATH_ADMIN, '', $url);
$sire_url = rtrim(str_replace('admin', '', PATH_ADMIN), '/');
define("SITE", $sire_url);
$routes = [
    array('url' => '#^product/(?P<product_id>[0-9-]+)/edit#i', 'view' => 'edit_product'),
    array('url' => '#^add#i', 'view' => 'edit_product'),
    array('url' => '#^product/delete#i', 'view' => 'delete_product'),
    array('url' => '#^$|^\?#', 'view' => 'products'),
    array('url' => '#^login#i', 'view' => 'login'),
];

foreach ($routes as $route){
    if (preg_match($route['url'], $url, $match)){
        $view = $route['view'];
        break;
    }
}
//echo $view;

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Если к нам идёт Ajax запрос, то ловим его
    include "core/controllers/{$view}_controller.php";
    exit;
}
extract($match);
//echo $product_id;
require_once 'controllers/main_controller.php';

if (empty($match)){
    include $_SERVER['DOCUMENT_ROOT'] . '/404.php';
}else{
    extract($match);
    include "controllers/{$view}_controller.php";
}
