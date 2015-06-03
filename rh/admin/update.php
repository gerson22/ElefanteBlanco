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
    switch($tipoUpdate)
    {

     
     case 'usuario':
		
    $q=Usuario::actualizaUsuario($nombre,$apellido_paterno,$apellido_materno,$puesto,$rol,$fecha_nac,$fecha_ent,
		$salario,$empresa,$sucursal,$depto,
		$hra_ent,$hra_sal,$toleran,$calleNo,$colonia,$cp,$coord,$tel,$cel,$nivelEst,$carrera,$escuelaEgr,$correo,$edoCivil,
		$noHijos,$peso,$talla,$imc,$_SESSION['usuario'],$id_usuario);
		echo $q;
    
    

    }
    

?>
