<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'item_name');
            if (in_array($_POST['item_id'], $myitems)) {
                echo "<script>alert('Item already added.')
                window.location.href='menu.php';
                </script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('item_id' => $_POST['item_id'], 'qty' => 1);
                echo "<script>alert('Item added.')
                window.location.href='menu.php';
                </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('item_id' => $_POST['item_id'], 'qty' => 1);
            echo "<script>alert('Item added.')
                window.location.href='menu.php';
                </script>";
        }
    }
    if(isset($_POST['remove_item'])){
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['item_id']==$_POST['item_id']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>alert('Item deleted.')
                window.location.href='cart.php';
                </script>";
            }
        }
    }
    if(isset($_POST['modify_qty'])){
        foreach($_SESSION['cart'] as $key=>$value){
            if($value['item_id']==$_POST['item_id']){
                $_SESSION['cart'][$key]['qty']=$_POST['modify_qty'];
                echo "<script>
                window.location.href='cart.php';
                </script>";
            }
        }
    }
}

?>