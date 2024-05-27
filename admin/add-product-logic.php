<?php
require 'config/database.php';

if (isset($_POST['submit'])) { 
   
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);  
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT); 
    $d_id = filter_var($_POST['district'], FILTER_SANITIZE_NUMBER_INT); 
    $l_price = filter_var($_POST['l_price'], FILTER_SANITIZE_NUMBER_INT);
    $h_price = filter_var($_POST['h_price'], FILTER_SANITIZE_NUMBER_INT);
    

    // validate form data 
     if (!$name) {
        $_SESSION['add-product'] = "Enter product name"; 
    } elseif (!$category_id) {
        $_SESSION['add-product'] = "Select product category"; 
    } elseif (!$d_id) {
        $_SESSION['add-product'] = "Select product district"; 
    } elseif (!$l_price) {
        $_SESSION['add-product'] = "Enter the Lowest-Price"; 
    } elseif (!$l_price) {
        $_SESSION['add-product'] = "Enter the Highest-Price"; 
    }

        // redirect back (with form data) to add-product page if there is any problem 
        if (isset($_SESSION['add-product'])) { 
            $_SESSION['add-product-data'] = $_POST; 
            header('location: ' . ROOT_URL . 'admin/add-product.php');
            die();                            
        } else {
            
            // insert product into database
            $query = "INSERT INTO products (d_id, name, lowest_price, highest_price, category_id) VALUES ('$d_id', '$name', '$l_price', '$h_price', ' $category_id')";
            $result = mysqli_query($connection, $query);

            if(!mysqli_errno($connection)) {
                $_SESSION['add-product-success'] = "New product- $name added successfully"; 
                header('location: ' . ROOT_URL . 'admin/manage-sellers.php');
                die();
            }
        
        }
    
}
  header('location: ' . ROOT_URL . 'admin/add-product.php');
  die();