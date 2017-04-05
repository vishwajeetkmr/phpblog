<?php
include "../libs/config.php";
include "../libs/database.php";
include "../functions.php";

$db = new database();

$query = "SELECT * FROM categories";

$cats = $db->select($query);

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
            <form action="add_post.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Post Title:</label>
    <input type="text" name="title" class="form-control"  placeholder="Enter a title">
  </div>
                <div class="form-group">
                <label>Post Content:</label>    
                <textarea class="form-control" rows="3" name="content" placeholder="content"></textarea>
                <br>
                <select class="form-control" name="cat">
  <option>Select a Category</option>
<?php while($row = $cats->fetch_array()) : ?>                     <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
<?php endwhile; ?>                    
</select>
                
  <div class="form-group">
    <label>Author Name:</label>
    <input type="text" name="author" class="form-control"  placeholder="Enter Author Name">
  </div>
  <div class="form-group">
    <label>Post Image:</label>
    <input type="file" name="image">
  </div>
                
    <div class="form-group">
    <label>Tags:</label>
    <input type="text" class="form-control"  placeholder="Enter Text" name="tags">
  </div>            
                
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
    <a href="index.php" class="btn btn-danger">Cancel</a>                
</form>
            
        </div><!-- /.blog-main -->
        <?php "includes/footer.php" ?>  