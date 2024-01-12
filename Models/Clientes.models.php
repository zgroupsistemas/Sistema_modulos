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
	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo_cliente,cliente,contacto,telefono,email,tiempo_contrato) VALUES (:codigo_cliente,:cliente,:contacto,:telefono,:email,:tiempo_contrato)");

		$stmt->bindParam(":codigo_cliente", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		 $stmt->bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);
		 $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		  $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		 $stmt->bindParam(":tiempo_contrato", $datos["contrato"], PDO::PARAM_STR);

	
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	//Editar CLIENTES

	static public function mdlEditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE  $tabla SET codigo_cliente = :codigo_cliente ,cliente=:cliente,contacto=:contacto,telefono=:telefono,email=:email,tiempo_contrato=:tiempo_contrato WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo_cliente", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
		 $stmt->bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);
		 $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		  $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		 $stmt->bindParam(":tiempo_contrato", $datos["contrato"], PDO::PARAM_STR);

	
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	//ELIMINAR CLIENTE

	static public function mdlEliminarCliente($tabla,$datos){
		
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
	}

}
