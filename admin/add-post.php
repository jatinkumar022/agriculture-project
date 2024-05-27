<?php include 'partials/header.php';

//fetch categories from the database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

// Get back form data if form was invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']);
?>

<a href="<?= ROOT_URL ?>admin/index.php" ><button class="btn__close"><i class="uil uil-arrow-left"></i></button>
   </a>
    
<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        
        <?php if (isset($_SESSION['add-post'])) : ?>
          <div class="alert__message error">
            <p>
              <?= $_SESSION['add-post'];
               unset($_SESSION['add-post']);
              ?>
            </p>
         </div>
         <?php endif ?>
       <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
             <input type="text" value="<?= $title ?>" name="title" placeholder="title"> 
             <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                <option value="<?= $category['id']; ?>"><?= $category['title']; ?></option>
                <?php endwhile ?>
             </select>
            
             <textarea rows="10" name="body" placeholder="Body"><?= $body ?></textarea>
             <?php if(isset($_SESSION['user_is_admin'])) : ?>
             <div class="form__control inline">
                <input type="checkbox" name="is_featured" value="1" id="is__featured" checked>
                <label for="is__featured">Featured</label>
             </div>
             <?php endif ?>
             <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
             </div>
             <button type="submit" name="submit" class="btn">Add Post</button>
            
         </form>
    </div>
<section>                                                                    
   
    

<?php include '../partials/footer.php'; ?>