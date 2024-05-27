<?php
require 'partials/header.php';
if (isset($_GET['search_district']) && isset($_GET['submit'])) {
    $search = filter_var($_GET['search_district'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $query = "SELECT * FROM district WHERE d_name LIKE '%$search%'";
    $districts = mysqli_query($connection, $query);
  } else {
    header('location: ' . ROOT_URL . 'price.php'); 
    die();                                
}



?>


<a href="<?= ROOT_URL ?>price.php" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
   </a>

<section class="search__bar">
    <form class="container search__bar-container" action="<?= ROOT_URL ?>search-district.php" method="GET">
         <div>
             <i class="uil uil-search"></i>
             <input type="search" name="search_district" placeholder="Search">
         </div>           
            <button type="submit" name="submit" class="btn">Go</button>
     </form>
 </section>

<?php if (mysqli_num_rows($districts) > 0) : ?>


<section class="posts section__extra-margin">
    <div class="container posts__container">
        <?php while ($district = mysqli_fetch_assoc($districts)) : ?>
            <article class="districts">
        


               
        <a href="<?= ROOT_URL ?>single-product.php?d_id=<?= $district['d_id'] ?>" class="district__title" ><?= $district['d_name'] ?></a>

    
     
         </article>
        <?php endwhile ?>
        
        
        </div>
    </section>
    <?php else : ?>
        <div class="alert__message error lg section__extra-margin">
            <p>No District found</p>
        </div>
        <?php endif ?>
     <!--================================= END OF District =============================== -->

     <section class="category__buttons">
        <div class="container category__buttons-container"> 
            <?php
            $all_categories_query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection, $all_categories_query); 
            ?>
            <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
                <a href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>  
            <?php endwhile ?>          
        
            </div> 
      </section>

      <!--================================= END OF CATEGORIES BUTTON =============================== -->
     <?php include 'partials/footer.php'; ?>