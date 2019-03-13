<?php
error_reporting(E_ALL);
    require 'vendor/autoload.php';
    require 'vendor/Controller.php';
    require 'controller/ShopController.php';
    
    header('Content-Type: application/json; charset=utf-8"');
    
    $app = new \RKA\Slim(array(
        'mode' => 'development',
        'debug' => true
    ));
    
    
    $app->get('/add/:name/:price/:amount', 'controller\ShopController:addItem');
    $app->get('/edit/:id/:name/:price/:amount', 'controller\ShopController:editItem');
    $app->get('/remove/:id', 'controller\ShopController:removeItem');
    
    $app->get('/get/price/:id', 'controller\ShopController:getItemPrice');
    $app->get('/get/name/:id', 'controller\ShopController:getItemName');
    $app->get('/get/amount/:id', 'controller\ShopController:getItemAmount');
    
    $app->get('/get/all/:id', 'controller\ShopController:getAll');
    
    $app->get('/remove/:id/:count', 'controller\ShopController:removeCount');
    
    $app->get('/qr/:id', 'controller\ShopController:getQR');
    
    
    $app->run();
