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
<!--
<div id="header">
<img src="header-01.png" width="1000" height="80">
</div>
-->


<div class="titulo" style="border:0px #fff solid;">
Empleados<br>

</div>


<br>
 <?php
             
             if(!empty($_POST['eliminar']))
        { 
			
            
               $aLista=array_keys($_POST['eliminar']);
               foreach($aLista as $iId)
               {
                        $elminaUsr=new Usuario($iId);
                         $elminaUsr->eliminaUsuario();
                 }

               
              
         }
        echo '<div class="busq" style="float:left; padding-top:0%; border:0px solid lightgray; width:26%; text-align:center;">';
        include('frmBusqEmpleado.php');
        echo '</div>';
        $usuarios = Usuario::regresaUsrDep($_GET['idDepto']);
       
    if($usuarios != '')
    {
echo '<div id="resultados">';
  echo '<section id="fotos">';
              
                                    foreach($usuarios as $usuario)
                                    {
                                       
                                          echo '		<div id="empleados">
				<a href="lst_usuario.php"><img src="uploads/'.$usuario['usu_img'].'" height="100" width="100"/></a>
					</div>';
                                    }
     
              
                         echo '</section></div></div>';
    
         }
         else
         {
			 echo '<div id="resultados"><font color="#FFFFFF">No se encontraron registros</font></div>';
			 
			 
		 }                
           
             
           
        ?>
		
	</section>
	
</body>
</html>
