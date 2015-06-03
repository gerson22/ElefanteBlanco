<?php
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
<title>MEZE RECURSOS HUMANOS</title>
<link rel="stylesheet" href="estilos.css"/>
<script src="../ajax/ajax_meze.js"></script>
     <script language="javascript">

          function buscarEmpleado()
        {

            bsqEmpleado();

        }
        </script>
</head>
<body>
	<section id="contenedor">
<!--
<div id="header">
<img src="header-01.png" width="1000" height="80">
</div>
-->

   <?php echo '<div class="busq" style="float:left; padding-top:0%; border:0px solid lightgray; width:26%; text-align:center;">';
        include('frmBusqEmpleado.php');
        echo '</div>';
        ?><br><br><br><br>
        <div id="resultados">
		<section id="websites">
		<img src="../images/meze.png" class="logoMeze"><br>
			<article>
				<a href="lst_usuario.php"><img src="usuario.png" height="110" width="110"/></a>
			<p>Usuario</p>
			</article>
			<article>
				<a href="lst_empresa.php"><img src="empresa.png" height="110" width="110"/></a>
			<p>Empresa</p>
			</article>
			<article>
				<a href="lst_sucursal.php"><img src="sucursal.png" height="110" width="110"/></a>
				<p>Sucursal</p>
			</article>
			<article>
				<a href="lst_depto.php"><img src="departamento.png" height="110" width="110"/></a>
				<p>Departamento</p>
			</article>
			<article>
				<a href="lst_puestos.php"><img src="puestos.png" height="105" width="105"/></a>
				<p>Puestos</p>
			</article>
			<article>
				<a href="/index.php"><img src="salir.png" height="110" width="110"/></a>
				<p>Salir</p>
			</article>
			
			
		</section>
	</div>
	</section>
	
	
</body>
</html>
