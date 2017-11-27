<?php Messages::display(); ?>
<div class="container" id="login">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Admin Login</h3>
    </div>
    <div class="panel-body">
      <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
      	<div class="form-group">
      		<label>Name</label>
      		<input type="text" name="username" class="form-control" />
      	</div>
      	<div class="form-group">
      		<label>Password</label>
      		<input type="password" name="password" class="form-control" />
      	</div>
      	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
      </form>
    </div>
  </div>
</div>