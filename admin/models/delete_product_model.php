<?php

function deleteProduct($id){
    global $connection;
    $query = "DELETE FROM products WHERE id = {$id}";
    $res = mysqli_query($connection, $query);
    if (mysqli_affected_rows($connection) > 0){
        return true;
    }else{
        return false;
    }
}