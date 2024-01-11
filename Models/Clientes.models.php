<?php

require_once "conexion.php";
class ModeloClientes
{
	//CONSULTAS MYSQL  MOSTRAR TABLA
	static public function mdlMostrarClientes($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}


	//REGISTRAR CLIENTES
	 static public function mdlIngresarClientes($tabla, $datos)
	 {

	 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_cliente, cliente, contacto, telefono, email, contrato) VALUES (:codigo, :cliente, :contacto, :telefono, :email, :contrato)");
	 	$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
	 	$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
	 	$stmt->bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);
	 	$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
	 	$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
	 	$stmt->bindParam(":contrato", $datos["contrato"], PDO::PARAM_STR);

	 	if($stmt->execute()){

	 		return "ok";

	 	}else{

	 		return "error";
		
	 	}

	 	$stmt->close();
	 	$stmt = null;
	 }
}
