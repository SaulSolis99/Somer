<?php

include_once("modelo/Materia.php");
session_start();
$sErr="";
$sCve="";
$sNom="";
$sPwd="";	
$oUsu = new Usuario();
$oMat = new Materia();
$sRetJSON="";
$arrMat=null;

	try{
		//Realizar búsqueda mediante objeto de Alumno
		$arrMat= $oMat->buscarTodos();
	}catch(Exception $e){
		error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
		$sErr = "Error en base de datos";
	}
	
	//Tiene que armar la cadena JSON
	if ($sErr == ""){
		$sRetJSON='{"arrMateria":['; //Inicio de la cadena JSON
		if ($arrMat == null){
			$sRetJSON = '{"arrMateria":["{
							"clave": -1, 
							"nombre":"No hay datos", 
							"creditos":-1
						}';
		}else{
			foreach($arrMat as $oMat){
				$sRetJSON = $sRetJSON.'{
						"clave": '.$oMat->getNumClave().', 
						"nombre":"'.$oMat->getNombre().'", 
						"creditos": '.$oMat->getNumCreditos().'
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
		$sRetJSON='{"arrMateria":[{
						"clave": -1, 
						"nombre":"'.$oErr->getTextoError().'", 
						"creditos":-1
						}]
					}';
	}
	header('Content-type: application/json');
	echo $sRetJSON;
?>