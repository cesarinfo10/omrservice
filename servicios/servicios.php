<?php
ob_start();
require_once "../controladores/servicios.controller.php";

require_once "../modelos/servicios.model.php";

if (isset( $_GET['idReporte'])){

    $idReporte= $_GET['idReporte'];
    
    }

    if (isset( $_GET['idSolucion'])){

        $idSolucion= $_GET['idSolucion'];
        
    }

//URL http://localhost/appcondominio/servicios/servicios.php?usser=1-9&getAllServicios
/*=============================================
LLAMAR A TODOS LOS USUARIOS
=============================================*/
if (isset($_GET['getAllServicios'])){
   $usser = $_GET['usser'];
   $alltipouser= new ControladorServicios();
   $alltipouser->allallServiciosCTR($usser);
   
   }
//URL http://localhost/appcondominio/servicios/servicios.php?getAllServicios
/*=============================================
LLAMAR A UN REPORTE
=============================================*/
if (isset($_GET['getOneServicios'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->oneServiciosCTR($idReporte);
    
    }

//URL http://localhost/appcondominio/servicios/servicios.php?getOneSolucion
/*=============================================
LLAMAR A UNA SOLUCION
=============================================*/
if (isset($_GET['getOneSolucion'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->oneSolucionCTR($idReporte);
    
    }

//URL http://localhost/appcondominio/servicios/servicios.php?idReporte=7&getOneServiciosFotos
/*=============================================
LLAMAR A TODAS LAS FOTOS DE REPORTE POR USUARIO
=============================================*/
if (isset($_GET['getOneServiciosFotos'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->oneServiciosFotoCTR($idReporte);
    
    }
//URL http://localhost/appcondominio/servicios/servicios.php?idSolucion=7&getOneSolucionFotos
/*=============================================
LLAMAR A TODAS LAS FOTOS DE REPORTE POR USUARIO
=============================================*/
if (isset($_GET['getOneSolucionFotos'])){

    $fotosolucion= new ControladorServicios();
    $fotosolucion->oneSolucionFotoCTR($idSolucion);
    
    }

//URL http://localhost/appcondominio/servicios/servicios.php?usser=1-9&getAllSolucion
/*=============================================
LLAMAR A UN REPORTE
=============================================*/
if (isset($_GET['getAllSolucion'])){
    $usser = $_GET['usser'];
    $alltipouser= new ControladorServicios();
    $alltipouser->allSolucionCTR($usser);
    
    }

//URL http://localhost/omr/omrservice/servicios//servicios.php?getAllEstadoD
/*=============================================
LLAMAR TODOS LOS ESTADOS DATOS
=============================================*/
if (isset($_GET['getAllEstadoD'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->allallEstadoDatoCTR();
    
}
/*=============================================
LLAMAR TODOS LOS TIPOS DATOS
=============================================*/
if (isset($_GET['getAllTipoD'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->allallTipoDatoCTR();
    
}
/*=============================================
LLAMAR TODOS LOS MODELO MARCA DATOS
=============================================*/
if (isset($_GET['getAllMMD'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->allaMMDCTR();

}
   header('Content-type: application/json');
   header("Access-Control-Allow-Origin: *");
   ob_end_flush();