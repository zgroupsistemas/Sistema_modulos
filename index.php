<?php

require_once "Controllers/Clientes.controllers.php";
require_once "Controllers/Cotizacion.controllers.php";


require_once "Controllers/Plantilla.controllers.php";
require_once "Models/Clientes.models.php";
require_once "Models/Cotizacion.models.php";



$plantilla = new  ControllersPlantilla();
$plantilla ->ctrPlantilla();