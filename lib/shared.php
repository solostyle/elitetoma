<?php

/*
 * The setReporting() function helps us display errors 
 * only when the DEVELOPMENT_ENVIRONMENT is true. 
 * The next move is to remove global variables and magic quotes. 
 * Another function that we make use of is __autoload 
 * which helps us load our classes automagically. 
 * Finally, we execute the callHook() function which does the main processing.
 * 
 * Each of our URLs - site.com/controllerName/actionName/queryString
 * 
 * So callHook() basically takes the URL which we have 
 * received from index.php and separates it out as 
 * $controller, $action and the remaining as $queryString. 
 * $model is the singular version of $controller.
 * 
 * e.g. if our URL is todo.com/items/delete/1/first-item, then
 *   Controller is items
 *   Model is item (corresponding mysql table)
 *   View is delete
 *   Action is delete
 *   Query String is an array (1,first-item)
 * 
 * After the separation is done, it creates a new object 
 * of the class $controller.”Controller” 
 * and calls the method $action of the class.
 */

/** Check if environment is development and display errors **/

function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes() {
if ( get_magic_quotes_gpc() ) {
	$_GET    = stripSlashesDeep($_GET   );
	$_POST   = stripSlashesDeep($_POST  );
	$_COOKIE = stripSlashesDeep($_COOKIE);
}
}

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main Call Function **/

function callHook() {
	global $url;

	$urlArray = array();
	$urlArray = explode("/",$url);

	$controller = $urlArray[0];
	array_shift($urlArray);
	$action = $urlArray[0];
	array_shift($urlArray);
	$queryString = $urlArray;

	$controllerName = $controller;
	$controller = ucwords($controller);
	$model = rtrim($controller, 's');
	$controller .= 'Controller';
	$dispatch = new $controller($model,$controllerName,$action);

	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch,$action),$queryString);
	} else {
		/* Error Generation Code Here */
	}
}

/** Autoload any classes that are required **/

function __autoload($className) {
	if (file_exists(ROOT . DS . 'lib' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'lib' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'app' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'app' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'app' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'app' . DS . 'models' . DS . strtolower($className) . '.php');
	} else {
		/* Error Generation Code Here */
	}
}

setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();
