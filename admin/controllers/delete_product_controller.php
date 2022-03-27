<?php
require_once "models/{$view}_model.php";
$id = $_REQUEST['id'];
//die();
if(deleteProduct($id)){
    exit('OK');
}else{
    exit('No');
}
