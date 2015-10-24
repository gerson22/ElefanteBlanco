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
     <script language="javascript">

          function buscarEmpleado()
        {

            bsqEmpleado();

        }
        </script>
</head>
<body>
	<section id="contenedor">



 <?php
             
             
       
        $usuarios = Usuario::buscarEmpleado($_GET['nombre']);
       
    if($usuarios != '')
    {

  echo '<section id="fotos">';
              
                                    foreach($usuarios as $usuario)
                                    {
                                       
                                          echo '		<div id="empleados">
				<a href=vta_usuarioB.php?idUsr='.$usuario['id_usuario'].'><img src="uploads/'.$usuario['usu_img'].'" height="100" width="100"/></a>
					</div>';
                                    }
     
              
                         echo '</section></div>';
    
         }
         else
         {
			 echo '<font color="#FFFFFF">No se encontraron registros</font>';
			 
			 
		 }                
           
             
           
        ?>
		
	</section>
	
</body>
</html>
