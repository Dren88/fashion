<?php

function getProduct($product_id)
{
    global $connection;
    $query = "SELECT * FROM products WHERE id = $product_id";
    $res = mysqli_query($connection, $query);
    $product = mysqli_fetch_assoc($res);
    return $product;
}
function getCats()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $res = mysqli_query($connection, $query);
    while ($row = $res->fetch_assoc()){
        $categories[] = $row;
    }
    return $categories;
}