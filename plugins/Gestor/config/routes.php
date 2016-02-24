<?php
use Cake\Routing\Router;

Router::plugin('Gestor',['path' => '/gestor'], function ($routes) {
        
        $routes->fallbacks('DashedRoute');
        
    }
);
