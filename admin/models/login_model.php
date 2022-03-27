<?php

function authorization(){
    global $connection;
    $email = trim(mysqli_real_escape_string($connection, $_POST['email']));
    $password = trim($_POST['password']);
    $password = md5($_POST['password']);
    $query = "SELECT * FROM users WHERE email = '$email' and password = '$password'  AND is_admin = 1 LIMIT 1";
    $res = mysqli_query($connection, $query);
    if (mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['auth']['user'] = $row['name'];
        $_SESSION['auth']['is_admin'] = $row['is_admin'];
    }else{
        $_SESSION['auth']['errors'] = 'Логин/пароль введены неверно';
    }
    return $query;
}
