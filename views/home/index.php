<?php Messages::display(); ?>

<div class="jumbotron">

	<div class="container">

		<h1><?php echo $home_jumbotron_h1?></h1>

		<p><?php echo $home_jumbotron_paragraph?></p>

		<a href="mailto:szeles@eabusiness.cz">&nbsp;<?php echo $header_contactus?>&nbsp;</a>

	</div>

</div> 

    

<div class="neighborhood-guides">

  <div class="container">

    <h2><?php echo $home_main_h1?></h2>

    <p><?php echo $home_main_paragraph?></p>

    <div class="row">

      <div  class="col-xs-4">

        <a href="<?php echo ROOT_URL; ?>europe">

          <div class="thumbnail">

            <img alt="europe" src="../assets/images/europe.jpg">

          </div>

        </a>

        <a href="<?php echo ROOT_URL; ?>aboutus">

          <div class="thumbnail">

            <img alt="aboutus" src="../assets/images/aboutus.jpg">

          </div>

        </a>

      </div>

      <div  class="col-xs-4">

        <a href="<?php echo ROOT_URL; ?>asia">

          <div class="thumbnail">

            <img alt="asia" src="../assets/images/asia.jpg">

          </div>

        </a>

        <div class="thumbnail">

          <img alt="eabsmall" src="../assets/images/EABsmall.jpg" >

        </div>

      </div>

      <div  class="col-xs-4">

        <div class="thumbnail">

          <a href="mailto:szeles@eabusiness.cz">

            <img alt="contact" src="../assets/images/contact.png">

          </a>

        </div>

      </div>

    </div>

  </div>

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