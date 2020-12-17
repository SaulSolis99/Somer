<?php
/*
Archivo:  buscaTodosAlumno.php
Objetivo: control (MVC) para obtener los datos de todos los Alumnos.
		  Devuelve cadena JSON como sSit (Ok, Error), arrAlumno
		  (arreglo de objetos, cada uno contiene id, nombre, apePat,
		  apeMat, nnumcontrol, ncvecarrera, nsemestre)
Autor:    BAOZ
*/
include_once("modelo/Producto.php");
session_start();
$sErr="";
$sCve="";
$sNom="";
$sPwd="";
$oPro = new Producto();
$sRetJSON="";
$arrAlum=null;

	try{
		//Realizar búsqueda mediante objeto de Alumno
		$arrPro= $oPro->buscarTodos();
	}catch(Exception $e){
		error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
		$sErr = "Error en base de datos";
	}

	//Tiene que armar la cadena JSON
	if ($sErr == ""){
		$sRetJSON='{"arrProducto":['; //Inicio de la cadena JSON
		if ($arrAlum == null){
			$sRetJSON = '{"arrProducto":["{
							"id": -1,
							"nombre":"No hay datos",
							"apePat":"",
							"apeMat":"",
							"nnumcontrol":-1,
						    "ncvecarrera":-1,
						    "nsemestre": -1

						}';
		}else{
			foreach($arrPro as $oPro){
				$sRetJSON = $sRetJSON.'{
						"modelo": '.$oPro->getModelo().',
						"linea":"'.$oPro->getLinea().'",
						"estilo":"'.$oPro->getEstilo().'",
						"plantilla":"'.$oPro->getPlantilla().'",
						"suela":'.$oPro->getSuela().',
						"corte":'.$oPro->getCorte().',
						"montado":'.$oPro->getMontado().'
						"casquillo":'$oPro->getCasquillo().'
						"color":'$oPro->getColor().'
						"precio":'$oPro->getPrecio().'
						"imagen":'$oPro->getImagen().'
						},';
			}
			//Sobra una coma, eliminarla
			$sRetJSON = substr($sRetJSON,0, strlen($sRetJSON)-1);
		}
		//Fin de la cadena JSON
		$sRetJSON = $sRetJSON.']
					}';
	}else{
		$oErr->setError($nErr);
		$sRetJSON='{"arrProducto":[{
						"id": -1,
						"nombre":"'.$oErr->getTextoError().'",
						"apePat":"",
						"apeMat":"",
						"nnumcontrol":-1,
						 "ncvecarrera":-1,
						  "nsemestre":-1
						}]
					}';
	}
	header('Content-type: application/json');
	echo $sRetJSON;
?>
