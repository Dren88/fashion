<?php
include 'main_controller.php';
include "../core/models/category_model.php";

if (!isset($category_id)) $category_id = null;
//$id = get_id($categories, $category_alias);

//$ids = cats_id($categories, $category_id);
//$ids = !$ids ? $category_id : $ids . $category_id;
//$count_goods = count_goods($ids);
$count_goods = count_goods($category_id);

$perpage = (int)$_COOKIE['per_page'] ? (int)$_COOKIE['per_page'] : PERPAGE;
//$count_goods = count_goods($ids);

$count_pages = ceil($count_goods / $perpage);

if (!$count_pages) $count_pages = 1;
if (isset($_GET['page'])){
    $page = (int)$_GET['page'];
    if ($page < 1) $page = 1;
}else {$page = 1;}

if ($page > $count_pages) $page = $count_pages;
$start_pos = ($page - 1) * $perpage;
$pagination = pagination($page, $count_pages);

$products = get_products($category_id, $start_pos, $perpage);

include_once "views/{$view}.php";