<?php include 'partials/header.php';
if(isset($_GET['d_id'])) {
    $d_id = filter_var($_GET['d_id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM district WHERE d_id=$d_id"; 
    $districts = mysqli_query($connection, $query);
    $district = mysqli_fetch_assoc($districts);

   

    $query = "SELECT * FROM products WHERE d_id=$d_id"; 
    $products = mysqli_query($connection, $query);
  

}

?>





<section class="dashboard">
<?php if (isset($_SESSION['add-district-success'])) : //show if add district success ?>
          <div class="alert__message success container">
            <p>
              <?= $_SESSION['add-district-success'];
               unset($_SESSION['add-district-success']);
              ?>
            </p>
          </div>
<?php elseif (isset($_SESSION['edit-district-success'])) : //show if edit district success ?>
          <div class="alert__message success container">
            <p>
              <?= $_SESSION['edit-district-success'];
               unset($_SESSION['edit-district-success']);
              ?>
            </p>
          </div>
<?php elseif (isset($_SESSION['edit-district'])) : //show if edit district NOT success ?>
          <div class="alert__message error container">
            <p>
              <?= $_SESSION['edit-district'];
               unset($_SESSION['edit-district']);
              ?>
            </p>
          </div>
<?php elseif (isset($_SESSION['delete-district'])) : //show if delete district not success ?>
          <div class="alert__message error container">
            <p>
              <?= $_SESSION['delete-district'];
               unset($_SESSION['delete-district']);
              ?>
            </p>
          </div>
<?php elseif (isset($_SESSION['delete-district-success'])) : //show if delete district success ?>
          <div class="alert__message success container">
            <p>
              <?= $_SESSION['delete-district-success'];
               unset($_SESSION['delete-district-success']);
              ?>
            </p>
          </div>
<?php endif ?>





<a href="<?= ROOT_URL ?>admin/manage-sellers.php" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
   </a>

    <div class="container dashboard__container">
       <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
       <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
         <aside>
            <ul>
               <li>
                  <a href="add-post.php"><i class="uil uil-pen"></i>
                      <h5>Add Post</h5>
                  </a>
                </li>
                <li>
                    <a href="index.php"><i class="uil uil-postcard"></i>
                        <h5>Manage Post</h5>
                    </a>
                  </li>
                  







                  <li>
                    <a href="add-product.php"><i class="uil uil-panel-add"></i>
                      <h5>Add Product</h5>
                    </a>
                  </li>
  
                <li>
                    <a href="manage-sellers.php" class="active"><i class="uil uil-rupee-sign"></i>
                        <h5>Manage Sellers</h5>
                    </a>
                  </li>
                  <li>
                    <a href="add-district.php"><i class="uil uil-airplay"></i>
                      <h5>Add District</h5>
                    </a>
                  </li>
                    


                  <?php if (isset($_SESSION['user_is_admin'])): ?>



                  <li>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a>
                  </li>
                  <li>
                    <a href="manage-users.php"><i class="uil uil-users-alt"></i>
                        <h5>Manage Users</h5>
                    </a>
                  </li>
                  <li>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a>
                    <li>
                        <a href="Manage-categories.php"><i class="uil uil-list-ul"></i>
                            <h5>Manage Categories</h5>
                        </a>
                      </li>
                  </li>
                  <?php endif ?>
            </ul>
         </aside>
           <!--================================= END OF SIDEBAR =============================== -->
           <main>
           
            <h2><?= $district['d_name'] ?></h2>
            <?php if(mysqli_num_rows($products) > 0) : ?>
            <table>
              <thead>
                  <tr>
                        
                        <th>Name</th>
                        <th>Lowest Price</th>
                        <th>Highest Price</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>

                  </tr>
             </thead>
             <tbody>
                    <?php while($product = mysqli_fetch_assoc($products)) : ?>
                   <tr>
                     
                     <td><?= $product['name'] ?></td>
                     <td><?= $product['lowest_price'] ?></td>
                     <td><?= $product['highest_price'] ?></td>
                     
                     <?php 
                     $category_id=$product['category_id'];
                      $query = "SELECT * FROM categories WHERE id=$category_id"; 
                      $categories = mysqli_query($connection, $query);
                      $category = mysqli_fetch_assoc($categories);
                     
                     ?>
                    <td><?= $category['title'] ?></td>
                     <td><a href="<?= ROOT_URL ?>admin/edit-product.php?p_id=<?= $product['p_id'] ?>" class="btn sm">Edit</a></td>
                     <td><a href="<?= ROOT_URL ?>admin/delete-product.php?p_id=<?= $product['p_id'] ?>" class="btn sm danger">Delete</a></td>    
                          
                        
                   </tr>
                    <?php endwhile ?>
                </tbody>
             </table>
             <?php else :?>
                  <div class="alert__message error"><?= "No Products Found!"?></div>
                  <?php endif ?>
            
            </main>
        </div>
 </section>
          

 <?php include '../partials/footer.php'; ?>
