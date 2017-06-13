<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Default to search for files
set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/components'
					.PATH_SEPARATOR.'application/views');

// Files name: views
const USER_DEFAULT_FILE = 'user_default.php';
const PAGE_404 = '404.php';

const PAGE_USER = 'user.php';

// database for users
define('SALT', '$2a$07$pigoSeILt9aVj3pItT7oGXrRFhiLr7tJUVn30VjXohw=$');

define('HOME_URL', url());

define('DB_HOST', 'localhost');
define('DB_NAME', 'nv-todo-list');
define('DB_USER', 'root');
define('DB_PASS', 'root');