<?php

    header("Content-Type: application/json");

    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case "GetAll":
            $data = $categoria->get_categoria();
            echo json_encode($data);
        break;
        case "GetID":
            $id = $_GET["id"];
            $data = $categoria->get_categoria_by_id($id);
            echo json_encode($data);
        break;
        case "Insert":
            $nombre = $body["nombre"];
            $obs = $body["obs"];
            $data = $categoria->post_categoria($nombre, $obs);
            echo json_encode($data);
        break;
        case "Update":
            $nombre = $body["nombre"];
            $obs = $body["obs"];
            $id = $body["id"];
            $data = $categoria->put_categoria($id, $nombre, $obs);
            echo json_encode("ACTUALIZADO CORRECTAMENTE");
        break;
        case "Delete":
            $id = $_GET["id"];
            $data = $categoria->delete_categoria($id);
            echo json_encode("ELIMINADO CORRECTAMENTE");
        break;

    }

?>