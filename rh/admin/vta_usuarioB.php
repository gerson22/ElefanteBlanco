<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
$usuario = new Usuario($_GET['idUsr']);
?>
<html>
    <head>
    <meta charset="UTF-8"/>
<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
        <title></title>
         <link rel="stylesheet" href="estilos.css"/>
             <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

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

    

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
      
      $("#uploadForm").on('change',(function(e) {
		var l = $('#loader');
		
		
		 document.getElementById("btnImg").disabled = false;
       
	}));
      
	$("#uploadForm").on('submit',(function(e) {
		var l = $('#loader');
		  var usr = $("#id_usuario").val();
		l.show();
		e.preventDefault();
	
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			$("#targetLayer").html(data);
			l.hide();
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
});
</script>
        
          



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
            
           function modificarUsuario()
           {
			   var id_usuario=document.uploadForm.id_usuario.value;
			 
			   location.href="mod_usuario.php?idUsr="+id_usuario;
			   
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
     &nbsp;&nbsp;&nbsp; <input type="button" value="Regresar" class="boton" onClick="regresar()"></center><br>

  
       <div class="centrar">
     
             
<form name="uploadForm" id="uploadForm" action="upload.php" method="post">

<div style="float:left; color:#FFF; text-align:center; border:0px solid; width:60%">
<?php
       
        $rusuarios = Usuario::regresaUsuario($_GET['idUsr']);
        
    if($rusuarios != '')
    {
    $foto=0;
    $id=0;
     foreach($rusuarios as $usuario)
                                    {
                                      
                                           echo '<div style="float:left; padding-left:210px;"><b>Nombre:</b> '.$usuario['usu_nombre'].' '.$usuario['usu_ape_pat'].' '.$usuario['usu_ape_mat'].'</div><br>';
                                           echo '<div style="float:left; padding-left:210px;"><b>Empresa:</b> '.utf8_encode($usuario['nombre_empresa']).'</div><br>';
                                           echo '<div style="float:left; padding-left:210px;"><b>Sucursal:</b> '.$usuario['nombre_suc'].'</div><br>';
                                           echo '<div style="float:left; padding-left:210px;"><b>Departamento:</b> '.$usuario['nombre_depto'].'</div><br>';
                                           echo '<div style="float:left; padding-left:210px;"><b>Carrera:</b> '.$usuario['usu_carrera'].'</div><br>';
                                           echo '<div style="float:left; padding-left:210px;"><b>Celular:</b> '.$usuario['usu_cel'].'</div><br>';
                                           echo '<div style="float:left; padding-left:210px;"><b>Correo:</b> '.$usuario['usu_correo'].'</div><br>';
                                           echo '<div style="float:left; padding-left:210px;"><b>Fecha ingreso:</b> '.$usuario['usu_fec_ing'].'</div>';
                                           $foto=$usuario['usu_img'];
                                           $id=$usuario['id_usuario'];
                                    }

         }
         else
         {
			 echo '<br>No se encontraron registros';
			 
		 }                
           
             
           
        ?>
     
</div>

<div style="float:right; padding-right:100px;">
<img style="display:none" id="loader" src="loader.gif" alt="Cargando...." title="Cargando...." />
<div id="targetLayer"><img src="uploads/<?php echo $foto; ?>" width="180px" height="180px"></div>
<div id="uploadFormLayer">
<br/>
<input type="hidden" value="<?php echo $id; ?>" id="id_usuario" name='id_usuario'/>
<input name="userImage" type="file" class="inputFile" accept="image/*"/>
<input type="submit" value="Subir" id="btnImg" name='btnImg' disabled="true"/><br><br>
<input type="button" value="Modificar datos" onclick="modificarUsuario()">
</form>
</div>
</div>




</section>
   </body>
 <script>
        /** Cosas del Ajax image loader */
        var f = $('#form_imagen');
        var l = $('#loader'); // loder.gif image
        var b = $('#button'); // upload button
        var imagen;

        b.click(function(){
            // implement with ajaxForm Plugin
            f.ajaxForm({
                beforeSend: function(){
                    l.show();
                    b.attr('disabled', 'disabled');
                },
                success: function(img){
                    l.hide();
                    f.resetForm();
                    b.removeAttr('disabled');

                    asignarFoto(img);
                },
                error: function(e){
                    b.removeAttr('disabled');
                }
            });
        });

  

        function asignarFoto(img)
        {
            if(img == "no_img.jpg") alert("La foto debe de tener un tamaño no mayor a 400kb y tener una terminación .jpg, .jpeg, .gif o .png");
            $.ajax({
                type: "POST",
                url: "/includes/acciones/personas/asignar_foto.php",
                data: "id_persona=" + id_maestro + "&imagen=" + img,
                success: function (data)
                {
                    document.location.reload(true);
                }
            });
        }

       


       
    </script>
</html>
