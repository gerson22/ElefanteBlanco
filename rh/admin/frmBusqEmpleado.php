<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
<title>MEZE RECURSOS HUMANOS</title>
<link rel="stylesheet" href="estilos.css"/>
<script src="../ajax/ajax_meze.js"></script>
<script type="text/javascript">
function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla==13) buscarEmpleado();
}
</script>
</head>
<body>
	<section id="contenedor">



 <a href="index2.php"><img src="../images/inicio.png" width="70px" height="70px" alt="Inicio" title="Inicio"></a><br><br><img class="imgeB" src="../css/logo_eb.png"><br><br><input type="text" placeholder="Nombre..." class="busqueda" id="emplBusq" onkeypress="validar(event)"><a id="myLink" href="#" onclick="buscarEmpleado();"><img src="../images/buscar.png" width="20" height="20" class="imgBusq"></a>
		
	</section>
	
</body>
</html>
