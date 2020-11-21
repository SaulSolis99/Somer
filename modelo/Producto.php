<?php

error_reporting(E_ALL);
include_once("AccesoDatos.php");

class Producto{

private $nmodelo=0;
private $nlinea=0;
private $nestilo=0;
private $nplantilla=0;
private $nsuela=0;
private $ncorte=0;
private $nmontado=0;
private $ncasquillo=0;
private $ncolor=0;
private $nprecio=0;
private $nimagen=0;


	function setModelo($pnValor){
       $this->nmodelo = $pnValor;
	}

	function getModelo(){
       return $this->nmodelo;
	}

	function setLinea($pnValor){
       $this->nlinea = $pnValor;
	}

	function getLinea(){
       return $this->nlinea;
	}

  function setEstilo($pnValor){
       $this->nestilo = $pnValor;
	}

	function getEstilo(){
       return $this->nestilo;
	}

	function setPlantilla($pnValor){
       $this->nplantilla = $pnValor;
	}

	function getPlantilla(){
       return $this->nplantilla;
	}

  function setSuela($pnValor){
       $this->nsuela = $pnValor;
  }

  function getSuela(){
       return $this->nsuela;
  }

  function setCorte($pnValor){
       $this->ncorte = $pnValor;
  }

  function getCorte(){
       return $this->ncorte;
  }

  function setMontado($pnValor){
       $this->nmontado = $pnValor;
  }

  function getMontado(){
       return $this->nmontado;
  }

  function setCasquillo($pnValor){
       $this->ncasquillo = $pnValor;
  }

  function getCasquillo(){
       return $this->ncasquillo;
  }

  function setColor($pnValor){
       $this->ncolor = $pnValor;
  }

  function getColor(){
       return $this->ncolor;
  }

  function setPrecio($pnValor){
       $this->nprecio = $pnValor;
  }

  function getPrecio(){
       return $this->nprecio;
  }

  function setImagen($pnValor){
       $this->nimagen = $pnValor;
  }

  function getImagen(){
       return $this->nimagen;
  }

	function buscar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$bRet = false;

		if ($this->sCveUsu==0)
			throw new Exception("Producto->buscar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
		 		$sQuery = "SELECT *
							FROM producto;
				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
				$oAccesoDatos->desconectar();
				if ($arrRS){
					$this->nmodelo = $arrRS[0][0];
					$this->nlinea = $arrRS[0][1];
          $this->nestilo= $arrRS[0][2];
					$this->nplantilla = $arrRS[0][3];
					$this->nsuela = $arrRS[0][4];
					$this->ncorte = $arrRS[0][5];
          $this->nmontado = $arrRS[0][6];
          $this->ncasquillo = $arrRS[0][7];
          $this->ncolor = $arrRS[0][8];
          $this->nprecio = $arrRS[0][9];
          $this->nimagen = $arrRS[0][10];

					$bRet = true;
				}
			}
		}
		return $bRet;
	}

	function insertar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->sCveUsu=="" || $this->sContrasenia == "" || $this->sNombre == "")
			throw new Exception("Producto->insertar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
				/*En las bases de datos, por integridad referencial, primero se
				  registra en la tabla independiente (usuario) y luego en la que tiene
				  la dependencia (Alumno)
				*/
		 		$sQuery = parent::getInsertar();
				$sQuery = $sQuery."
					INSERT INTO alumno ( nnumcontrol, ncvecarrera, sCveUsuario, nsemestre)
					VALUES (".$this->nnumcontrol.",".$this->ncvecarrera.",".$this->sCveUsu.", ".$this->nsemestre.");";
                   error_log($sQuery,0);
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}

	/*Modificar, regresa el número de registros modificados*/
	function modificar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->sCveUsu=="" || $this->sContrasenia == "" || $this->sNombre == "")
			throw new Exception("Alumno->modificar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
				//En la modificación, no importa cuál se afecta primero
		 		$sQuery = parent::getModificar();
				$sQuery = $sQuery."
					UPDATE alumno
					SET	nnumcontrol = ".$this->nnumcontrol.",
					ncvecarrera=".$this->ncvecarrera.",
					nsemestre=".$this->nsemestre."
					WHERE sCveUsuario = '".$this->sCveUsu."';";
					error_log($sQuery,0);
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}

	/*Borrar, regresa el número de registros eliminados*/
	function borrar(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$nAfectados=-1;
		if ($this->sCveUsu=="")
			throw new Exception("Alumno->borrar(): faltan datos");
		else{
			if ($oAccesoDatos->conectar()){
				/*Al eliminar, por integridad referencial, primero se borra el registro
				  dependiente (Alumno) y después el independiente (usuario)*/
				$sQuery = "DELETE FROM alumno WHERE sCveUsuario = '".$this->sCveUsu."'; ";
		 		$sQuery = $sQuery." ".parent::getBorrar();
				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
				$oAccesoDatos->desconectar();
			}
		}
		return $nAfectados;
	}

	/*Busca todos los Alumnoes, regresa nulos si no hay información o
	  un arreglo de Alumnos*/

	function buscarTodos(){
	$oAccesoDatos=new AccesoDatos();
	$sQuery="";
	$arrRS=null;
	$arrAlumnos = null;
	$arrLinea=null;
	$j=0;
	$oAlum=null;
		if ($oAccesoDatos->conectar()){
		 	$sQuery = "SELECT t1.sCveUsuario, t1.sContrasenia, t1.sNombre, t1.sApePat,
						t1.sApeMat, t2.nnumcontrol, t2.ncvecarrera, t2.nsemestre
						FROM usuario t1, alumno t2
						WHERE t2.sCveUsuario = t1.sCveUsuario
						ORDER BY t1.sCveUsuario";
			$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
			$oAccesoDatos->desconectar();
			if ($arrRS){
				foreach($arrRS as $arrLinea){
					$oAlum = new Alumno();
					$oAlum->setClave($arrLinea[0]);
					$oAlum->setPwd($arrLinea[1]);
					$oAlum->setNombre($arrLinea[2]);
					$oAlum->setApePat($arrLinea[3]);
					$oAlum->setApeMat($arrLinea[4]);
					$oAlum->setNumControl($arrLinea[5]);
					$oAlum->setCveCarrera($arrLinea[6]);
					$oAlum->setSemestre($arrLinea[7]);
            		$arrAlumnos[$j] = $oAlum;
					$j=$j+1;
                }
			}
        }
		return $arrAlumnos;
	}
 }
 ?>
