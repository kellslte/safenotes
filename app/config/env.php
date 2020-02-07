<?php

session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => '',
		'db' => 'safe_notes'
	),
	'directory' => array(
		'approot' => $_SERVER['DOCUMENT_ROOT']. '/safenotes/app/',
		'urlroot' => 'http://localhost/safenotes',
		'sitename' => 'Safe Notes',
		'version' => '1.0.0'
	)
);
