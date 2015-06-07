<?php
use Cake\Routing\Router;



Router::prefix('admin', function ($routes) {

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/EasyMenus', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'index']);
    $routes->connect('/EasyMenus/add', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'add']);
    $routes->connect('/EasyMenus/view/*', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'view']);
    $routes->connect('/EasyMenus/edit/*', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'edit']);
    $routes->connect('/EasyMenus/delete/*', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'delete']);


});