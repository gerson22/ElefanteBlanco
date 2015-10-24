<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validacion</title>
</head>

<body>
<?php
        include 'rh/admin/conexion.php';
        include 'rh/admin/controlador.php';
        conectar();
if(isset($_POST['usuario']) && isset ($_POST['password']))
{

                  $usuario=$_POST['usuario'];
                  $password=$_POST['password'];
        	  $valida=valida_usuario($usuario,$password);
		  $result=mysql_fetch_array($valida);
		 // echo $result["usu_rol"];
}

   if($result['usu_rol']=='Administrador' || $result['usu_rol']=='Finanzas' || $result['usu_rol']=='Capturista' || $result['usu_rol']=='Cafeteria')
   {
   
       
         $_SESSION['usuario']=$usuario;
         $_SESSION['contrasena']=$password;
         $_SESSION['tipo'] =$result["usu_rol"];
         $user=obtener_usuario($_SESSION['usuario'],$_SESSION['contrasena']);
                     $result=mysql_fetch_array($user);
                     //$_SESSION['usuarioID']=$result['id_usuario'];
                    // $usu_cancha=obtener_usuario_cancha($_SESSION['usuarioID'],$result['id_cancha']);
                     //$result_usuario=mysql_fetch_array($usu_cancha);
                     //$_SESSION['cancha_id']=$result_usuario['id_cancha'];
               
   
echo'
    <script>
        document.location="rh/admin/index2.html";
 	</script>';
  }    
else
{

 if($result['usu_rol']=='Arbitro')
   {
   
       
         $_SESSION['usuario']=$usuario;
         $_SESSION['contrasena']=$password;
         $_SESSION['tipo'] =$result["usu_rol"];
   
//echo'
    //<script>
       // document.location="indexArbitro.php";
 	//</script>';
  }    
else 
{
session_destroy();
}
}


?>

  <script>  
	alert("Nombre de usuario o password incorrecto, verifique por favor...");
  document.location="index.php";
	</script>

</body>
</html>



