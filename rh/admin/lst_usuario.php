<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
?>
<html>
    <head>
    <meta charset="ISO-8959-1"/>
<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
        <title></title>
         <link rel="stylesheet" href="estilos.css"/>
             <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">


        <script language="javascript">

          function recargar2()
        {

            alert("Sus datos se han actualizado correctamente");
            location.href="listajug.php";

        }


          function cursor()
        {

            document.frmMaestro.usr_nombres.focus();

        }


            function regresar()
            {

                location.href='index2.html';
            }
            function alta()
            {
               location.href='#alta';
            }
            
            function existe_jugador_num()
            {
                alert('El número del jugador ya existe, ingresa números diferentes');
            }

               function existe_jugador_liga()
            {
                alert('El jugador que ingresaste ya se encuentra registrado en la liga, acción no permitida');
            }

            
    function regresar2()
            {
                 alert('Llegaste al límite de 15 jugadores por equipo');
                location.href='listado_jugador.php';
            }
            
             function redirect(id)
          {
            document.location.href="listado_jugador.php?id="+ id +"";	
          }
          function ventana2(archivo){
coordx= screen.width ? (screen.width-550)/2 : 0;
coordy= screen.height ? (screen.height-200)/2 : 0;
//coordy-=230;
window.open(archivo,'popup','width=550,height=200,top='+coordy+',left='+coordx);
} 
          </script>

                        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



<script src="jquery.ui.datepicker-es.js"></script>

    

  
        




    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){ $(".mensajes").fadeOut(300);}, 3000);  
        });
</script>

 <script>
        $(document).ready(function ()
            {
                asignarReglasValidacion();
              // $("#frmAdeudo").tabs();
            });

            function asignarReglasValidacion()
            {
                $('#frmUsuario').validate({
                    rules:
                    {
                        "usr_nombres": { required: true },
                        "usr_ap_pat": { required: true },
                        "usr_ap_mat": { required: true },
                        "usr_sueldo": { required: true }
                                 },
                messages: {
                  usr_nombres: " **",
                  usr_ap_pat:" **",
                  usr_ap_mat:" **",
                  usr_sueldo : " **"
               
                }
                })
            }

            function submitClicked()
            {
                if($("#frmUsuario").valid())
                {
                    if(confirm("¿Desea agregar al docente?"))
                    {
                        $("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                        var sueldo    = $("#usr_sueldo").val();
              alert(sueldo);

                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                            data: "su=" + sueldo,
                            success: function (data)
                            {
								if(data == 0)
                                {
                                    alert("Empresa Agregada");
                                    window.location.href = "lst_usuario.php";
                                }
                            }
                        });
                    }
                }
            }
        </script>
     
            
                    


    



 <script>
$(function() {
$( "#tabs" ).tabs();
});

function eliminar()
        {
                 valido=false;
             for(var i = 0; i < document.frmUsuario.elements.length; i++)
             {
          
                  if(document.frmUsuario[i].type=="checkbox" && document.frmUsuario[i].checked==true)
                  {
                
                  valido=true;
                  return confirma();
                  }
             }
             
                  if(!valido)
                  {
                          alert('Para eliminar debes seleccionar al menos una casilla de verificación'); 
                          return;
                  }
       }
       
       function confirma() {
  var answer = confirm("¿Está seguro de realizar esta operación?")
  if (answer)
  {
    document.frmUsuario.submit();

  }
  else
  {
    return;
  }
}
</script>


    </head>
    
    <body onload="cursor();">
<section id="contenedor">

   <div class="titulo">Usuarios<br>

</div>
   
    <br>
 <center>
    <?php
         if(isset($_GET['id']))
         {   
            echo '<input type=submit value=Actualizar class=boton>';            
         }
         else
         echo "<input type=button value=Agregar class=boton onclick=location.href='alta_usuario.php'>";  
    ?>	       
     &nbsp;&nbsp;&nbsp; <input type="button" value="Regresar" class="boton" onClick="regresar()"> &nbsp;&nbsp;&nbsp; <input type="button" value="Eliminar" class="boton" onClick="eliminar()"></center><br>

    <form name="frmUsuario" id="frmUsuario" method="POST" action=''>    
       <div class="centrar">
     
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
       
        $usuarios = Usuario::listaUsuario();
        
    if($usuarios != '')
    {


                        echo '<table class=listado style="width:85%;" border="1">';
             echo '<tr class=tlistado><td style="width:5%;">No.</td><td style="width:30%;">Nombre</td><td style="width:5%;">Rol</td><td style="width:5%;">Fecha Ingreso</td><td style="width:10%;">Nivel Estudios</td><td style="width:10%;">Correo</td>
             <td style="width:10%;">Celular</td><td style="width:1%;"></td></tr>';
       $cont=0;
                               
                                    foreach($usuarios as $usuario)
                                    {
                                       $cont++;
                                          echo '<tr><td class=centrar>'.$cont.'</td><td class=centrar><a href=vta_usuario.php?idUsr='.$usuario['id_usuario'].'>'.$usuario['usu_nombre'].' '.$usuario['usu_ape_pat'].' '.$usuario['usu_ape_mat'].'</td>
                                          <td class=centrar>'.$usuario['rol_descr'].'</td><td class=centrar>'.$usuario['usu_fec_ing'].'</td><td class=centrar>'.$usuario['descr_nivel'].'</td>
                                          <td class=centrar>'.$usuario['usu_correo'].'</td><td class=centrar>'.$usuario['usu_cel'].'</td>
                                          <td><input type=checkbox name=eliminar['.$usuario['id_usuario'].'] value='.$usuario['id_usuario'].'></td></tr>';
                                    }
     
              
                         
      
           
    
                echo '</table>';
         }
         else
         {
			 echo '<br>No se encontraron registros';
			 
		 }                
           
             
           
        ?>
     
</div>

     <br>
   


</section>
   </body>

</html>
