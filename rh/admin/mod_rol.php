<?php
   include 'controlador.php';
include 'controlador2.php';
   sesion_activa();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <LINK href="../css/estilos.css" rel="stylesheet" type="text/css">
         <script src="../includes/jquery.js"></script>
        <script src="../includes/jquery.validate.js"></script>
<script src="../ajax/ajax_rol.js"></script>
	<script type="text/javascript" src="../Jquery_datePicker/date.js"></script>            
	<script type="text/javascript" src="../Jquery_datePicker/jquery.datePicker.js"></script>               
	<link rel="stylesheet" type="text/css" media="screen" href="../Jquery_datePicker/datePicker.css">
        <title></title>
         
 <script>

 $(document).ready(function() {
               $("#frmDatos").validate({
                  rules: {
		  horas: "required",
		equipo1: "required",
		equipo2: "required"
 
                 },
                  messages: {
		  horas: " *",
		  equipo1: " *",
		equipo2: " *"
                 }
              });
            });     
</script>
       <script language="Javascript">



        function validate()
        {
                 valido=false;
             for(var i = 0; i < document.frmMaestro.elements.length; i++)
             {
          
               if(document.frmMaestro[i].type=="checkbox" && document.frmMaestro[i].checked==true)
                  {
                
                  valido=true;
                  return confirma();
                  }
             }
             
                  if(!valido)
                  {
                          alert('Para eliminar debes seleccionar al menos una casilla de verificación situada delante de la carrera'); 
                          return;
                  }
       }


function confirma() {
	var answer = confirm("¿Está seguro de realizar esta operación?")
	if (answer)
  {
    document.frmMaestro.submit();

  }
	else
  {
		return;
	}
}
function mensaje()
{
    var a=document.all.selecteliga.value; 	
	document.location.target="contlista";
    document.location.href="alta_rol.php?id_liga="+a+"";	
}
function regresar()
{
  
   document.location.href="rol_horario.php";		
}

 function modificar()
        {
           if(document.frmDatos.horas.value!='')
		{
			
modificaRol();
var liga=document.frmDatos.liga.value;
var fecha=document.frmDatos.fecha.value;



		}

       }
</script>      
   
    </head>
    <body bgcolor="#EAE2F1">
<div class="titulo_opciones">  
 	Modificación de partidos </div>
    <br><br>
     <form name="frmDatos" id="frmDatos" method="POST" action='javascript:modificar()'> 
	<input type="hidden" name="liga" id="liga" size="13" value="<?echo $_GET['liga'];?>" readonly/>
<input type="hidden" name="fecha" id="fecha" size="13" value="<?echo $_GET['fecha'];?>" readonly/>
<input type="hidden" name="cancha" id="cancha" size="3" value="<?echo $_GET['cancha'];?>" readonly/>
<input type="hidden" name="rol" id="rol" size="3" value="<?echo $_GET['rol'];?>" readonly/>
<table align='center' class='listado'><tr><td>

					<?php
					    include 'conexion.php';						
					    conectar();
					    /**LLENAR SELECT LIGAS*/    
		                //$listado_equ=lista_ligas();

                    $listado_hora=listado_horasxpartido($_GET['fecha'],$_GET['liga'],$_GET['cancha']);
                      echo '<select name="horas" id="horas" onchange="mensaje()" disabled="true"/>';
					    echo '<option value="">'.'Hora'.'</option>';   
                          $cont=0;

                          while($result=mysql_fetch_array($listado_hora))
                              {
                                   $cont++;
                   if($_GET['hora_id']==$result['hora_id'])
					{
						echo '<option value='.$result['hora_id'].' selected=true>'.$result['hora_desc'].'</option>'; 
					}
					else
					{
					   echo '<option value='.$result['hora_id'].'>'.$result['hora_desc'].'</option>'; 
					}

 					             
                                      

                              }

               			$cont=0;
		                echo '</select></td>';

if( isset($_GET['liga']) )
		{
                           $listado_equ=lista_equipos_liga($_GET['liga']);
                           echo '<td><select name="equipo1" id="equipo1">';
                           echo '<option value="">Equipo 1</option>';              
                           while($result=mysql_fetch_array($listado_equ))
                           {                          
                               echo '<option value='.$result['equipo_id'].'>'.$result['equipo_descripcion'].'</option>';         
                               
                            }                         
                    echo '</select></td><td> Vs</td> ';

$listado_equ=lista_equipos_liga($_GET['liga']);
                           echo '<td><select name="equipo2" id="equipo2">';
                           echo '<option value="">Equipo 2</option>';              
                           while($result=mysql_fetch_array($listado_equ))
                           {                          
                               echo '<option value='.$result['equipo_id'].'>'.$result['equipo_descripcion'].'</option>';         
                               
                            }                         
                    echo '</select></td></tr></table>';		
}
desconectar();					
					?>
   </center> </font> <br>

      <center> <input type="submit" value="Guardar" class="boton"> &nbsp;&nbsp; <input type="button" value="Cerrar" class="boton" onClick='window.close();'></center>
    </form> 

</body>
</html>
