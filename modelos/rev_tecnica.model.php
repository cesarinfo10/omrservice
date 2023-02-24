<?php

require_once "conexion.php";

class ModelRevTecnica{

    /*=============================================
	INSERTAR DATOS REVICIÓN TÉCNICA
	=============================================*/
    static public function newRevTecMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d");
        
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
        (id_numPatente, fchDesde, fchHasta, observaciones, lugarEmitido, quienEmite, certContaminate, estado)
         VALUES (:id_numPatente, :fchDesde, :fchHasta, :observaciones, :lugarEmitido, :quienEmite, :certContaminate, :estado)");

        $stmt->bindParam(":id_numPatente", $datos->id_numPatente, PDO::PARAM_STR);
        $stmt->bindParam(":fchDesde", $datos->fchDesde, PDO::PARAM_STR);
        $stmt->bindParam(":fchHasta", $datos->fchHasta, PDO::PARAM_STR);
        $stmt->bindParam(":observaciones", $datos->observaciones, PDO::PARAM_STR);
        $stmt->bindParam(":lugarEmitido", $datos->lugarEmitido, PDO::PARAM_STR);
        $stmt->bindParam(":quienEmite", $datos->quienEmite, PDO::PARAM_STR);
        $stmt->bindParam(":certContaminate", $datos->certContaminate, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos->estado, PDO::PARAM_STR);
       

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}


    }

    /*=============================================
	CONSULTA DE REV TECNICA POR ID
	=============================================*/
    static public function oneRevTeclMDL($tabla, $tablaDatosGral, $id){

        $sql = Conexion::conectar()->prepare("SELECT id, 
        (SELECT id FROM $tablaDatosGral WHERE id = id_numPatente LIMIT 1) AS 'numPatente', 
        fchDesde, fchHasta, observaciones, lugarEmitido, quienEmite, certContaminate, estado
        FROM $tabla WHERE id = $id");

        $sql ->execute();

        return $sql -> fetchAll();
 
    }

    /*=============================================
	LLAMAR A TODOS LOS  REVICIÓN TÉCNICA
	=============================================*/
    static public function AllRevTecnicaMDL($tablaDatosGral, $tabla){

        $sql = Conexion::conectar()->prepare("SELECT id, 
        (SELECT numPatente FROM $tablaDatosGral WHERE id = id_numPatente LIMIT 1) AS 'numPatente', 
        fchDesde, fchHasta, observaciones, lugarEmitido, quienEmite, certContaminate, estado
        FROM $tabla");

        $sql ->execute();

        return $sql -> fetchAll();

    }

    /*=============================================
	UPDATE REV TECNICA
	=============================================*/
    static public function updateRevTecMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d");
        
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_numPatente=:id_numPatente, fchDesde=:fchDesde, fchHasta=:fchHasta, 
                                               observaciones=:observaciones, lugarEmitido=:lugarEmitido, quienEmite=:quienEmite,
                                               certContaminate=:certContaminate, estado=:estado WHERE id=:id");

            $stmt->bindParam(":id_numPatente", $datos->id_numPatente, PDO::PARAM_STR);
            $stmt->bindParam(":fchDesde", $datos->fchDesde, PDO::PARAM_STR);
            $stmt->bindParam(":fchHasta", $datos->fchHasta, PDO::PARAM_STR);
            $stmt->bindParam(":observaciones", $datos->observaciones, PDO::PARAM_STR);
            $stmt->bindParam(":lugarEmitido", $datos->lugarEmitido, PDO::PARAM_STR);
            $stmt->bindParam(":quienEmite", $datos->quienEmite, PDO::PARAM_STR);
            $stmt->bindParam(":certContaminate", $datos->certContaminate, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos->estado, PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos->id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}
		
    }

    /*=============================================
	DELETE DATOS GENERALES
	=============================================*/
    static public function deleteRevTecMDL($tabla, $id){
        
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

		
		
    }
}