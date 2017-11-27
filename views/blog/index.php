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

<div class="container">

  <h1>Blog articles</h1>

  <p>

    Morbi sit amet interdum risus. Praesent ipsum lacus, viverra at nisl in, maximus pharetra eros. Ut pretium, ligula et semper pharetra, justo nisl tempus nisl, finibus semper mauris arcu id lorem. Mauris nec urna sem. Vestibulum volutpat felis in massa ornare, a ornare sapien ultricies. Morbi in quam nunc. In ultrices orci at mi laoreet, id congue augue porta. Vestibulum ut neque eget lorem finibus lacinia. Sed sed luctus ante, et scelerisque leo. Nulla ut pharetra lorem.

  </p>

</div>



<div class="container">

  <?php foreach($viewmodel as $item) : ?>

    <div class="col-md-12">

        <h3><?php echo $item['title']; ?></h3>

        <img src="<?php echo $item['image_name']?>" alt="post img" class="pull-left margin20 width-15">

        <div class="text_clamp">

          <p><?php echo $item['content']; ?></p>

        </div> 

        <br>

        <?php if(isset($_SESSION['is_logged_in_admin'])) : ?>

          <a class="edit_blog" href="<?php echo ROOT_PATH; ?>blog/edit/?id=<?php echo $item['id']?>">

            <img alt="edit-button" src="/assets/images/edit.jpg">

          </a>

        <?php endif; ?>

        <a class="btn btn-primary btn-sm readmore_btn" href="<?php echo ROOT_URL; ?>blog/post/?id=<?php echo $item['id']?>" role="button">Read more</a>

        <br>

        <hr>

    </div>

  <?php endforeach; ?>

</div>

