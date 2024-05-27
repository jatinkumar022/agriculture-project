<?php
require 'config/database.php';


if (isset($_POST['submit'])) {
    // get updated form data
    $d_id = filter_var($_POST['d_id'], FILTER_SANITIZE_NUMBER_INT);
    $d_name = filter_var($_POST['d_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    

        // check for valid input
        if (!$d_name || !$description) {
        $_SESSION['edit-district'] = "Invalid form input on edit district page.";
        } else {
        // update district
            $query="UPDATE district SET d_name='$d_name', description='$description' WHERE d_id=$d_id LIMIT 1";
            $result = mysqli_query($connection, $query);
            if (mysqli_errno($connection)) {
                $_SESSION['edit-district'] = "Failed to update district.";
            }else{
                $_SESSION['edit-district-success'] = "District $d_name updated Successfully.";
            }
        }
}

    
header('location: ' . ROOT_URL . 'admin/manage-sellers.php');
die();
