<?php
//include "../core/models/main_model.php";
include "../core/models/product_model.php";
include_once "models/{$view}_model.php";

if (isset($_POST['edit-product'])){
//    print_arr($_POST);
//    die();
    if ($product_id) {
        edit_product($product_id);
    }else{
        add_product();
    }
    save_file();
    redirect();
}
if ($product_id){
    $product = getProduct($product_id);
    $categories = getCats();
}
$categories = getCats();
include_once "views/{$view}.php";