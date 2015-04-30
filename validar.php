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
include_once("rh/admin/class_lib2.php");
if(isset($_POST['usuario']) && isset ($_POST['password']))
{

                  $usuario=$_POST['usuario'];
                  $password=$_POST['password'];
        	  $valida=Usuario::valida_usuario($usuario,$password);
		  
		 // echo $result["usu_rol"];
}

   if($valida[0]['fk_id_rol']!='')
   {
   
       
         $_SESSION['usuario']=$usuario;
         $_SESSION['contrasena']=$password;
         $_SESSION['tipo'] =$valida[0]["fk_id_rol"];
         $user=Usuario::obtener_usuario($_SESSION['usuario'],$_SESSION['contrasena']);
         //echo $_SESSION['usuario'];
                     //$result=mysql_fetch_array($user);
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

session_destroy();
echo '<script>  
	alert("Nombre de usuario o password incorrecto, verifique por favor...");
  document.location="index.php";
	</script>';
}


?>

  
</body>
</html>



