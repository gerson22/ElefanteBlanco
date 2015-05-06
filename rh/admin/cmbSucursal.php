<?php
include_once("class_lib2.php");
//include 'conexion.php';
//include 'controlador.php';
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
                        "empresa": { required: true },
                        "suc_nombre": { required: true },

                                 },
                messages: {
                  empresa: " **",
                  suc_nombre:" **"
               
                }
                })
            }

            function submitClicked()
            {
                if($("#frmAdeudo").valid())
                {
                    if(confirm("¿Desea agregar la sucursal?"))
                    {
                      //  $("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                        var empresa    = $("#empresa").val();
                       var sucursal    = $("#suc_nombre").val();

                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                            data: "fkEmpresa="+empresa+"&sucursal_nom="+sucursal+"&tipoInsert=sucursal",
                            success: function (data)
                            {
								
								if(data == 0)
                                {
                                    alert("Sucursal Agregada");
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
    
    <body>
<section id="contenedor">
  
         <select name="sucursal" id="sucursal" style="width:60%;" onchange="cargaComboDepto()"><option value="">Selecciona</option>
             <?php
        $empresas = Maestro::cmbSucursal($_GET['idEmpresa']);
        
    if($empresas != '')
    {
        
                                    foreach($empresas as $empresa)
                                    {
                                       $cont++;
                                          echo '<option value='.$empresa['id_suc'].'>'.$empresa['nombre_suc'].'</option>';
                                       
                                    }
     
              
                         
      
           
    
                echo '</select>';
         }
         else
         {
			 echo '<option>Sin resultados...</option>';
			 
		 }                
           
             
           
        ?>
    
   </body>

</html>
