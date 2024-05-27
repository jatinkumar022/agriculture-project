<?php include 'partials/header.php'; 

// fetch posts if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM products WHERE category_id=$id ORDER BY date_time DESC"; 
    $products = mysqli_query($connection, $query);
} else {
    header('location: ' . ROOT_URL . 'price.php'); 
    die();
}

    // fetch category from categories table using category_id of post 
    $category_id = $id; 
    $category_query = "SELECT * FROM categories WHERE id=$id"; 
    $category_result = mysqli_query($connection, $category_query);
    $category = mysqli_fetch_assoc($category_result);
    


?>

<header class="category__title">
    <h2><?= $category['title'] ?></h2>
</header>
<!-- ================================= END OF CATEGORY TITLE ===============================  -->


<?php if (mysqli_num_rows($products) > 0) : ?>
    <section class="singleproduct">



<div class="container singlepost__container singleproduct">

<a href="<?= ROOT_URL ?>price.php" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
</a>
        <h2><?=  $category['title'] ?> MarketYard Price</h2>
        
         <div class="border"><h1> </h1> </div>
        
    
       

        <h4><small> 20KG </small></h4>


        
            <table>
           
            <thead>
                
                <tr>
                
                        <th>Name</th>
                        <th>Lowest Price</th>
                        <th>Highest Price</th>
                        <th>District</th>
                        <th>Date</th>
                        
                        
                </tr>
            </thead>
            <tbody>
                <?php while($product = mysqli_fetch_assoc($products)) : ?>
                 
               <tr>
                 
                 <td><?= $product['name'] ?></td>
                 <td><?= $product['lowest_price'] ?></td>
                 <td><?= $product['highest_price'] ?></td>

                 <?php 
                 $d_id=$product['d_id'];
                    $query_d = "SELECT * FROM district WHERE d_id=$d_id"; 
                    $districts = mysqli_query($connection, $query_d);
                    $district = mysqli_fetch_assoc($districts);
                ?>

                 <td><?= $district['d_name'] ?></td>

                 <?php 
                    $query = "SELECT * FROM products WHERE d_id=$d_id"; 
                    $date_times = mysqli_query($connection, $query);
                    $date_time = mysqli_fetch_assoc($date_times);
                    ?>




                 <td> <?= date("d/m/Y", strtotime($date_time['date_time'])) ?></td>
                 
                 
                    
               </tr>
                <?php endwhile ?>
            </tbody>

            </table>
            
</div>
 
</section>
    <?php else : ?>
        <div class="alert__message error lg">
            <p>No Products found for this category</p>
        </div>
        <?php endif ?>
    <!--================================= END OF POSTS =============================== -->

    <section class="category__buttons">
        <div class="container category__buttons-container"> 
            <?php
            $all_categories_query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection, $all_categories_query); 
            ?>
            <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
                <a href="<?= ROOT_URL ?>category-product.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>  
            <?php endwhile ?>          
        
            </div> 
      </section>

      <!--================================= END OF CATEGORIES BUTTON =============================== -->

      <?php include 'partials/footer.php'; ?>
