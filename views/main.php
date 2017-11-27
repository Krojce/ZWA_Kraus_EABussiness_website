<!DOCTYPE html>

<html lang="<?php echo $_COOKIE["language"]?>">

  <head>

  	<title>E A Bussiness</title>

  	<link rel="stylesheet" href="/assets/css/bootstrap.css">

  	<link rel="stylesheet" href="/assets/css/main.css">

    <link rel="shortcut icon" href="/assets/images/icon-EAB.ico">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script type="text/javascript" src="/assets/js/validation.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>

  <body>

    <?php

      $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      $parts = parse_url($url);

      if(!empty($parts['query'])){

        parse_str($parts['query'], $query);

        if(!empty($query['language'])){

          $cookie_name = 'language';

          $cookie_value = $query['language'];

          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

          $_COOKIE[$cookie_name] = $cookie_value;

        }

      }

      switch ($_COOKIE["language"]) {

                case "cs":

                    include "../www/languages/cs.php";

                    break;

                case "de":

                    include "../www/languages/de.php";

                    break;

                case "ru":

                    include "../www/languages/ru.php";

                    break;

                default:

                    include "../www/languages/en.php";   

      }

    ?>

    <nav class="navbar navbar-default">

      <div class="container">

        <div class="navbar-header" id="navbar_image">

          <a href="https://www.imjk.cz/">

            <img id="navbar_header_image" alt="eabsquare" src="/assets/images/EABsquare.png">

          </a>

        </div>

        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav">

            <li><a class="active" href="<?php echo ROOT_URL; ?>"><?php echo $navbar_homepage?></a></li>

            <li><a href="<?php echo ROOT_URL; ?>aboutus"><?php echo $navbar_aboutus?></a></li>

            <li><a href="<?php echo ROOT_URL;?>europe"><?php echo $navbar_europe?></a></li>

            <li><a href="<?php echo ROOT_URL; ?>asia"><?php echo $navbar_asia?></a></li>

            <li><a href="<?php echo ROOT_URL; ?>blog"><?php echo $navbar_blog?></a></li>

          </ul>



          <ul class="nav navbar-nav navbar-right">

            <li><a href="<?php echo ROOT_URL; ?>redirect?language=en&url=<?php echo $_SERVER['REQUEST_URI'];?>">ENGLISH</a></li>

            <li><a href="<?php echo ROOT_URL; ?>redirect?language=de&url=<?php echo $_SERVER['REQUEST_URI'];?>">DEUTSCH</a></li>

            <li><a href="<?php echo ROOT_URL; ?>redirect?language=ru&url=<?php echo $_SERVER['REQUEST_URI'];?>">РОССИЯ</a></li>

            <li><a href="<?php echo ROOT_URL; ?>redirect?language=cs&url=<?php echo $_SERVER['REQUEST_URI'];?>">ČESKY</a></li>

          </ul>

        </div>

      </div>

    </nav>

   	<?php require($view); ?>

    <div class="copyright">

      <div class="container">

        <div class="row">

          <div  class="col-md-6">

            <ul  class="administration">

              <?php if(isset($_SESSION['is_logged_in_admin'])) : ?>

              <li><a href="<?php echo ROOT_URL; ?>users/logout"><?php echo $footer_logout?></a></li>

              <li><a href="<?php echo ROOT_URL; ?>shares/add"><?php echo $footer_addpost?></a></li>

              <?php else : ?>

              <li>
                <a href="<?php echo ROOT_URL; ?>users/administration/?last_page=<?php echo "https://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>">
                  Admin
                </a>
              </li>

              <?php endif; ?>

            </ul>

          </div>

          <div  class="col-md-6">

            <ul>

              <li>Copyright 2007-2015 E A Business s.r.o.</li>

              <li>Design &amp; Administration by <a href="http://www.szeles.cz">Plavit</a></li>

            </ul>

          </div>

        </div>

      </div>

    </div>

  </body>

</html>