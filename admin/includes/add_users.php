<?php include "db.php";?>
<?php 
$sql = "SELECT * FROM categories";
$result = mysqli_query($connect,$sql);
?>

<div class="container">
<div class="row">
  <h2>Add Users</h2>
  <div class="col-sm-12 col-lg-7">
    <form action="../admin/Validator/validate.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="user_name" placeholder="Username" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="Email" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="text" name="Password" placeholder="Password" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Status</label>
      <select class="form-control" name="status">
        <option value="Admin">Admin</option>
        <option value="Editor">Editor</option>
      </select>
      </div>
      <div class="form-group">
        <input type="submit" name="Submit_btn" value="Submit"  class="btn btn-success" style="width:100%">
      </div>
    </form>
  </div>
</div>
</div>
