<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
?>
<html>
    <head>
    <meta charset="iso-8959-1"/>
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

                location.href='index2.php';
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
                $('#frmAdeudo').validate({
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
                if($("#frmAdeudo").valid())
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
function eliminar()
        {
                 valido=false;
             for(var i = 0; i < document.frmAdeudo.elements.length; i++)
             {
          
                  if(document.frmAdeudo[i].type=="checkbox" && document.frmAdeudo[i].checked==true)
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
    document.frmAdeudo.submit();

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

   <div class="titulo"><br><br>Sucursal<br>

</div>
   
    
 
    <form name="frmAdeudo" id="frmAdeudo" method="POST" action=''>    
       <div class="centrar">
     
             <?php
             
                       if(!empty($_POST['eliminar']))
        { 
			
            
               $aLista=array_keys($_POST['eliminar']);
               foreach($aLista as $iId)
               {
                        
                         Maestro::eliminaSucursal($iId);
                 }

               
              
         }
         
        $sucursales = Maestro::listaSucursales();
        
    if($sucursales != '')
    {


                        echo '<table class=listado style="width:60%;" border="1">';
             echo '<tr class=tlistado><td>No.</td><td style="width:35%;">Empresa</td><td style="width:45%;">Sucursal</td><td></td></tr>';
       $cont=0;
                               
                                    foreach($sucursales as $sucursal)
                                    {
                                       $cont++;
                                          echo '<tr><td class=centrar>'.$cont.'</td><td class=centrar>'.utf8_decode($sucursal['nombre_empresa']).'</td><td class=centrar>'.utf8_decode($sucursal['nombre_suc']).'</td>
                                          <td><input type=checkbox name=eliminar['.$sucursal['id_suc'].'] value='.$sucursal['id_suc'].'></td></tr>';
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
   <center>
    <?php
         if(isset($_GET['id']))
         {   
            echo '<input type=submit value=Actualizar class=boton>';            
         }
         else
         echo "<input type=button value=Agregar class=boton onclick=ventana2('am_sucursal.php')>";  
    ?>	       
     &nbsp;&nbsp;&nbsp; <input type="button" value="Regresar" class="boton" onClick="regresar()">
     &nbsp;&nbsp;&nbsp; <input type="button" value="Eliminar" class="boton" onClick="eliminar()"></center>



</section>
   </body>

</html>
