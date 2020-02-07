<?php

// Load Config
require_once "config/env.php";

//Load Helpers
require_once "helpers/Cookie.php";
require_once "helpers/Hash.php";
require_once "helpers/Input.php";
require_once "helpers/Redirect.php";
require_once "helpers/Sanitize.php";
require_once "helpers/Session.php";
require_once "helpers/Token.php";
require_once "helpers/Validate.php";

//Autoload core libraries
spl_autoload_register(function($classname){
	require_once "libraries/". $classname .".php";
});
