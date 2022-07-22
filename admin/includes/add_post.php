<?php include "db.php";?>
<?php 
$sql = "SELECT * FROM categories";
$result = mysqli_query($connect,$sql);
?>

<div class="container">
<div class="row">
  <h2>Add Post</h2>
  <div class="col-sm-12 col-lg-7">
    <form action="includes/functions.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Post title</label>
        <input type="text" name="title" placeholder="Post Title" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Post Author</label>
        <input type="text" name="author" placeholder="Post Author" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Post Category</label>
      <select class="form-control" name="categ">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
         $cat_tit = $row['cat_title'];
         echo "<option value='$cat_tit'>$cat_tit</option>";
          }
         ?>
      </select>
      </div>
      <div class="form-group">
        <label for="">Post Category ID</label>
      <select class="form-control" name="categ_id">
       <?php 
       $sql = "SELECT * FROM categories";
       $result = mysqli_query($connect,$sql);
       while ($row = mysqli_fetch_assoc($result)) {
        $cat_id = $row['cat_id'];
        $cat_tit = $row['cat_title'];
        echo "<option value='$cat_id'>$cat_id - $cat_tit</option>";
       }
       
       ?>
      </select>
      </div>
      <div class="form-group">
        <label for="">Post Content</label>
        <textarea name="content" rows="8" cols="80" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="">Post Tags</label>
        <input type="text" name="taggs" placeholder="Seperate tags with a comma (,)" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Post Status</label>
      <select class="form-control" name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>
      </div>
      <div class="form-group">
        <label for="">Post Image</label>
        <input type="file" name="images"  class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" name="push_post" value="Publish Post"  class="btn btn-primary">
      </div>
    </form>
  </div>
</div>

</div>
