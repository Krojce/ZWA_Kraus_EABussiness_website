<?php Messages::display(); ?>

<div class="jumbotron" id="europe">

  <div class="container">

    <h1>

    	<?php echo $europe_jumbotron_h1?>

    </h1>

    <p>

    	<?php echo $europe_jumbotron_paragraph?>

    </p>

    <a href="mailto:szeles@eabusiness.cz">&nbsp;<?php echo $header_contactus?>.&nbsp;</a>

  </div>

</div>



<div class="container">

	<h2>

		<?php echo $europe_main_h1?>

	</h2>

	<p>

		<?php echo $europe_main_paragraph1?> <br><br> <?php echo $europe_main_paragraph2?>

	</p>

</div>



<div class="container">

	<h2><?php echo $europe_partners_h1?></h2>

	<?php 

		foreach($viewmodel as $item) : 

	?>

	<div class="col-md-12 post-alignment">

      <div class="col-xs-8 col-sm-3">

		    <a href="<?php echo $item['link']; ?>">

          <img class="logo-img" alt="<?php echo $item['image_name']; ?>" 

            src="/assets/images/logos/<?php echo $item['image_name']; ?>">

        </a>

      </div>

      <div class="col-xs-4 col-sm-9">

        <?php if(isset($_SESSION['is_logged_in_admin'])) : ?>

          <a class="edit" href="<?php echo ROOT_PATH; ?>shares/edit/?id=<?php echo $item['id']?>">

            <img alt="edit-button" src="/assets/images/edit.jpg">

          </a>

        <?php endif; ?> 

    		<a href="<?php echo $item['link']; ?>"><h3><?php echo $item['title']; ?></h3></a>

    		<p><?php echo $item['content']; ?></p>

      </div>

    </div>

	<?php endforeach; ?>

</div>



<div class="learn-more">

    <div class="container">

      <div class="row">

        <div  class="col-md-2">

          <h3><?php echo $header_contact?></h3>

          <p>

            E A Business <br>Platnéřská 13 <br>110 00 Prague 1 <br>CZ - Czech republic 

          </p>

          <p>

            <a href="mailto:szeles@eabusiness.cz"><?php echo $header_contactus?></a>

          </p>

        </div>

        <div class="col-md-10">

          <h3><?php echo $aboutus_aboutus?></h3>

          <p>

            <?php echo $footer_paragraph?>

          </p>

          <p>

            <a href="about.html"><?php echo $footer_learnmore?></a>

          </p>

        </div>

      </div>

    </div>

  </div>