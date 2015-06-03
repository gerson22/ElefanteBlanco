<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
//include_once("../../clases/class_lib.php");
extract($_POST);
# su
# apellido_materno
# nombres
# sexo
# calle
# numero
# colonia
# CP
# titulo
# egresado
# ano
# telefonos[]


    //$retl=Maestro::agregar($su);
    switch($tipoInsert)
    {
    case 'sucursal':
		Maestro::agregarSucursal($sucursal_nom,$fkEmpresa);
		echo 0;
    break;
    case 'empresa':
		Maestro::agregarEmpresa($dcrempresa);
		echo 0;
	case 'departamento':
		Maestro::agregarDepto($deptoNombre,$fkSucursal);
		echo 0;
     break;
     
     case 'usuario':
		
    $q=Usuario::agregarUsuario($nombre,$apellido_paterno,$apellido_materno,$puesto,$rol,$fecha_nac,$fecha_ent,
		$salario,$empresa,$sucursal,$depto,
		$hra_ent,$hra_sal,$toleran,$calleNo,$colonia,$cp,$coord,$tel,$cel,$nivelEst,$carrera,$escuelaEgr,$correo,$edoCivil,
		$noHijos,$peso,$talla,$imc,$_SESSION['usuario']);
		echo $q;
     break;
     
     case 'puesto':
		Maestro::agregarPuesto($dcrpuesto,$_SESSION['usuario']);
		echo 0;
    

    }
    

?>
