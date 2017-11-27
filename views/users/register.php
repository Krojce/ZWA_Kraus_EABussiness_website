
<nav class="navbar navbar-default" id="second-navbar">
  <div class="container">
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
     <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <li><a href="<?php echo ROOT_URL; ?>users/logout">LOGOUT</a></li>
        <li><a href="<?php echo ROOT_URL; ?>blog/profile">PROFILE</a></li>
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
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Register User</h3>
    </div>
    <div class="panel-body">
      <form id="submit-register" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
      	<div class="form-group">
      		<label>Name</label>
      		<input type="text" name="name" class="form-control" id="register-name" 
                     value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['name']);} ?>" required pattern="[a-zA-Z0-9]+">
      	</div>
      	<div class="form-group">
      		<label>Email</label>
      		<input type="text" name="email" class="form-control" id="register-email" 
                     value="<?php if(isset($_POST['email'])){echo htmlspecialchars($_POST['email']);} ?>" required>
      	</div>
      	<div class="form-group">
      		<label>Password</label>
      		<input type="password" name="password" class="form-control" id="register-password" required pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})">
      	</div>
      	<input class="btn btn-primary" name="submit" type="submit" value="register">
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    document.getElementById("submit-register").addEventListener("submit", registerValidation)
</script>