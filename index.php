<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('clothes', 'ClothController');
Router::post('login', 'SecurityController');
Router::post('logout', 'SecurityController');
Router::post('addCloth', 'ClothController');
Router::post('addClothing', 'ClothController');
Router::post('register', 'SecurityController');
Router::post('search', 'ClothController');
Router::get('like', 'ClothController');
Router::get('dislike', 'ClothController');
Router::get('contact', 'ContactController');
Router::get('aboutus', 'AboutusController');

Router::run($path);