<?php    
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    if(!empty($parts['query'])){
      parse_str($parts['query'], $query);
      if(!empty($query['id'])){
        $id =  $query['id'];
        $id = intval($id);
      }
    }
    $model = new EditModel();
    $query = "SELECT * FROM blog_posts where id = ".$id;
    $model->query($query);
    $result = $model->resultSet();
?>

<nav class="navbar navbar-default" id="second-navbar">
  <div class="container">
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
      <?php if(isset($_SESSION['is_logged_in_admin'])) : ?>
        <li><a href="<?php echo ROOT_URL; ?>blog/add">ADD A BLOG POST</a></li>
      <?php endif; ?>  
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
<div class="container" id="profile">
  <?php foreach($result as $item) : ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Edit an article</h3>
      </div>
      <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
          <div class="form-group">
            <label>Share Title</label>
            <input type="text" name="title" class="form-control" required value="<?php echo $item['title']; ?>" />
          </div>
          <div class="form-group">
            <label>Text</label>
            <textarea rows="20" name="content" class="form-control" required><?php echo $item['content']; ?></textarea>
          </div>
          <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control"  required
                        value="<?php echo $item['author']; ?>"/>
          </div>
            <div class="form-group">
                <label>Image URL</label>
                <input type="text" name="image_name" class="form-control" required
                        value="<?php echo $item['image_name']; ?>" />
            </div>
          <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
            <a class="btn btn-danger" href="<?php echo ROOT_URL; ?>">Cancel</a>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
</div>