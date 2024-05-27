<?php
require 'config/database.php';
if (isset($_GET['p_id'])) {
    $p_id = filter_var($_GET['p_id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_GET['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   
   
        if (!mysqli_errno($connection)){
            //delete district
            $query= "DELETE FROM products WHERE p_id=$p_id LIMIT 1";
            $result = mysqli_query($connection, $query);
            $_SESSION['delete-product-success'] = "Product $name deleted successfully."; 
        } 
    }                   
                                  

header('location: ' . ROOT_URL . 'admin/manage-sellers.php');
die();