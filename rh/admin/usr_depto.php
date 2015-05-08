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
</head>
<body>
	<section id="contenedor">
<!--
<div id="header">
<img src="header-01.png" width="1000" height="80">
</div>
-->


<div class="tituloP">
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
        echo '<div class="busq" style="float:left; padding-top:0%; border:0px solid lightgray; width:26%; text-align:center;"><img class="imgeB" src="../css/logo_eb.png"><br><br><input type="text" class="busqueda"><img src="../images/buscar.png" width="20" height="20"></div>';
        $usuarios = Usuario::regresaUsrDep($_GET['idDepto']);
       
    if($usuarios != '')
    {
echo '<div class="f" style="float:right; border:0px solid lightgray; width:73%; color:white;">';
  echo '<section id="fotos">';
              
                                    foreach($usuarios as $usuario)
                                    {
                                       
                                          echo '		<div id="empleados">
				<a href="lst_usuario.php"><img src="uploads/'.$usuario['usu_img'].'" height="100" width="100"/></a>
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
