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
    $query = "SELECT * FROM comments where post_id = ".$id." order by added_time desc";
    $model->query($query);
    $result = $model->resultSet();

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    $id = $query['id'];
    $model = new EditModel();
    $query = "SELECT * FROM blog_posts where id=".$id;
    $model->query($query);
    $rows = $model->resultSet();
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
<div class="container post">
  <?php foreach($rows as $item) : ?>
    <div class="col-md-12">
        <h3><?php echo $item['title']; ?></h3>
        <img src="<?php echo $item['image_name']?>" alt="post img" class="pull-left margin20 width-25">
        <p><?php echo $item['content']; ?></p>
    </div>
  <?php endforeach; ?>
</div>
<?php if(isset($_SESSION['is_logged_in'])) : ?>
  <div class="container post">
    <div class="panel panel-white panel-shadow comment-margin">
      <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" accept-charset="utf-8">
        <div class="form-group">
          <label>Add comment</label>
          <textarea rows="5" name="comment" class="form-control" required></textarea>
        </div>
        <input class="btn btn-primary" name="submit" type="submit" value="Add comment" />
      </form>
    </div>
  </div>
<?php endif; ?>

<div class="container post">
  <?php foreach($result as $item) : ?>
    <?php 
      $user_id = $item['user_id'];
      $model = new EditModel();
      $query = "SELECT * FROM users where id=".$user_id;
      $model->query($query);
      $user_info = $model->resultSet();
      foreach ($user_info as $object) {
        $username = $object['name'];
        $image_name = $object['image_url'];
      }
  ?>
  <div class="panel panel-white panel-shadow">
    <div class="post-heading">
      <div class="pull-left image">
        <img src="
        <?php if(!empty($image_name)) : ?>
            <?php echo $image_name;?>
        <?php else : ?> 
            <?php echo "https://spaceacre.co.za/wp-content/uploads/avatar-1.png";?>
        <?php endif; ?>
        " class="img-circle avatar" alt="user profile image">
      </div>
      <div class="pull-left meta">
        <div class="title h5">
          <b><?php echo $username;?></b> made a comment.
        </div>
        <h6 class="text-muted time"><?php echo $item['added_time']?></h6>
      </div>
      <?php if(isset($_SESSION['is_logged_in_admin']) || $_SESSION['user_data']['id'] == $user_id) : ?>
        <div class="pull-right meta">
          <form method="post" action="<?php echo ROOT_URL;?>blog/delete/?id=<?php echo $id?>&comment_id=<?php echo $item['id']?>">
            <input type="image" src="/assets/images/delete_icon.png" width="20px" name="delete">  
          </form>
        </div>
      <?php endif; ?>
    </div> 
    <div class="post-description"> 
      <p><?php echo $item['comment']?></p>
    </div>
  </div>
  <?php endforeach; ?>
</div>