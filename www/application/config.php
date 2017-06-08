<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Default to search for files
set_include_path(get_include_path()
					.PATH_SEPARATOR.'application/controllers'
					.PATH_SEPARATOR.'application/models'
					.PATH_SEPARATOR.'application/views');

// Files name: views
const USER_DEFAULT_FILE = 'user_default.php';
// const USER_ROLE_FILE = 'user_role.php';
// const USER_LIST_FILE = 'user_list.php';
// const USER_ADD_FILE = 'user_add.php';
const USER_LOGIN_FILE = 'user_login.php';
const USER_REGISTER_FILE = 'user_register.php';

// database for users
define('SALT', '$2a$07$pigoSeILt9aVj3pItT7oGXrRFhiLr7tJUVn30VjXohw=$');

define('HOME_URL', url());

define('DB_HOST', 'localhost');
define('DB_NAME', 'nv-todo-list');
define('DB_USER', 'root');
define('DB_PASS', 'root');