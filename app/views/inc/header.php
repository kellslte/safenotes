<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title><?= Config::get('directory/sitename'); ?></title>
	<!-- Main styles -->
	<link rel="stylesheet" href="<?= Config::get('directory/urlroot'); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= Config::get('directory/urlroot'); ?>/css/all.min.css">
	<link rel="stylesheet" href="<?= Config::get('directory/urlroot'); ?>/css/summernote.min.css">
	<link rel="stylesheet" href="<?= Config::get('directory/urlroot'); ?>/css/styles.css">
</head>	
<body>
	<?php require_once Config::get('directory/approot') . 'views/inc/navbar.php'; ?>
	<div class="container">