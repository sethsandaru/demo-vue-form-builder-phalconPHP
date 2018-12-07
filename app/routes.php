<?php use \Phalcon\Mvc\Router;

$router = new Router(false);

/**
 *  You can define routes in this file the router gets 
 *  loaded back into the dependency injection after you define routes.
 *
 *
 */
$router->addGet('/', 'Home::show');


// API for VueFormBuilder
$router->addGet('/api/v1/VueForm/GetFormData/{form_id:[0-9]+}', "VueFormAPI::getFormData");
$router->addGet('/api/v1/VueForm/GetAllForm', "VueFormAPI::getAllForm");
$router->addPost('/api/v1/VueForm/InsertForm', "VueFormAPI::insertForm");
$router->addPost('/api/v1/VueForm/UpdateForm/{form_id:[0-9]+}', "VueFormAPI::updateForm");


return $router;
