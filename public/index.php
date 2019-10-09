<?php

// Định nghĩa hằng số ROOT là đường dẫn tuyệt đối tới folder project
define('ROOT',  dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);

// Định nghĩa hằng số APP là đường dẫn tuyệt đối tới folder app
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('base_url','http://localhost:'.$_SERVER['SERVER_PORT'].'/VPP/');

define('URL_CATEGORY','http://localhost:'.$_SERVER['SERVER_PORT'].'/VPP/category/');
define('URL_PRODUCT','http://localhost:'.$_SERVER['SERVER_PORT'].'/VPP/product/');
define('URL_POST','http://localhost:'.$_SERVER['SERVER_PORT'].'/VPP/post/');
define('view_cus',ROOT.'resources/views/');
session_start();

require APP . 'core/App.php';
require APP . 'core/Route.php';
require APP . 'core/View.php';
require APP . 'core/Database.php';
require APP . 'models/Category.php';
require APP . 'models/Product.php';
require APP . 'models/Post.php';
require APP . 'models/CategoryPost.php';
require APP . 'models/Cart.php';
require APP . 'models/Users.php';
require APP . 'models/Options.php';
require APP . 'core/Globals.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

		
require ROOT.'public/PHPMailer\PHPMailer.php';
require ROOT.'public/PHPMailer\SMTP.php';
require ROOT.'public/PHPMailer\Exception.php';


$app = new App();


