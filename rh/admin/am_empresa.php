<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
?>
<html>
    <head>
    <meta charset="utf-8"/>
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

                  window.close();
         
            }
            function cerrar()
            {
                window.opener.location.reload();
                window.close();
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
coordy-=230;
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
                        "empr_nombre": { required: true },
                        "usr_ap_pat": { required: true },
                        "usr_ap_mat": { required: true },
                        "usr_sueldo": { required: true }
                                 },
                messages: {
                  empr_nombre: " **",
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
                    if(confirm("¿Desea agregar la empresa?"))
                    {
                        $("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                        var empresa    = $("#empr_nombre").val();
             

                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                            data: "dcrempresa=" + empresa+"&tipoInsert=empresa",
                            success: function (data)
                            {
								
								if(data == 0)
                                {
                                    alert("Empresa Agregada");
                                             window.opener.location.reload();
                                             window.close();
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

</script>


    </head>
    
    <body onload="cursor();">
<section id="contenedor">
   <br>
   <div class="titulo">Empresas<br>

</div>
   
    
 
    <form name="frmAdeudo" id="frmAdeudo" method="POST" action=''>    
       <div class="centrar">
    <table class="frml" style="width:90%;" border="0">
    <tr>
     <td class="derecha">
            Nombre:
        </td>
        <td style="width:75%;">
            <input type="text" id="empr_nombre" name="empr_nombre" maxlength="100" style="width:80%;">
        </td>
    </tr>
             
</table>
</div>

</form>
     <br>
   <center>
    <?php
         if(isset($_GET['id']))
         {   
            echo '<input type=submit value=Actualizar class=boton>';            
         }
         else
         echo '<input type=button value=Guardar class=boton onclick="submitClicked()">';  
    ?>	       
     &nbsp;&nbsp;&nbsp; <input type="button" value="Cancelar" class="boton" onClick="regresar()"></center>

<br><br><br><br><br><br>

</section>
   </body>

</html>
