<?php

spl_autoload_register(function($classname){
	require $filename = "../src/models/".ucfirst($classname).".php";
});

require 'config.php';
require 'controller.php';
require 'database.php';
require 'functions.php';
require 'model.php';
require 'app.php';

$app = new App;

$app->loadController();