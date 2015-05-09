<?php
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'methodocracyDB.db.11904691.hostedresource.com',
		'username' => 'methodocracyDB',
		'password' => 'Dfh#2dh@jdja4382DHf',
		'db' => 'methodocracyDB'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => '604800'
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

 spl_autoload_register(function($class){
	require_once 'classes/' . $class . '.php';
 });
 
 require_once 'functions/sanitize.php';
 
 $newArgument = new NewArgument;