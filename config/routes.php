<?php
use Cake\Routing\Router;

Router::plugin('EasyMenus', function ($routes) {

    $routes->connect('/easymenus', ['controller' => 'EasyMenus', 'action' => 'index']);
    $routes->fallbacks('InflectedRoute');
});
