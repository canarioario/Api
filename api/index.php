<?php
    require_once "models/Humorista.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['id'])) {
                echo json_encode(Humorista::getWhere($_GET['id']));
            }//end if
            else {
                echo json_encode(Humorista::getAll());
            }//end else
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Humorista::insert($datos->nombre, $datos->apellido, $datos->publico, $datos->trabajo, $datos->genero)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;

        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Humorista::update($datos->id, $datos->nombre, $datos->apellido, $datos->publico, $datos->trabajo, $datos->genero)) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;
        case 'DELETE':
            if(isset($_GET['id'])){
                if(Humorista::delete($_GET['id'])) {
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if 
            else {
                http_response_code(405);
            }//end else
            break;
        
        default:
            http_response_code(405);
            break;
    }//end while