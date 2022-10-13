<?php

$routes->group('install', function ($routes){
    $routes->get('table', 'Install::createTable');
    $routes->get('admin', 'Install::createAdmin');
    $routes->get('demo', 'Install::createDemo');
});