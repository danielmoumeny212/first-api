<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group("api", function ($routes) {
  $routes->post("register", "Register::index");
  $routes->post("login", "Login::index");
  $routes->get("users", "User::index", ['filter' => 'authFilter']);
  $routes->get("folders", "Folder::index", ['filter' => 'authFilter']);
  $routes->post("folder/add", "Folder::addFolder", ['filter' => 'authFilter']);
  $routes->post("folder/update", "Folder::updateFolder", ['filter' => 'authFilter']);
  $routes->delete("folder/delete", "Folder::deleteFolder", ['filter' => 'authFilter']);
  
});
