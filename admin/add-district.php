<?php include 'partials/header.php';

//get back form data if invalid
$d_name = $_SESSION['add-district-data']['d_name'] ?? null;
$description = $_SESSION['add-district-data']['description'] ?? null;

unset($_SESSION['add-district-data']);
                
?>   

<a href="<?= ROOT_URL ?>admin/manage-sellers.php" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
   </a>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Add District</h2>
       <?php if(isset($_SESSION['add-district'])) : ?>
        <div class="alert__message error">
            <p>
                <?= $_SESSION['add-district'];
                unset($_SESSION['add-district']);?>
            </p>
        </div>
        <?php endif ?>
       <form action="<?= ROOT_URL ?>admin/add-district-logic.php" method="POST">
             <input type="text" value="<?= $d_name ?>" name="d_name" placeholder="District Name">
              
             <textarea rows="4" value= "<?= $description ?>" name="description" placeholder="Description"><?= $description ?></textarea>
             <button type="submit" name="submit" class="btn">Add District</button>
            
         </form>
    </div>
<section>                                                                    
   
    
<?php include '../partials/footer.php'; ?>