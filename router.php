<?php
require_once './app/controllers/business.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// instancio el unico controller que existe por ahora
$businessController = new businessController();


// tabla de ruteo
switch ($params[0]) {
    case 'list':
        $businessController->showClothes();
        break;

    case 'add':
        $businessController->addClothes();
        break;
        
    case 'delete':
        // obtengo el parametro de la acción
        $id_clothes= $params[1];
        $businessController->deleteClothes($id_clothes);
        break;

    case 'upDate':

            $id_clothes = $params[1];
            $businessController->upDateClothes($id_clothes);
           
           break;
           case 'editEnd':
            $businessController->editEnd();
            
            break;
        
    default:
        echo('404 Page not found');
        break;
}
