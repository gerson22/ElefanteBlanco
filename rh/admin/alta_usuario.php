<?php
include_once("class_lib2.php");
include_once("validar_admin.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
    <meta charset="ISO-8959-1"/>
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

                location.href='lst_usuario.php';
            }
 

 function cargaComboSuc()
            {
               cmbSucursalDep();
               document.getElementById("sucursal").selectedIndex = "0";
               document.getElementById("depto").selectedIndex = "0";
            }
            
            
 function  cargaComboDepto()
            {
               cmbDepto();
              
            }
           
            
             function redirect(id)
          {
            document.location.href="listado_jugador.php?id="+ id +"";	
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
        
        function formatNumber(num,prefix)
{
num = Math.round(parseFloat(num)*Math.pow(10,2))/Math.pow(10,2)
prefix = prefix || '';
num += '';
var splitStr = num.split('.');
var splitLeft = splitStr[0];
var splitRight = splitStr.length > 1 ? '.' + splitStr[1] : '.00';
splitRight = splitRight + '00';
splitRight = splitRight.substr(0,3);
var regx = /(\d+)(\d{3})/;
while (regx.test(splitLeft)) {
splitLeft = splitLeft.replace(regx, '$1' + ',' + '$2');
}
return prefix + splitLeft + splitRight;
}
            function  calcIMC()
              {
				//alert('hola');
              document.frmMaestro.imc.value=parseInt(document.frmMaestro.peso.value)/(parseFloat(document.frmMaestro.talla.value)*parseFloat(document.frmMaestro.talla.value));
               document.frmMaestro.imc.value=formatNumber(document.frmMaestro.imc.value,'');
     
            }
</script>

 <script>
        $(document).ready(function ()
            {
                asignarReglasValidacion();
                $("#frmMaestro").tabs();
            });

            function asignarReglasValidacion()
            {
                $('#frmMaestro').validate({
                    rules:
                    {
                        "usr_nombres": { required: true },
                        "usr_ap_pat": { required: true },
                        "usr_ap_mat": { required: true },
                        "usr_sueldo": { required: true },
                        "salario": { required: true,number:true }
                                 },
                messages: {
                  usr_nombres: " **",
                  usr_ap_pat:" **",
                  usr_ap_mat:" **",
                  usr_sueldo : " **",
                   salario : " **"
               
                }
                })
            }

            function submitClicked()
            {
                if($("#frmMaestro").valid())
                {
                    if(confirm("¿Desea agregar al usuario?"))
                    {
                        //$("#boton_aceptar").attr('disabled', 'disabled');
                        /** Datos */
                        var nombre = $("#usr_nombres").val();
                        var apellido_paterno = $("#usr_ap_pat").val();
                        var apellido_materno = $("#usr_ap_mat").val();
                       var puesto = $("#puesto").val();
                       var rol = $("#rol").val();
                        var salario = $("#salario").val();
                        var fecha_nac = $("#datepicker").val();
                        var fecha_ent = $("#datepicker2").val();
                        
                       
                        
                        var empresa = $("#empresa").val();
                        var sucursal = $("#sucursal").val();
                        var depto = $("#depto").val();
                        var hra_ent = $("#hra_ent").val();
                        var hra_sal = $("#hra_sal").val();
                        var toleran = $("#toleran").val();
                        var calleNo = $("#calleNo").val();
                        var colonia = $("#colonia").val();
                        var cp = $("#cp").val();
                        var coord = $("#coord").val();
                        var tel = $("#tel").val();
                        var cel = $("#cel").val();
                        var nivelEst = $("#nivelEst").val();
                        var carrera = $("#carrera").val();
                        var escuelaEgr = $("#escuelaEgr").val();
                        var correo = $("#correo").val();
                        var edoCivil = $("#edoCivil").val();
                        var noHijos = $("#noHijos").val();
                        var peso = $("#peso").val();
                        var talla = $("#talla").val();
                        var imc= $("#imc").val();
                                      
         

                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                           data: "nombre=" + nombre +"&apellido_paterno=" + apellido_paterno + "&apellido_materno=" + apellido_materno+ "&puesto=" + puesto + "&rol=" + rol +
                                "&fecha_nac=" + fecha_nac + "&fecha_ent=" + fecha_ent + "&salario=" + salario +  "&empresa=" + empresa
                                + "&sucursal=" + sucursal + "&depto=" + depto + "&hra_ent=" + hra_ent
                                + "&hra_sal=" + hra_sal +"&toleran=" + toleran + "&calleNo=" + calleNo + "&colonia=" +colonia+"&cp=" +cp+"&coord=" +coord+
                                "&tel=" +tel+"&cel=" +cel+"&nivelEst=" +nivelEst+"&carrera=" +carrera+"&escuelaEgr=" +escuelaEgr+
                                "&correo=" +correo+"&edoCivil=" +edoCivil+"&noHijos=" +noHijos+"&peso=" +peso+
                                "&talla=" +talla+"&imc=" +imc+"&tipoInsert=usuario",
                                
                                
                            success: function (data)
                            {
							
                                if(data > 0)
                                {
                                    alert("Usuario Agregado");
                                    window.location.href = "alta_usuario.php";
                                }
                                else
                                {
									 alert('Ha ocurrido un error...');
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

   <div class="titulo">Alta de Usuarios<br>

</div>
   
    
 
    
          <form method="post" action="" id="frmMaestro" name="frmMaestro">
        <div id="tabs">
<ul>
<li><a href="#tabs-1">Generales</a></li>
<li><a href="#tabs-2">Académicos</a></li>


</ul>
<div id="tabs-1">
<div class="centrar">
  
         
         <table style="width:100%;" border="0">
    <tr>
     <td class="derecha">
            Nombre:
        </td>
        <td style="width:75%;">
            <input type="text" id="usr_nombres" name="usr_nombres" maxlength="90" style="width:70%;">
        </td>
    </tr>
    
        <tr>
    <td class="derecha">
            Apellido Paterno:
        </td>
        <td style="width:75%;">
            <input type="text" id="usr_ap_pat" name="usr_ap_pat" maxlength="90" style="width:70%;">
        </td>
    </tr>
    <tr>
    <td class="derecha">
            Apellido Materno:
        </td>
      <td style="width:75%;">
            <input type="text" id="usr_ap_mat" name="usr_ap_mat" maxlength="90" style="width:70%;">
        </td>
    </tr>
    
    
     <tr>
    <td class="derecha">
            Fecha Nacimiento:
        </td>
    <td style="width:75%;">
           <input type="text" id="datepicker" style="width:15%;"/> Fecha Ingreso: <input type="text" id="datepicker2" style="width:15%;"/>
        </td>
    </tr>
    
        
    <tr>
    <td class="derecha">
            Salario diario:
        </td>
    <td style="width:75%;">
            <input type="text" id="salario" name="salario" maxlength="10" style="width:15%;">
        </td>
    </tr>
    
        <tr>
     <td class="derecha">
            Puesto:
        </td>
        <td style="width:75%;">
         <select name="puesto" id="puesto" style="width:30%;"><option value="">Selecciona</option>
             <?php
             $cmbPuesto=new Usuario();
        $puestos = $cmbPuesto->listaPuestos();
        
    if($puestos != '')
    {
        
                                    foreach($puestos as $puesto)
                                    {
                                       $cont++;
                                          echo '<option value='.$puesto['id_puesto'].'>'.utf8_decode($puesto['descr_puesto']).'</option>';
                                       
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
            Rol:
        </td>
        <td style="width:75%;">
         <select name="rol" id="rol" style="width:30%;"><option value="">Selecciona</option>
             <?php
             $cmbRol=new Usuario();
        $roles = $cmbRol->listaRolesUsr();
        
    if($roles != '')
    {
        
                                    foreach($roles as $rol)
                                    {
                                       $cont++;
                                          echo '<option value='.$rol['id_rol'].'>'.utf8_decode($rol['rol_descr']).'</option>';
                                       
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
            Empresa:
        </td>
        <td style="width:75%;">
         <select name="empresa" id="empresa" style="width:60%;" onchange="cargaComboSuc()"><option value="">Selecciona</option>
             <?php
        $empresas = Maestro::listaEmpresas();
        
    if($empresas != '')
    {
        
                                    foreach($empresas as $empresa)
                                    {
                                       $cont++;
                                          echo '<option value='.$empresa['id_empresa'].'>'.utf8_decode($empresa['nombre_empresa']).'</option>';
                                       
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
    <td style="width:75%;">
            <div id="divSucursal">
        <select name="sucursal" id="sucursal" style="width:60%;"><option value="">Selecciona</option>
        </select>
        </div>
        </td>
    </tr>
    
    <tr>
    <td class="derecha">
            Departamento:
        </td>
    <td style="width:75%;">
            <div id="divDepto">
        <select name="depto" id="depto" style="width:60%;"><option value="">Selecciona</option>
        </select>
        </td>
    </tr>
    
    <tr>
    <td class="derecha">
            Hora de entrada:
        </td>
    <td style="width:75%;">
            <input type="text" id="hra_ent" name="hra_ent" maxlength="5" style="width:10%;">  Hora de salida:  <input type="text" id="hra_sal" name="hra_sal" maxlength="5" style="width:10%;"> Teolerancia: <input type="text" id="toleran" name="toleran" maxlength="3" style="width:10%;">
        </td>
    </tr>
    
    
    
    
    <tr>
    <td class="derecha">
            Calle y No.:
        </td>
    <td style="width:75%;">
            <input type="text" id="calleNo" name="calleNo" maxlength="90" style="width:40%;"> 
        </td>
    </tr>
    
     <tr>
    <td class="derecha">
            Colonia:
        </td>
    <td style="width:75%;">
          <input type="text" id="colonia" name="colonia" maxlength="50" style="width:40%;">
        </td>
    </tr>
   
    
    <tr>
    <td class="derecha">
            C.P:
        </td>
    <td style="width:75%;">
            <input type="text" id="cp" name="cp" maxlength="6" style="width:15%;">   Coordenadas: <input type="text" id="coord" name="coord" maxlength="10" style="width:42%;">
        </td>
    </tr>
    
    <tr>
    <td class="derecha">
            Teléfono:
        </td>
    <td style="width:75%;">
            <input type="text" id="tel" name="tel" maxlength="10" style="width:15%;">   Celular: <input type="text" id="cel" name="cel" maxlength="10" style="width:15%;">
        </td>
    </tr>
    
</table>


</div>
</div>
<div id="tabs-2">
<table style="width:100%;" border="0">
        <tr>
    <td class="derecha">
            Nivel de estudio:
        </td>
    <td style="width:75%;">
            <select name="nivelEst" id="nivelEst" maxlength="10" style="width:25%;"><option>Selecciona</option>
              <?php
              
                  $cmbNivel=new Usuario();
        $niveles = $cmbNivel->listaNivelEst();
        
    if($niveles != '')
    {
        
                                    foreach($niveles as $nivel)
                                    {
                                 
                                          echo '<option value='.$nivel['id_nivel'].'>'.$nivel['descr_nivel'].'</option>';
                                       
                                    }
     
              
                         
      
           
    
                echo '</select>';
         }
         else
         {
			 echo '<option>Sin resultados...</option></select>';
			 
		 }                
           
             
           
        ?>
        </td>
    </tr>
    <tr>
     <td class="derecha">
            Carrera:
        </td>
        <td style="width:75%;">
            <input type="text" id="carrera" name="carrera" maxlength="80" style="width:70%;">
        </td>
    </tr>
    
        <tr>
    <td class="derecha">
            Escuela Egresada:
        </td>
        <td style="width:75%;">
            <input type="text" id="escuelaEgr" name="escuelaEgr" maxlength="50" style="width:70%;">
        </td>
    </tr>
    <tr>
    <td class="derecha">
            Correo electrónico:
        </td>
      <td style="width:75%;">
            <input type="text" id="correo" name="correo" maxlength="50" style="width:70%;">
        </td>
    </tr>
    

    
        <tr>
    <td class="derecha">
            Estado civil:
        </td>
    <td style="width:75%;">
            <select name="edoCivil" id="edoCivil" maxlength="10" style="width:25%;"><option>Selecciona</option>
           <?php
              
                  $cmbEstCivil=new Usuario();
        $estcivil = $cmbEstCivil->listaEstCivil();
        
    if($estcivil != '')
    {
        
                                    foreach($estcivil as $civil)
                                    {
                                       
                                          echo '<option value='.$civil['id_civil'].'>'.$civil['descr_civil'].'</option>';
                                       
                                    }
     
              
                         
      
           
    
                echo '</select>';
         }
         else
         {
			 echo '<option>Sin resultados...</option></select>';
			 
		 }                
           
             
           
        ?>
                No. Hijos: <select name="noHijos" id="noHijos" maxlength="10" style="width:25%;"><option>Selecciona</option>
            <?php
              
                  $cmbHijos=new Usuario();
        $hijos = $cmbHijos->listaNoHijos();
        
    if($hijos != '')
    {
        
                                    foreach($hijos as $hijo)
                                    {
                                       $cont++;
                                       if($objUsuario->usu_hijos == $hijo['id_hijos'])
                                         echo '<option value='.$hijo['id_hijos'].' selected>'.$hijo['descr_hijos'].'</option>';
                                       else
                                          echo '<option value='.$hijo['id_hijos'].'>'.$hijo['descr_hijos'].'</option>';
                                       
                                    }
     
              
                         
      
           
    
                echo '</select>';
         }
         else
         {
			 echo '<option>Sin resultados...</option></select>';
			 
		 }                
           
             
           
        ?>
        </td>
    </tr>
        
        
        
         <tr>
    <td class="derecha">
            Peso:
        </td>
      <td style="width:75%;">
            <input type="text" id="peso" name="peso" maxlength="3" style="width:20%;">
            Talla:  <input type="text" id="talla" name="talla" maxlength="4" style="width:20%;" onkeypress="calcIMC()">
            IMC:  <input type="text" id="imc" name="imc" maxlength="5" style="width:20%;" readonly/>
        </td>
    </tr>
        
    
    

    
</table><br>
</div>
<!-- 
<div id="tabs-3">
<table style="width:100%;" border="0">
    <tr>
     <td class="derecha">
            Fecha:
        </td>
        <td style="width:75%;">
            <input type="text" id="datepicker" style="width:15%;"/>
        </td>
    </tr>
    
        <tr>
    <td class="derecha">
            Hoja de conciliación:
        </td>
        <td style="width:75%;">
            <input type="text" id="usr_ap_pat" name="usr_ap_pat" maxlength="50" style="width:70%;">
        </td>
    </tr>
    <tr>
    <td class="derecha">
            Liquidación Calculo de ley:
        </td>
      <td style="width:75%;">
            <input type="text" id="usr_sueldo" name="usr_sueldo" maxlength="10" style="width:15%;">
        </td>
    </tr>
    
    <tr>
    <td class="derecha">
            Liquidación otorgada:
        </td>
      <td style="width:75%;">
            <input type="text" id="usr_sueldo" name="usr_sueldo" maxlength="10" style="width:15%;">
        </td>
    </tr>
    
        
        
    <tr>
    <td class="derecha">
            Formato E3:
        </td>
    <td style="width:75%;">
           <input type="checkbox" name="contrato" value="contrato">
        </td>
    </tr>
    
   
   
    

    
</table><br>
</div>
-->
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
         echo '<input type=button value=Guardar class=boton onclick=submitClicked()>';  
    ?>	       
     &nbsp;&nbsp;&nbsp; <input type="button" value="Regresar" class="boton" onClick="regresar()"></center>


   	</section>

   </body>

</html>
