<?php

      function valida_usuario($usuario,$password){
           try{
               $validar="select usu_rol from usuario where usu_usuario='".$usuario."' and usu_password='".$password."'";
               $consulta=mysql_query($validar) or die('Error en la validación del usuario y contraseña: ' . mysql_error());
			   return $consulta;

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
     function sesion_activa(){
 try{
       session_start();
       if(!isset($_SESSION["usuario"]))
       {
         header("Location: index.php");
       }
 }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
    function obtener_usuario($usuario,$contrasena){
           try{
               $query="select id_usuario,usu_nombre,usu_usuario from usuario
     where usu_usuario='".$usuario."' and usu_password='".$contrasena."'";
               $consulta=mysql_query($query) or die('Error en la consulta de usuario: ' . mysql_error());
			   return $consulta;

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

     /*************************INICIO FUNCIONES DE TORNEO*****************************************************************/

    function torneo_activo($id_cancha){
           try{
               $listado="SELECT torneo_id,torneo_desc FROM torneo JOIN
                       cancha ON fk_id_cancha=id_cancha WHERE torneo_estatus=1 AND id_cancha='".$id_cancha."'";
               $consulta=mysql_query($listado) or die('Error en la consulta del torneo activo: ' . mysql_error());
			   return $consulta;

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

     function listado_torneo($id_cancha){
           try{
               $listado="SELECT torneo_id, torneo_desc, CASE WHEN torneo_estatus=0 THEN 'CERRADO' WHEN torneo_estatus=1
THEN 'ABIERTO' END AS torneo_estatus
FROM torneo where fk_id_cancha='".$id_cancha."' order by torneo_estatus,torneo_id asc";
               $consulta=mysql_query($listado) or die('Error en la consulta de torneos: ' . mysql_error());
			   return $consulta;

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

     function combo_torneos($id_cancha){
           try{
               $listado="SELECT torneo_id, torneo_desc, CASE WHEN torneo_estatus=0 THEN 'INACTIVO' WHEN torneo_estatus=1
THEN 'ACTIVO' END AS torneo_estatus
FROM torneo where torneo_estatus=1 and fk_id_cancha='".$id_cancha."'";
               $consulta=mysql_query($listado) or die('Error en la consulta de torneos: ' . mysql_error());
			   return $consulta;

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

     function insertar_torneo($torneo_desc,$cancha_id,$usu_alta){
 try{

         $agregar="insert into torneo (torneo_desc,torneo_estatus,fk_id_cancha,usu_alta,usu_fec)
             values('".$torneo_desc."',1,'".$cancha_id."','".$usu_alta."',now())";
               mysql_query($agregar) or die('Error al registrar el torneo: ' . mysql_error());
           return $agregar;
    }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

     function verifica_torneo_nombre($torneo_desc){
           try{
               $verifica="SELECT * FROM torneo WHERE torneo_desc='".$torneo_desc."'";
               $consulta=mysql_query($verifica) or die('Error en la consulta de torneo: ' . mysql_error());
			   return mysql_num_rows($consulta);

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

     function listaEmpresa(){
           try{
               $query="select * from empresa";
               $consulta=mysql_query($query) or die('Error en la consulta de empresas: ' . mysql_error());
			   return $consulta;

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

    function modifica_torneo($torneo_desc,$estado,$torneo_id,$usu_mod){
 try{

         $modifica="update torneo set torneo_desc='".$torneo_desc."',torneo_estatus='$estado',usu_mod='".$usu_mod."',usu_fec=now() where torneo_id='".$torneo_id."'";
               mysql_query($modifica) or die('Error al actualizar el torneo: ' . mysql_error());

    }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

        function act_torneo_actual($torneo_estatus,$torneo_id){
 try{

         $modifica="update torneo set torneo_estatus='".$torneo_estatus."' where torneo_id='".$torneo_id."'";
               mysql_query($modifica) or die('Error al actualizar el torneo: ' . mysql_error());

    }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

    function act_torneo_inactivo($torneo_est,$torn_id){
 try{

         $modifica2="update torneo set torneo_estatus='".$torneo_est."' where torneo_id='".$torn_id."'";
               mysql_query($modifica2) or die('Error al actualizar el torneo: ' . mysql_error());

    }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

     function eliminar_torneo($torneo_id){
 try{

         $eliminar="delete from torneo where torneo_id='".$torneo_id."'";
            mysql_query($eliminar) or die('Error al eliminar el torneo ' . mysql_error());

    }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

    



	    
	    function startTransaction()
    {
    mysql_query("BEGIN");
    }
 
function breakTransaction()
    {
    $msg = "Transaccion abortada debido a un error: ".mysql_error();
    mysql_query("ROLLBACK");
    return $msg;
    }
 
function commitTransaction()
    {
    mysql_query("COMMIT");
    }
function insert($nombres,$apellido_paterno, $apellido_materno,$usu_sueldo)
{
    try
    {          
		 
                    startTransaction();
        $sql="INSERT INTO `usuario` 
	(`usu_nombre`, 
	`usu_ape_pat`, 
	`usu_ape_mat`, 
	`usu_sueldo`,
	`usu_usuario`, 
	`usu_password`, 
	`usu_alta`, 
	`usu_fec_alta`)
	VALUES
	('$nombres', 
	'$apellido_paterno', 
	'$apellido_materno', 
	'$usu_sueldo', 
	'usu_usuario', 
	'usu_password', 
	'usu_alta', 
	now())";    			    

         $consulta=mysql_query($sql) or die(breakTransaction());
		           commitTransaction();
			   	 
	       }catch(Exception $e)
	       {
	         echo 'Excepción capturada: ',  $e->getMessage(), "\n";
     }
  } 
  
?>
