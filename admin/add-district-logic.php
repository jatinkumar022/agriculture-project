<?php
require 'config/database.php';
if(isset($_POST['submit'])) {
    // get form data
    $author_id = $_SESSION['user-id'];
    $d_name = filter_var($_POST['d_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);   
    if(!$d_name) {
        $_SESSION['add-district'] = "Enter District Name"; 
    } elseif (!$description) {
        $_SESSION['add-district'] = "Enter Description";
    }
    
    // redirect back to add district page with form data if there was invalid input 
    if(isset($_SESSION['add-district'])) {
        $_SESSION['add-district-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-district.php');
        die();
                   
    } else{
        // insert district into database
        $query = "INSERT INTO district (d_name, description, user_id) VALUES('$d_name', '$description', '$author_id')"; 
        $result = mysqli_query($connection, $query);
        if (mysqli_errno($connection)){ 
            $_SESSION['add-district'] = "Couldn't add district";
            header('location: '. ROOT_URL . 'admin/add-district.php');
            die();
        } else {
            $_SESSION['add-district-success'] = "District $d_name added successfully"; 
            header('location: ' . ROOT_URL . 'admin/manage-sellers.php');
            die();
        } 
    }    
}