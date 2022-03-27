<? defined('CATALOG') or die("Access denied")?>
<?php

function sort_products(){
    global $connection;
    $query = "SELECT * FROM products ORDER BY {$_POST['category']} {$_POST['order']}";
    $res = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($res)){
        $products[] = $row;
    }
    return $products;
}


function cats_id($array, $id){
    if (!$id) return false;
    foreach ($array as $item){
        if ($item['parent'] == $id){
            $data .= $item['id'] . ",";
            $data .= cats_id($array, $item['id']);
        }
    }
    return $data;
}

function get_products($ids, $start_pos, $perpage){
    global $connection;
        if ($ids){
        $query = "SELECT c.title as category_title, p.* FROM products p 
LEFT JOIN categories c ON c.id = p.parent WHERE p.parent IN ($ids)";
    }else{
        $query = "SELECT c.title as category_title, p.* FROM products p 
LEFT JOIN categories c ON c.id = p.parent WHERE 1";
    }
    if (!empty($_GET)){
        if ($_GET['min_price']){
            $query .= " and price >= {$_GET['min_price']} and price <= {$_GET['max_price']} ";
        }
        if ($_GET['new']){
            $new = $_GET['new'];
            $query.= " and new = '$new'";
        }
        if ($_GET['sale']){
            $sale = $_GET['sale'];
            $query.= " and sale = '$sale'";
        }
    }
    $query .= " ORDER BY title LIMIT $start_pos, $perpage";
    $res = mysqli_query($connection, $query);
    $products = array();
    while ($row = mysqli_fetch_assoc($res)){
        $products[] = $row;
    }
    return $products;
}

function get_max_price(){
    global $connection;
    $query = "SELECT MAX(price) FROM products";
    $res = mysqli_query($connection, $query);
    $max = mysqli_fetch_row($res);
    return $max[0];
}

function get_min_price(){
    global $connection;
    $query = "SELECT min(price) FROM products";
    $res = mysqli_query($connection, $query);
    $min = mysqli_fetch_row($res);
    return $min[0];
}

function count_goods($ids){
    global $connection;
    if( !$ids ){
        $query = "SELECT COUNT(*) FROM products WHERE 1";
    }else{
        $query = "SELECT COUNT(*) FROM products WHERE parent IN($ids)";
    }
    if (!empty($_GET)){
        if ($_GET['min_price']){
            $query .= " and price >= {$_GET['min_price']} and price <= {$_GET['max_price']} ";
        }
        if ($_GET['new']){
            $new = $_GET['new'];
            $query.= " and new = '$new'";
        }
        if ($_GET['sale']){
            $sale = $_GET['sale'];
            $query.= " and sale = '$sale'";
        }
    }
    $res = mysqli_query($connection, $query);
    $count_goods = mysqli_fetch_row($res);
    return $count_goods[0];
//    return $query;
}

function get_id($categories, $category_alias){
    if (!$category_alias) return false;
    foreach ($categories as $k => $v){
        if ($v['alias'] == $category_alias){
            return $k;
        }
    }
    return false;
}
