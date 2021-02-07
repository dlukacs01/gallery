<?php

// Mac: / Windows: \ (it depends on the OS)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// C:\xampp\htdocs\gallery
define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'gallery');

// C:\xampp\htdocs\gallery\admin\includes
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');

require_once("functions.php");
require_once("new_config.php"); // config.php filename gives error, use new_config.php instead
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("comment.php");
require_once("session.php");
require_once("paginate.php");

?>