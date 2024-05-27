<?php
require 'config/database.php';
if (isset($_GET['d_id'])) {
    $d_id = filter_var($_GET['d_id'], FILTER_SANITIZE_NUMBER_INT);
   
   
        if (!mysqli_errno($connection)){
            //delete district
            $query= "DELETE FROM district WHERE d_id=$d_id LIMIT 1";
            $result = mysqli_query($connection, $query);
            $_SESSION['delete-distict-success'] = "District deleted successfully."; 
        } 
    }                   
                                  

header('location: ' . ROOT_URL . 'admin/manage-sellers.php');
die();