<?php
    function conectar(){
    	$servidor = mysql_connect("localhost","prevenla_rh","rhmeze00") or die('Error de conexion al Servidor: ' . mysql_error());
		$basedatos = mysql_select_db("prevenla_rh") or die('Error de conexion con la BD: ' . mysql_error());
    }
	
  function desconectar(){
		mysql_close();
	}
?>
