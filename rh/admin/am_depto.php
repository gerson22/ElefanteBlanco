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

<script src="../ajax/ajax_meze.js"></script>
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
                        "sucursal": { required: true },
                        "depto": { required: true }

                                 },
                messages: {
                  empresa: " **",
                  sucursal:" **",
                   depto:" **"
               
                }
                })
            }
            
              function cargaComboSuc()
            {
               cmbSucursalDep();
            }

            function submitClicked()
            {
                if($("#frmAdeudo").valid())
                {
                    if(confirm("¿Desea agregar el departamento?"))
                    {
                      //  $("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                     
                       var sucursal    = $("#sucursal").val();
                       var depto    = $("#depto").val();

                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                            data: "fkSucursal="+sucursal+"&deptoNombre="+depto+"&tipoInsert=departamento",
                            success: function (data)
                            {
								
								if(data == 0)
                                {
                                    alert("Departamento Agregado");
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
   <div class="titulo">Departamento<br>

</div>
   
    
 
    <form name="frmAdeudo" id="frmAdeudo" method="POST" action=''>    
       <div class="centrar">
    <table class="frml" style="width:90%;" border="0">
    <tr>
     <td class="derecha">
            Empresa:
        </td>
        <td style="width:75%;" class="izq">
         <select name="empresa" id="empresa" style="width:90%;" onchange="cargaComboSuc()"><option value="">Selecciona</option>
             <?php
        $empresas = Maestro::listaEmpresas();
        
    if($empresas != '')
    {
        
                                    foreach($empresas as $empresa)
                                    {
                                       $cont++;
                                          echo '<option value='.$empresa['id_empresa'].'>'.$empresa['nombre_empresa'].'</option>';
                                       
                                    }
     
              
                         
      
           
    
                echo '</select>';
         }
         else
         {
			 echo '<option>Sin resultados...</option>';
			 
		 }                
           
             
           
        ?>
    
        </td>
        </tr>
        
        <tr>
     <td class="derecha">
            Sucursal:
        </td>
        <td style="width:75%;" class="izq">
        <div id="divSucursal">
        <select name="sucursal" id="sucursal" style="width:90%;"><option value="">Selecciona</option>
        </select>
        </div>
            </td>
        </tr>
        
        <tr>
     <td class="derecha">
            Departamento:
        </td>
        <td style="width:75%;" class="izq">
            <input type="text" id="depto" name="depto" maxlength="100" style="width:90%;">
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
