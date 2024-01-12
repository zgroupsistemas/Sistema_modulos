<?php

require_once "conexion.php";
class ModeloCotizacion
{
	//CONSULTAS MYSQL  MOSTRAR TABLA
	static public function mdlMostrarCotizacion($tabla, $item, $valor)
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
		static public function mdlIngresarCotizacion($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numero_cotizacion,cliente_id ,monto,asunto) VALUES (:numero_cotizacion,:cliente_id ,:monto,:asunto)");
	
			$stmt->bindParam(":numero_cotizacion", $datos["cotizacion"], PDO::PARAM_STR);
			$stmt->bindParam(":cliente_id", $datos["cliente"], PDO::PARAM_INT);
			 $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_INT);
			 $stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
			
	
		
			if($stmt->execute()){
	
				return "ok";
	
			}else{
	
				return "error";
			
			}
	
			$stmt->close();
			$stmt = null;
	
		}
	
		//Editar CLIENTES
	
	
	
		//ELIMINAR CLIENTE
	
		static public function mdlEliminarCotizacion($tabla,$datos){
			
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
