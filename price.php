<?php include 'partials/header.php';


//fetch all posts from posts table
$query= "SELECT * FROM district"; 
$districts = mysqli_query($connection, $query);
?> 

<a href="<?= ROOT_URL ?>" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
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
 <!--================================= END OF SEARCHS =============================== -->

 <section class="posts">
    <div class="container posts__container">
        <?php while ($district = mysqli_fetch_assoc($districts)) : ?>
        <article class="districts">
        


               
            <a href="<?= ROOT_URL ?>single-product.php?d_id=<?= $district['d_id'] ?>" class="district__title" ><?= $district['d_name'] ?></a>

        
         
        </article>
        <?php endwhile ?>
        
        
        </div>
    </section>
    <!--================================= END OF district =============================== -->

    <section class="category__buttons">
        <div class="container category__buttons-container"> 
            <?php
            $all_categories_query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection, $all_categories_query); 
            ?>
            <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
                <?php if($category['id']!=19){?>
                   <a href="<?= ROOT_URL ?>category-product.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
               <?php } ?>
                 
            <?php endwhile ?>          
        
            </div> 
      </section>

      <!--================================= END OF CATEGORIES BUTTON =============================== -->

      <?php include 'partials/footer.php'; ?>