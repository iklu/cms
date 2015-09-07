
<?php
//constants can be defined like routes
define("MODULO", "users");

define("APP_ABSOLUTE_PATH", dirname(dirname(__FILE__)));



define("APP_PATH", str_replace("index.php", "", $_SERVER['PHP_SELF']));
define("HOST", $_SERVER['REMOTE_HOST']);

//route home
define('HOME_PAGE', '');

//database actions
define( 'SET_USER' , 'set');
define( 'GET_USER' ,'get');
define( 'DELETE_USER' , 'delete');
define( 'EDIT_USER' , 'edit');

//views
define( 'VIEW_HOME_PAGE', 'home');
define( 'VIEW_ERROR_PAGE' , 'error');
define( 'VIEW_SET_USER' , 'agregar');
define( 'VIEW_GET_USER' , 'buscar');
define( 'VIEW_DELETE_USER' , 'borrar');
define( 'VIEW_EDIT_USER' ,  'modificar');
define( 'VIEW_ALL_USERS' ,  'all');

//app errors
define("ERROR_INVALID_REQUEST", "invalid_request");
?>
