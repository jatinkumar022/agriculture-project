<?php include 'partials/header.php';

// fetch post from database if id is set
if (isset($_GET['d_id'])) {
  $d_id = filter_var($_GET['d_id'], FILTER_SANITIZE_NUMBER_INT); 
  $query = "SELECT * FROM products WHERE d_id=$d_id"; 
  $products = mysqli_query($connection, $query);
  

  $query_d = "SELECT * FROM district WHERE d_id=$d_id"; 
  $districts = mysqli_query($connection, $query_d);
  $district = mysqli_fetch_assoc($districts);

  
} else {
  header('location: ' . ROOT_URL . 'price.php'); 
  die();
}

?>




<section class="singleproduct">



    <div class="container singlepost__container singleproduct">
    
   <a href="<?= ROOT_URL ?>price.php" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
   </a>
            <h2><?= $district['d_name'] ?> MarketYard Price</h2>
            
             <div class="border"><h1> </h1> </div>
             <?php if(mysqli_num_rows($products) > 0) : ?>
            <?php 
            $query = "SELECT * FROM products WHERE d_id=$d_id"; 
            $date_times = mysqli_query($connection, $query);
            $date_time = mysqli_fetch_assoc($date_times);
            ?>
        <h4> Date: <?= date("d/m/Y", strtotime($date_time['date_time'])) ?> </h4>
        <h4> <?= date("l", strtotime($date_time['date_time'])) ?> </h4>
        

           

            <h4><small> 20KG </small></h4>


            
                <table>
               
                <thead>
                    
                    <tr>
                    
                            <th>Name</th>
                            <th>Lowest Price</th>
                            <th>Highest Price</th>
                            <th>Category</th>
                           
                            
                    </tr>
                </thead>
                <tbody>
                    <?php while($product = mysqli_fetch_assoc($products)) : ?>
                      <?php 
                     $category_id=$product['category_id'];
                      $query = "SELECT * FROM categories WHERE id=$category_id"; 
                      $categories = mysqli_query($connection, $query);
                      $category = mysqli_fetch_assoc($categories);
                     
                     ?>
                   <tr>
                     
                     <td><?= $product['name'] ?></td>
                     <td><?= $product['lowest_price'] ?></td>
                     <td><?= $product['highest_price'] ?></td>
                     <td><?= $category['title']?> </td>
                     
                        
                   </tr>
                    <?php endwhile ?>
                </tbody>

                </table>
                <?php else : ?>
                  <div class="alert__message error"><?= "No products Found!"?></div>
                  

                  <?php endif ?> 
    </div>
     
</section>

<!--================================= END OF SINGLE POST =============================== -->
<?php include 'partials/footer.php'; ?>
