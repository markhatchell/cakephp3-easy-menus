<?php
use Cake\Routing\Router;



Router::prefix('admin', function ($routes) {

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/EasyMenus', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'index']);
    $routes->connect('/EasyMenus/menu-settings', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'menuSettings']);
    $routes->connect('/EasyMenus/add', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'add']);
    $routes->connect('/EasyMenus/:id/view', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'view'],['pass' => ['id']]);
    $routes->connect('/EasyMenus/:id/edit', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'edit'],['pass' => ['id']]);
    $routes->connect('/EasyMenus/:id/delete', ['plugin'=>'EasyMenus', 'controller' => 'EasyMenus', 'action' => 'delete'],['pass' => ['id']]);


});