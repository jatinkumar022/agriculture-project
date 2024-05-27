<?php
require 'config/database.php'; 
?>
<footer>
            <div class="footer__socials">
                <a href="https://youtube.com"  target="_blank"><i class="uil uil-youtube"></i></a>
                <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a> 
                <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram-alt"></i></a>
                <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="uil uil-twitter"></i></a> 
            </div>
       
         <div class="container footer__container">
            <article>
                <h4>Categories</h4>
                <ul>
                <?php
            $all_categories_query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection, $all_categories_query); 
            ?>


                <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
                  
            
                   <li><a href="<?= ROOT_URL ?>category-post.php?id=<?= $category['id'] ?>"><?= $category['title'] ?></a></li>
                   <?php endwhile ?> 
                   
                    </ul>
              </article>
              <article>
                <h4>Support</h4>
                <ul>
                   <li><a href="">Online Support</a></li>
                   <li><a href="">Call Numbers</a></li> 
                   <li><a href="">Email</a></li>
                   <li><a href="">Social Support</a></li>
                   <li><a href="">Location</a></li> 
                   
                    </ul>
              </article>
               <article>
                <h4>News</h4>
                <ul>
                   <li><a href="">Safety</a></li>
                   <li><a href="">Repair</a></li> 
                   <li><a href="">Recent</a></li>
                   <li><a href="">Popular</a></li>
                   <li><a href="">Categories</a></li> 
                  
                    </ul>
              </article>
              <article>
                <h4>Permalinks</h4>
                <ul>
                   <li><a href="<?= ROOT_URL ?>">Home</a></li>
                   <li><a href="<?= ROOT_URL ?>price.php">Price</a></li> 
                   <li><a href="<?= ROOT_URL ?>news.php">News</a></li> 
                   <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                   <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
                   <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li> 
                  
                    </ul>
              </article>
              </div>
              <div class="footer__copyright">
                <small>Copyright &copy; 2022 AGRICULTURE MARKETING</small>
              </div>
     </footer>
<script src="<?= ROOT_URL ?>js/main.js"></script>
</body>
</html>