<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Files name: views
const PAGE_HOME = 'home.php';

const PAGE_404 = '404.php';

const PAGE_USER = 'user.php';

// database for users
define('SALT', '$2a$07$pigoSeILt9aVj3pItT7oGXrRFhiLr7tJUVn30VjXohw=$');

define('HOME_URL', url());

define('DB_HOST', 'localhost');
define('DB_NAME', 'nv-todo-list');
define('DB_USER', 'root');
define('DB_PASS', 'root');