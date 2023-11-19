<?php
    header('Content-Type: aplication/json');


   require_once("../config/conexion.php");
   require_once("../models/Pedidos.php");
   $pedidos = new Pedidos();

   $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetAll":
            $datos=$pedidos->get_pedidos();
            echo json_encode($datos);
        break;


            case "Insert":
                
            $datos=$pedidos->insert_pedidos($body["codigo_producto"],$body["cantidad"], $body["fecha"], $body["tipo"]);
            echo json_encode("Insert Correcto");
            break;

           case "Update":
                    $datos=$pedidos->update_pedidos($body["codigo_producto"], $body["cantidad"],$body["fecha"], $body["tipo"]);
                    echo json_encode("Correcto");
                    break;

             case "Delete":
                    $datos=$pedidos->delete_pedidos($body["codigo"]);
                    echo json_encode("Delete Correcto");
                    break;
     
    }
?>