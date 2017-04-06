<?php
include "../libs/config.php";
include "../libs/database.php";
include "../functions.php";

$db = new database();

$id = $_GET['id'];

$query = "SELECT * FROM categories WHERE id='$id'";

$cats = $db->select($query);

$single = $cats->fetch_array(); 

if(isset($_POST['update'])){
    
    $title = $_POST['title'];
    
    if($title==''){
        echo "Please fill in all the fields";
    }else{
        $query = "UPDATE categories SET title='$title' WHERE id='$id'";
        $run = $db->update($query);
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../styles/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../styles/custom.css" rel="stylesheet">

  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add New Post</a>
          <a class="blog-nav-item" href="add_category.php">Add New Category</a>
          <a class="blog-nav-item pull-right" href="../index.php">View Blog</a>
          <a class="blog-nav-item pull-right" href="logout.php">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="col-sm-12 blog-main">
            <br>
            <form action="edit_category.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Category Title:</label>
    <input type="text" name="title" class="form-control"  placeholder="Enter a title" value="<?php echo  $single['title']; ?>">
  </div>            
                
  <button type="submit" class="btn btn-default" name="update">Update</button>
    <a href="index.php" class="btn btn-success">Cancel</a>
    <a href="delete_cat.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>                
</form>
            
        </div><!-- /.blog-main -->
        <?php "includes/footer.php" ?>  