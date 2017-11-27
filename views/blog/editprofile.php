<?php    
    $id = $_SESSION['user_data']['id'];
    $model = new EditModel();
    $query = "SELECT * FROM users where id = ".$id;
    $model->query($query);
    $result = $model->resultSet();
?>

<nav class="navbar navbar-default" id="second-navbar">
  <div class="container">
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
      <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <li><a href="<?php echo ROOT_URL; ?>users/logout">LOGOUT</a></li>
        <li><a href="<?php echo ROOT_URL; ?>blog/profile"><?php echo strtoupper($_SESSION['user_data']['name']);?> PROFILE</a></li>
      <?php else : ?>
        <li><a href="<?php echo ROOT_URL; ?>users/login">LOGIN</a></li>
        <li><a href="<?php echo ROOT_URL; ?>users/register">REGISTRATION</a></li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<?php Messages::display(); ?>
<div class="container" id="login">
  <?php foreach($result as $item) : ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Edit your profile</h3>
    </div>
    <div class="panel-body">
      <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
        <div class="form-group">
          <label>Nickname*</label>
          <input type="text" name="name" class="form-control" required value="<?php echo $item['name']; ?>" />
        </div>
        <div class="form-group">
            <label>Email*</label>
            <input type="text" name="email" class="form-control" required value="<?php echo $item['email']; ?>" />
        </div>
        <div class="form-group">
          <label>Fullname</label>
          <input type="text" name="fullname" class="form-control" value="<?php echo $item['fullname']; ?>" />
        </div>
        <div class="form-group">
            <label>Birthdate</label>
            <input type="date" name="date_of_birth" class="form-control" value="<?php echo $item['date_of_birth']; ?>" />
        </div>
        <div class="form-group">
          <label>Profile image URL</label>
          <input type="text" name="image_url" class="form-control" value="<?php echo $item['image_url']; ?>" />
        </div>
        <div class="form-group">
            <label>Country</label><br>
            <input type="text" name="country" class="form-control" value="<?php echo $item['country']; ?>" />
        </div>
        <div class="form-group">
          <label>Job</label>
          <input type="text" name="job" class="form-control" value="<?php echo $item['job']; ?>" />
        </div>
        <div class="form-group">
            <label>Education</label>
            <input type="text" name="education" class="form-control" value="<?php echo $item['education']; ?>" />
        </div>
        <div class="form-group">
            <label>Personal Interests</label>
            <input type="text" name="personal_interest" class="form-control" value="<?php echo $item['personal_interest']; ?>" />
        </div>
        <div class="form-group">
            <label>Biography</label>
            <input type="text" name="biography" class="form-control" value="<?php echo $item['biography']; ?>" />
        </div>
        <input class="btn btn-primary" name="submit" type="submit" value="Save changes" />
          <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>blog/profile">Cancel</a>
      </form>
    </div>
  </div>
  <?php endforeach; ?>
</div>