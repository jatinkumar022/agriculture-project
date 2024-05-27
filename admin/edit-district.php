<?php include 'partials/header.php';


if(isset($_GET['d_id'])) {
    $d_id = filter_var($_GET['d_id'], FILTER_SANITIZE_NUMBER_INT);
   
    //fetch district from the database    
    $query = "SELECT * FROM district WHERE d_id=$d_id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1) {
        $district = mysqli_fetch_assoc($result);
     }

} 
else {
    header('location: ' . ROOT_URL . 'admin/manage-sellers.php');
    die();
}
?>
<a href="<?= ROOT_URL ?>admin/manage-sellers.php" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
   </a>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit District</h2>
        
       <form action="<?= ROOT_URL ?>admin/edit-district-logic.php" method="POST">
             <input type="hidden" name="d_id" value="<?= $district['d_id'] ?>"> 
             <input type="text" name="d_name" value="<?= $district['d_name'] ?>" placeholder="District name">
             <textarea rows="4" name="description" placeholder="Description"><?= $district['description'] ?></textarea>
             <button type="submit" name="submit" class="btn">Update District</button>
            
         </form>
    </div>
<section>                                                                    
   
    
<?php include '../partials/footer.php'; ?>