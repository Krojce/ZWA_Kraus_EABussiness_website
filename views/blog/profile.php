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

<?php 

    foreach($viewmodel as $item) : 

?>

<div class="modal-body">

    <img alt="avatar-picture" src="

    <?php if(!empty($item["image_url"])) : ?>

        <?php echo $item["image_url"];?>

    <?php else : ?> 

        <?php echo "https://spaceacre.co.za/wp-content/uploads/avatar-1.png";?>

    <?php endif; ?>

    " class="img-circle">

    <h3 class="media-heading">

        <?php if(!empty($item["fullname"])) : ?>

            <?php echo $item["fullname"];?>

        <?php else : ?>

            <?php echo $item["name"];?>

        <?php endif; ?>            

        <?php if(!empty($item["country"])) : ?>

            <br>

            <small><?php echo $item["country"];?></small>

        <?php endif; ?>    

    </h3>

    <br>

    <a id="profile-edit" href="<?php echo ROOT_URL; ?>blog/editprofile">

        <img alt="edit-button" src="/assets/images/edit.jpg">Edit Profile

    </a>

    <br>

    <hr>

    <div class="container" id="profile">

        <?php if(!empty($item["fullname"])) : ?>

    	<p>

    		<strong>Full name: </strong>

        	<?php echo $item["fullname"];?>

    	</p>

        <?php endif; ?>

    	<p>

    		<strong>Nickname: </strong>

            <?php echo $item["name"];?>

        	

    	</p>

    	<p>

    		<strong>Email adress: </strong>

        	<?php echo $item["email"];?>

    	</p>

        <?php if(!empty($item["date_of_birth"])) : ?>
            <?php if(strtotime($item['date_of_birth']) > 0) : ?>
            	<p>
            		<strong>Date of Birth: </strong>
                	<?php echo $item["date_of_birth"];?>
            	</p>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(!empty($item["job"])) : ?>

        <hr>

    	<p>

    		<strong>Job: </strong>

        	<?php echo $item["job"];?>

    	</p>

        <?php endif; ?>

        <?php if(!empty($item["education"])) : ?>

    	<p>

    		<strong>Education: </strong>

        	<?php echo $item["education"];?>

    	</p>

        <?php endif; ?>

        <?php if(!empty($item["personal_interest"])) : ?>

    	<p>

    		<strong>Personal interest: </strong>

        	<?php echo $item["personal_interest"];?>

        </p>

        <?php endif; ?>

        <?php if(!empty($item["biography"])) : ?>

    	<hr>

    	<p>

    		<strong>Biography: </strong>

        	<?php echo $item["biography"];?>

    	</p>

        <?php endif; ?>

    	<hr>

    </div>



</div>

<?php endforeach; ?>