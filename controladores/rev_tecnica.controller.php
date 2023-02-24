<?php

class ControladorRevTecnica{
    /*=============================================
	INSERTAR DATOS REVICIÓN TÉCNICA
	=============================================*/
    static public function newRevTecCRL($datos){

        $tabla="rev_tecnica";

        $respuesta = ModelRevTecnica::newRevTecMDL($tabla, $datos);
    
        echo $respuesta;

        
    }

    /*=============================================
	CONSULTA DE REV TECNICA POR ID
	=============================================*/
    static public function oneDatosRevTecCTR($id){

        header('Content-type:application/json');
        
        $tablaDatosGral = "datos_generales";
        $tabla = "rev_tecnica";

        $respuesta = ModelRevTecnica::oneRevTeclMDL($tabla, $tablaDatosGral, $id);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }

    /*=============================================
	LLAMAR TODOS LOS DATOS
	=============================================*/
    static public function AllRevTecnicaCTR(){

        header('Content-type:application/json');
        
        $tablaDatosGral = "datos_generales";
        $tabla = "rev_tecnica";


        $respuesta = ModelRevTecnica::AllRevTecnicaMDL($tablaDatosGral, $tabla);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
   	/*=============================================
	UPDATE REV TECNICA
	=============================================*/
    static public function updateRevTecCTR($datos){

        $tabla="rev_tecnica";

        $respuesta = ModelRevTecnica::updateRevTecMDL($tabla, $datos);
    
        echo $respuesta;

        
    }
    /*=============================================
	LLAMAR A UN DATO
	=============================================*/
    static public function deleteRevTecTR($id){

        header('Content-type:application/json');
        
        $tabla = "rev_tecnica";

        $respuesta = ModelRevTecnica::deleteRevTecMDL($tabla, $id);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
}