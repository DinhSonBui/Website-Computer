<?php
    include 'connect.php';
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $action = (isset($_GET['action'])) ? $_GET['action'] : 'add';

    $query = mysqli_query($conn,"SELECT * FROM tbl_products WHERE id_product = $id");
    if($query)
    {
        $product = mysqli_fetch_assoc($query);
    }
   

    $item = [
        'id' => $product['id_product'],
        'name' => $product['name_product'],
        'image' => $product['img_product'],
        'price' => $product['price_sale'],
        'quantify' => 1
    ];
    if($action == 'add'){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantify'] +=1;
        }
        else{
            $_SESSION['cart'][$id] = $item;
        }    
    }

    if($action == 'delete'){
        unset($_SESSION['cart'][$id]);
    }
    header('Location: index.php');
?>