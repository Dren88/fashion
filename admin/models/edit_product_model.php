<?php

function edit_product($id){
    global $connection;
    $isNew = $_POST['new'] ? 'Y' : 'N';
    $isSale = $_POST['sale'] ? 'Y' : 'N';
    $query = "UPDATE `products` SET title = '{$_POST['product-name']}', price = '{$_POST['product-price']}', parent = '{$_POST['category']}', parent = '{$_POST['category']}', new = '$isNew', sale = '$isSale', image = '{$_FILES['product-photo']['name']}' WHERE id = $id";
//    return  $query;
    $res = mysqli_query($connection, $query);
    if (mysqli_affected_rows($connection) > 0){
        $_SESSION['res']['ok'] = 'Вы успешно изменили товар';
    }else{
        $_SESSION['res']['error'] = 'Ошибка редактирования товара';
    }
}

function add_product(){
    global $connection;
    $isNew = $_POST['new'] ? 'Y' : 'N';
    $isSale = $_POST['sale'] ? 'Y' : 'N';
    $query = "INSERT INTO `products` 
(`title`, `price`, `image`, `parent`, `new`, `sale`) VALUES 
('{$_POST['product-name']}', '{$_POST['product-price']}', '{$_FILES['product-photo']['name']}', {$_POST['category']}, '{$isNew}', '{$isSale}')";
    $res = mysqli_query($connection, $query);
    if (mysqli_affected_rows($connection) > 0){
        $_SESSION['res']['ok'] = 'Вы успешно добавили товар';
    }else{
        $_SESSION['res']['error'] = 'Ошибка добавления товара';
    }
}

function save_file(){
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] .'/'. PRODUCTIMG . basename($_FILES['product-photo']['name']);
    if (!empty($_FILES['product-photo']['error'])){
        $_SESSION['res']['error'] = 'Ошибка загрузки файла';
    }else{
        move_uploaded_file($_FILES['product-photo']['tmp_name'], $uploadPath);
    }
}