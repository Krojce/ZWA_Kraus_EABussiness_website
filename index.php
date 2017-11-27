<?php

// Start Session

session_start();

// Include Config

require('config.php');



require('classes/Messages.php');

require('classes/Bootstrap.php');

require('classes/Controller.php');

require('classes/Model.php');



require('controllers/home.php');

require('controllers/shares.php');

require('controllers/users.php');

require('controllers/europe.php');

require('controllers/asia.php');

require('controllers/aboutus.php');

require('controllers/redirect.php');

require('controllers/blog.php');



require('models/home.php');

require('models/share.php');

require('models/user.php');

require('models/europe.php');

require('models/asia.php');

require('models/aboutus.php');

require('models/redirect.php');

require('models/edit.php');

require('models/blog.php');



$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();

if($controller){

	$controller->executeAction();

}

