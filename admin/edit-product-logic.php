<?php
require 'config/database.php';


if (isset($_POST['submit'])) {
    // get updated form data
    $p_id = filter_var($_POST['p_id'], FILTER_SANITIZE_NUMBER_INT);
    $d_id = filter_var($_POST['d_id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT); 
    $l_price = filter_var($_POST['l_price'], FILTER_SANITIZE_NUMBER_INT);
    $h_price = filter_var($_POST['h_price'], FILTER_SANITIZE_NUMBER_INT);
    

        // check for valid input
        if (!$name) {
        $_SESSION['edit-district'] = "Invalid form input on edit district page.";
        }
        elseif (!$category_id) {
            $_SESSION['edit-district'] = "Invalid form input on edit district page.";
            }
        elseif (!$l_price) {
                $_SESSION['edit-district'] = "Invalid form input on edit district page.";
        } 
        elseif (!$h_price) {
            $_SESSION['edit-district'] = "Invalid form input on edit district page.";
        } else {
        // update Product
            $query="UPDATE products SET name='$name', category_id='$category_id', lowest_price='$l_price', highest_price='$h_price' WHERE p_id=$p_id LIMIT 1";
            $result = mysqli_query($connection, $query);
            if (mysqli_errno($connection)) {
                $_SESSION['edit-district'] = "Failed to update district.";
            }else{
                $_SESSION['edit-district-success'] = "Product $name updated Successfully.";
            }
        }
}

    
header('location: ' . ROOT_URL . 'admin/view-products.php?d_id='.$d_id);
die();
