<?php

require_once "../Controllers/Clientes.controllers.php";
require_once "../Models/Clientes.models.php";

class AjaxClientes{

public $idCliente;

public function ajaxEditarCliente(){

    $item="id";
    $valor= $this->idCliente;

    $respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

    echo json_encode($respuesta);

}

}


//OBJETO EDITAR CLIENTE
if(isset($_POST["idCliente"])){
$editar = new AjaxClientes();
$editar->idCliente=$_POST["idCliente"];
$editar->ajaxEditarCliente();
}