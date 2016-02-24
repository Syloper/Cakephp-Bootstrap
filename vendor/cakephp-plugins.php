<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'GCM' => $baseDir . '/plugins/GCM/',
        'Gestor' => $baseDir . '/plugins/Gestor/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];
