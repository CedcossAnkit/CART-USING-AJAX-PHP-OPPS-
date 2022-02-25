<?php

require_once "Profunction.php";

$obj = new functions();

$action = $_POST['action'];
$idd = isset($_POST['id']) ? $_POST['id'] : 0;


switch ($action) {
    case 'addtocart':
        echo $obj->ADDtocart($idd);
        break;
    case 'updateQuantity':
        // echo $_POST['txt'];
        $num = $_POST['txt'];
        $id = $_POST['id'];
        $obj->addManual($num, $id);
        break;
    case 'delete':
        $id = $_POST['id'];
        $obj->deleteValue($id);
        break;
    case 'clrcrt':
        $obj->clearCart();
        break;
}
