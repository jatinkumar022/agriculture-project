<?php include 'partials/header.php'; 

//fetch categories from database
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);



// fetch post data from database if id is set 
if (isset($_GET['p_id'])) {
   $p_id = filter_var($_GET['p_id'], FILTER_SANITIZE_NUMBER_INT); 
   $d_id = filter_var($_GET['d_id'], FILTER_SANITIZE_NUMBER_INT);
   $query = "SELECT * FROM products WHERE p_id=$p_id"; 
   $result = mysqli_query($connection, $query); 
   $product = mysqli_fetch_assoc($result); 
} else {
   header('location: ' . ROOT_URL . 'admin/manage-sellers.php');
   die();
}

?>
    <a href="<?= ROOT_URL ?>admin/view-products.php?d_id=<?= $product['d_id']; ?>" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
   </a>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Product</h2>
        
        <form action="<?= ROOT_URL ?>admin/edit-product-logic.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="p_id" value="<?= $product['p_id'] ?>">
        <input type="hidden" name="d_id" value="<?= $product['d_id'] ?>">
             <label><b>Name of Product</b></label> 
             <input type="text" value="<?= $product['name'] ?>" name="name" placeholder="Name">
             <br>
             <label>Select Category</label> 
             <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                <option value="<?=$category['id']; ?>"<?php if($category['id']==$product['category_id']){ echo "selected"; }?>><?= $category['title']; ?></option>
                <?php endwhile ?>
             </select>
             <label>Lowest Price(₹)</label>
             <input type="text" value="<?= $product['lowest_price'] ?>" name="l_price" placeholder="Lowest Price"> 
             <label>Highest Price(₹)</label>
             <input type="text" value="<?= $product['highest_price'] ?>" name="h_price" placeholder="Highest Price"> 
            
             
             
            
             <button type="submit" name="submit" class="btn">Update  Product</button>
            
         </form>
    </div>
<section>                                                                    
   
    

<?php include '../partials/footer.php'; ?>