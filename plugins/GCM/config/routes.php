<?php
use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::plugin('GCM', ['path' => '/gcm'], function ($routes) {
    
    $routes->extensions(['json','xml']);
    $routes->resources('Api');
    $routes->fallbacks('DashedRoute');

});

/*
Router::connect('/gcm', array('controller' => 'notificaciones', 'action' => 'index', 'plugin' => 'GCM'));
Router::connect('/gcm/agregar', array('controller' => 'notificaciones', 'action' => 'agregar', 'plugin' => 'GCM'));
Router::connect('/gcm/eliminar', array('controller' => 'notificaciones', 'action' => 'eliminar', 'plugin' => 'GCM'));
Router::connect('/gcm/enviar', array('controller' => 'notificaciones', 'action' => 'enviar', 'plugin' => 'GCM'));
Router::connect('/gcm/editar', array('controller' => 'notificaciones', 'action' => 'editar', 'plugin' => 'GCM'));
Router::connect('/gcm/ver', array('controller' => 'notificaciones', 'action' => 'ver', 'plugin' => 'GCM'));
*/