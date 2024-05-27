<?php include 'partials/header.php';

//fetch categories from the database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

//fetch district from the database
$d_query = "SELECT * FROM district";
$districts = mysqli_query($connection, $d_query);

// Get back form data if form was invalid
$name = $_SESSION['add-product-data']['name'] ?? null;
$lowest_price = $_SESSION['add-product-data']['lowest_price'] ?? null;
$highest_price = $_SESSION['add-product-data']['highest_price'] ?? null;
unset($_SESSION['add-product-data']);
?>

<a href="<?= ROOT_URL ?>admin/manage-sellers.php" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
   </a>
    
<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Product</h2>
        
        <?php if (isset($_SESSION['add-product'])) : ?>
          <div class="alert__message error">
            <p>
              <?= $_SESSION['add-product'];
               unset($_SESSION['add-product']);
              ?>
            </p>
         </div>
         <?php endif ?>
       <form action="<?= ROOT_URL ?>admin/add-product-logic.php" enctype="multipart/form-data" method="POST">
             <label><b>Name of Product</b></label> 
             <input type="text" value="<?= $name ?>" name="name" placeholder="Name">
             <br>
             <label>Select Category</label> 
             <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                <option value="<?= $category['id']; ?>"><?= $category['title']; ?></option>
                <?php endwhile ?>
             </select>
             <label>Select District</label> 
             <select name="district">
                <?php while ($district = mysqli_fetch_assoc($districts)): ?>
                <option value="<?= $district['d_id']; ?>"><?= $district['d_name']; ?></option>
                <?php endwhile ?>
             </select>
             <label>Lowest Price(₹)</label>
             <input type="text" value="<?= $lowest_price ?>" name="l_price" placeholder="Lowest Price"> 
             <label>Highest Price(₹)</label>
             <input type="text" value="<?= $highest_price ?>" name="h_price" placeholder="Highest Price"> 
            
             
             
            
             <button type="submit" name="submit" class="btn">Add Product</button>
            
         </form>
    </div>
<section>                                                                    
   
    

<?php include '../partials/footer.php'; ?>