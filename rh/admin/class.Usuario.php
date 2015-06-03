<?php
include_once("class.Database.php");
class Usuario
{
	public $id_usuario;
    public $usu_img;
    public $usu_nombre;
    public $usu_ape_pat;
    public $usu_ape_mat;
    public $usu_usuario;
    public $usu_password;
    public $fk_id_puesto;
    public $fk_id_rol;
    public $usu_fec_nac;
    public $usu_fec_ing;
    public $usu_slrio_drio;
    public $usu_fk_id_empr;
    public $usu_fk_id_suc;
    public $usu_fk_id_dep;
    public $usu_hra_entr;
    public $usu_hra_sal;
    public $usu_tolerancia;
    public $usu_calle_no;
    public $fk_id_colonia;
    public $usu_cp;
    public $usu_coord;
    public $usu_tel;
    public $usu_cel;
    public $usu_nivel_est;
    public $usu_carrera;
    public $usu_esc_egr;
    public $usu_correo;
    public $usu_est_civil;
    public $usu_hijos;
    public $usu_peso;
    public $usu_talla;
    public $usu_imc;
    
    
  function __construct($id_usuario)
    {
        $usuario = Database::select("SELECT id_usuario, 
	usu_nombre, 
	usu_ape_pat, 
	usu_ape_mat, 
	usu_usuario, 
	usu_password, 
	fk_id_puesto, 
	fk_id_rol, 
	DATE_FORMAT(usu_fec_nac,'%d/%m/%Y') as usu_fec_nac,  
	DATE_FORMAT(usu_fec_ing,'%d/%m/%Y') as usu_fec_ing, 
	usu_slrio_drio, 
	usu_fk_id_empr, 
	usu_fk_id_suc, 
	usu_fk_id_dep, 
	usu_hra_entr, 
	usu_hra_sal, 
	usu_tolerancia, 
	usu_calle_no, 
	fk_id_colonia, 
	usu_cp, 
	usu_coord, 
	usu_tel, 
	usu_cel, 
	usu_nivel_est , 
	usu_carrera, 
	usu_esc_egr, 
	usu_correo, 
	usu_est_civil, 
	usu_hijos, 
	usu_peso, 
	usu_talla, 
	usu_imc,
	usu_img
	 FROM usuario WHERE id_usuario = $id_usuario");
        $usuario = $usuario[0];
        $this->id_usuario = $usuario['id_usuario'];
        $this->usu_img = $usuario['usu_img'];
        
        $this->usu_nombre = $usuario['usu_nombre'];
        
        $this->usu_ape_pat = $usuario['usu_ape_pat'];
        
        $this->usu_ape_mat = $usuario['usu_ape_mat'];
        
        $this->usu_usuario = $usuario['usu_usuario'];
        
        $this->usu_password = $usuario['usu_password'];
        
             $this->fk_id_puesto = $usuario['fk_id_puesto'];
        
        $this->fk_id_rol = $usuario['fk_id_rol'];
        
        $this->usu_fec_nac = $usuario['usu_fec_nac'];
  
        $this->usu_fec_ing = $usuario['usu_fec_ing'];
        
        $this->usu_slrio_drio = $usuario['usu_slrio_drio'];
        
        $this->usu_fk_id_empr = $usuario['usu_fk_id_empr'];
        
        $this->usu_fk_id_suc = $usuario['usu_fk_id_suc'];
        
        $this->usu_fk_id_dep = $usuario['usu_fk_id_dep'];
          
        $this->usu_hra_entr = $usuario['usu_hra_entr'];
            
        $this->usu_hra_sal = $usuario['usu_hra_sal'];
              
        $this->usu_tolerancia = $usuario['usu_tolerancia'];
                
        $this->usu_calle_no = $usuario['usu_calle_no'];
        $this->fk_id_colonia = $usuario['fk_id_colonia'];
        $this->usu_cp = $usuario['usu_cp'];
        $this->usu_coord = $usuario['usu_coord'];
        $this->usu_tel = $usuario['usu_tel'];
         $this->usu_cel = $usuario['usu_cel'];
          $this->usu_nivel_est = $usuario['usu_nivel_est'];
           $this->usu_carrera = $usuario['usu_carrera'];
            $this->usu_esc_egr = $usuario['usu_esc_egr'];
             $this->usu_correo = $usuario['usu_correo'];
              $this->usu_est_civil = $usuario['usu_est_civil'];
               $this->usu_hijos = $usuario['usu_hijos'];
                $this->usu_peso = $usuario['usu_peso'];
                   $this->usu_talla = $usuario['usu_talla'];
                 $this->usu_tel = $usuario['usu_tel'];
                  $this->usu_imc = $usuario['usu_imc'];
                  
        
       
    }
    
    public static function generarPassword($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz23456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++)
        {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

     public static function agregarUsuario($nombre,$apellido_paterno, $apellido_materno,$puesto,
     $rol,
     $fec_nac,$fec_ing,
     $salario,
     $fkEmpresa,
     $fkSucursal,
     $fkDepartamento,
     $hraEntrada,
     $hraSalida,
     $tolerancia,
     $calleNo,
     $colonia,
     $cP,
     $coordenadas,
     $telefono,
     $celular,
     $nivelEstudio,
     $carrera,
     $escEgresada,
     $correo,
     $estCivil,
     $noHijos,
     $peso,
     $talla,
     $imc,
     $usuarioAlta)
    
     
    {
		try{
		 $usuario = Usuario::generarPassword(6);
		    $password = Usuario::generarPassword(8);
   $tDate = explode("/",$fec_nac);
              $ifecha_nac = $tDate[2]."-".$tDate[1]."-".$tDate[0];
              
              $tDateing = explode("/",$fec_ing);
              $ifecha_ing = $tDateing[2]."-".$tDateing[1]."-".$tDateing[0];
        $query = "INSERT INTO `usuario` 
	(`usu_nombre`, 
	`usu_ape_pat`, 
	`usu_ape_mat`, 
	`usu_usuario`, 
	`usu_password`, 
	`fk_id_puesto`, 
	`fk_id_rol`, 
	`usu_fec_nac`, 
	`usu_fec_ing`, 
	`usu_slrio_drio`, 
	`usu_fk_id_empr`, 
	`usu_fk_id_suc`, 
	`usu_fk_id_dep`, 
	`usu_hra_entr`, 
	`usu_hra_sal`, 
	`usu_tolerancia`, 
	`usu_calle_no`, 
	`fk_id_colonia`, 
	`usu_cp`, 
	`usu_coord`, 
	`usu_tel`, 
	`usu_cel`, 
	`usu_nivel_est`, 
	`usu_carrera`, 
	`usu_esc_egr`, 
	`usu_correo`, 
	`usu_est_civil`, 
	`usu_hijos`, 
	`usu_peso`, 
	`usu_talla`, 
	`usu_imc`, 
	`usu_alta`, 
	`usu_fec_alta`)
	VALUES
	('$nombre', 
	'$apellido_paterno', 
	'$apellido_materno',
	'$usuario',
	'$password',
	$puesto, 
	$rol,
	'$ifecha_nac','$ifecha_ing',$salario,
     '$fkEmpresa','$fkSucursal',
     '$fkDepartamento','$hraEntrada','$hraSalida',
     '$tolerancia','$calleNo','$colonia','$cP',
     '$coordenadas','$telefono','$celular',
     '$nivelEstudio','$carrera','$escEgresada',
     '$correo','$estCivil','$noHijos','$peso',
     $talla,'$imc','$usuarioAlta',now())";
        return Database::insert($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
     public static function listaUsuario()
    {
		try{
        $query = "SELECT id_usuario, 
	usu_nombre, 
	usu_ape_pat, 
	usu_ape_mat, 
	usu_usuario, 
	usu_password, 
	fk_id_rol, 
	usu_fec_nac, 
	DATE_FORMAT(usu_fec_ing,'%d/%m/%Y') as usu_fec_ing, 
	usu_slrio_drio, 
	usu_fk_id_empr, 
	usu_fk_id_suc, 
	usu_fk_id_dep, 
	usu_hra_entr, 
	usu_hra_sal, 
	usu_tolerancia, 
	usu_calle_no, 
	fk_id_colonia, 
	usu_cp, 
	usu_coord, 
	usu_tel, 
	usu_cel, 
	(CASE usu_nivel_est
	WHEN 'PRI' THEN 'Primaria'
	WHEN 'SEC' THEN 'Secundaria'
	WHEN 'BAC' THEN 'Bachillerato' 
	WHEN 'TEC' THEN 'Técnico' 
	WHEN 'PRO' THEN 'Profesional' 
	WHEN 'MAE' THEN 'Maestría' 
	WHEN 'DOC' THEN 'Doctorado'  
        END) as usu_nivel_est , 
	usu_carrera, 
	usu_esc_egr, 
	usu_correo, 
	usu_est_civil, 
	usu_hijos, 
	usu_peso, 
	usu_talla, 
	usu_imc, 
	usuario.usu_alta, 
	usuario.usu_fec_alta,
	rol_descr,
	descr_nivel,usu_img
	  from usuario join rol on
	  fk_id_rol=id_rol
	  join nivel_est on id_nivel=usu_nivel_est";
        return Database::select($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
    public static function regresaUsuario($idUsr)
    {
		try{
        $query = "SELECT id_usuario, 
	usu_nombre, 
	usu_ape_pat, 
	usu_ape_mat, 
	usu_usuario, 
	usu_password, 
	fk_id_rol, 
	usu_fec_nac, 
	DATE_FORMAT(usu_fec_ing,'%d/%m/%Y') as usu_fec_ing, 
	usu_slrio_drio, 
	usu_fk_id_empr, 
	usu_fk_id_suc, 
	usu_fk_id_dep, 
	usu_hra_entr, 
	usu_hra_sal, 
	usu_tolerancia, 
	usu_calle_no, 
	fk_id_colonia, 
	usu_cp, 
	usu_coord, 
	usu_tel, 
	usu_cel, 
	(CASE usu_nivel_est
	WHEN 'PRI' THEN 'Primaria'
	WHEN 'SEC' THEN 'Secundaria'
	WHEN 'BAC' THEN 'Bachillerato' 
	WHEN 'TEC' THEN 'Técnico' 
	WHEN 'PRO' THEN 'Profesional' 
	WHEN 'MAE' THEN 'Maestría' 
	WHEN 'DOC' THEN 'Doctorado'  
        END) as usu_nivel_est , 
	usu_carrera, 
	usu_esc_egr, 
	usu_correo, 
	usu_est_civil, 
	usu_hijos, 
	usu_peso, 
	usu_talla, 
	usu_imc, 
	usuario.usu_alta, 
	usuario.usu_fec_alta,
	rol_descr,
	nombre_empresa,nombre_suc,nombre_depto,usu_img
	  from usuario join rol on
	  fk_id_rol=id_rol
	  join empresa on usu_fk_id_empr=id_empresa
	  join sucursal on usu_fk_id_suc=id_suc
	  join departamento on usu_fk_id_dep=id_depto
	  where id_usuario=$idUsr";
        return Database::select($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }


public static function regresaUsrDep($idDepto)
    {
		try{
        $query = "SELECT id_usuario, 
	usu_nombre, 
	usu_ape_pat, 
	usu_ape_mat, 
	usu_usuario, 
	usu_password, 
	fk_id_rol, 
	usu_fec_nac, 
	DATE_FORMAT(usu_fec_ing,'%d/%m/%Y') as usu_fec_ing, 
	usu_slrio_drio, 
	usu_fk_id_empr, 
	usu_fk_id_suc, 
	usu_fk_id_dep, 
	usu_hra_entr, 
	usu_hra_sal, 
	usu_tolerancia, 
	usu_calle_no, 
	fk_id_colonia, 
	usu_cp, 
	usu_coord, 
	usu_tel, 
	usu_cel, 
	(CASE usu_nivel_est
	WHEN 'PRI' THEN 'Primaria'
	WHEN 'SEC' THEN 'Secundaria'
	WHEN 'BAC' THEN 'Bachillerato' 
	WHEN 'TEC' THEN 'Técnico' 
	WHEN 'PRO' THEN 'Profesional' 
	WHEN 'MAE' THEN 'Maestría' 
	WHEN 'DOC' THEN 'Doctorado'  
        END) as usu_nivel_est , 
	usu_carrera, 
	usu_esc_egr, 
	usu_correo, 
	usu_est_civil, 
	usu_hijos, 
	usu_peso, 
	usu_talla, 
	usu_imc, 
	usuario.usu_alta, 
	usuario.usu_fec_alta,
	rol_descr,
	nombre_empresa,nombre_suc,nombre_depto,usu_img
	  from usuario join rol on
	  fk_id_rol=id_rol
	  join empresa on usu_fk_id_empr=id_empresa
	  join sucursal on usu_fk_id_suc=id_suc
	  join departamento on usu_fk_id_dep=id_depto
	  where id_depto=$idDepto";
        return Database::select($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
    public static function buscarEmpleado($busqueda)
    {
		try{
        $query = "SELECT id_usuario, 
	usu_nombre, 
	usu_ape_pat, 
	usu_ape_mat, 
	usu_usuario, 
	usu_password, 
	fk_id_rol, 
	usu_fec_nac, 
	DATE_FORMAT(usu_fec_ing,'%d/%m/%Y') as usu_fec_ing, 
	usu_slrio_drio, 
	usu_fk_id_empr, 
	usu_fk_id_suc, 
	usu_fk_id_dep, 
	usu_img
	  from usuario join rol on
	  fk_id_rol=id_rol
	  join empresa on usu_fk_id_empr=id_empresa
	  join sucursal on usu_fk_id_suc=id_suc
	  join departamento on usu_fk_id_dep=id_depto
	  where usu_nombre LIKE '$busqueda%'";
        return Database::select($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }


public static function valida_usuario($usuario,$password){
           try{
               $query="select fk_id_rol from usuario where usu_usuario='".$usuario."' and usu_password='".$password."'";
               //$consulta=mysql_query($validar) or die('Error en la validación del usuario y contraseña: ' . mysql_error());
			   return Database::select($query);

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
    public static function obtener_usuario($usuario,$contrasena){
           try{
               $query="select id_usuario,usu_nombre,usu_usuario from usuario
     where usu_usuario='".$usuario."' and usu_password='".$contrasena."'";
               return Database::select($query);

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
     function listaRolesUsr(){
           try{
               $query="select id_rol,rol_descr from rol";
               return Database::select($query);

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
     function listaPuestos(){
           try{
               $query="select id_puesto,descr_puesto from puesto";
               return Database::select($query);

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
    function listaNivelEst(){
           try{
               $query="select * from nivel_est";
               return Database::select($query);

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
    function listaEstCivil(){
           try{
               $query="select * from est_civil";
               return Database::select($query);

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
        function listaNoHijos(){
           try{
               $query="select * from num_hijos";
               return Database::select($query);

             }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }
    
    public static function sesion_activa(){
 try{
       session_start();
       if(!isset($_SESSION["usuario"]))
       {
         header("Location: /index.php");
       }
 }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    }

  function asignarFoto($foto)
    {
        $query = "UPDATE usuario SET usu_img = '$foto' WHERE id_usuario = $this->id_usuario";
        return Database::update($query);
    }
    
    function eliminaUsuario()
    {
        $query = "delete from usuario WHERE id_usuario = $this->id_usuario";
        return Database::update($query);
    }
    
    public static function actualizaUsuario($nombre,$apellido_paterno, $apellido_materno,$puesto,
     $rol,
     $fec_nac,$fec_ing,
     $salario,
     $fkEmpresa,
     $fkSucursal,
     $fkDepartamento,
     $hraEntrada,
     $hraSalida,
     $tolerancia,
     $calleNo,
     $colonia,
     $cP,
     $coordenadas,
     $telefono,
     $celular,
     $nivelEstudio,
     $carrera,
     $escEgresada,
     $correo,
     $estCivil,
     $noHijos,
     $peso,
     $talla,
     $imc,
     $usuarioAlta,
     $id_usuario)
    
     
    {
		try{
		 $usuario = Usuario::generarPassword(6);
		    $password = Usuario::generarPassword(8);
   $tDate = explode("/",$fec_nac);
              $ifecha_nac = $tDate[2]."-".$tDate[1]."-".$tDate[0];
              
              $tDateing = explode("/",$fec_ing);
              $ifecha_ing = $tDateing[2]."-".$tDateing[1]."-".$tDateing[0];
        $query = "update usuario set 
	`usu_nombre`='$nombre', 
	`usu_ape_pat`='$apellido_paterno', 
	`usu_ape_mat`='$apellido_materno', 
	`fk_id_puesto`=$puesto, 
	`fk_id_rol`=$rol, 
	`usu_fec_nac`='$ifecha_nac', 
	`usu_fec_ing`='$ifecha_ing', 
	`usu_slrio_drio`='$salario', 
	`usu_fk_id_empr`='$fkEmpresa', 
	`usu_fk_id_suc`='$fkSucursal', 
	`usu_fk_id_dep`='$fkDepartamento', 
	`usu_hra_entr`='$hraEntrada', 
	`usu_hra_sal`='$hraSalida', 
	`usu_tolerancia`='$tolerancia', 
	`usu_calle_no`='$calleNo', 
	`fk_id_colonia`='$colonia', 
	`usu_cp`='$cP', 
	`usu_coord`='$coordenadas', 
	`usu_tel`='$telefono', 
	`usu_cel`='$celular', 
	`usu_nivel_est`='$nivelEstudio', 
	`usu_carrera`='$carrera', 
	`usu_esc_egr`='$escEgresada', 
	`usu_correo`='$correo', 
	`usu_est_civil`='$estCivil', 
	`usu_hijos`='$noHijos', 
	`usu_peso`='$peso', 
	`usu_talla`='$talla', 
	`usu_imc`='$imc', 
	`usu_mod`='$usuarioAlta', 
	`usu_fec_mod`=now() where id_usuario='$id_usuario'";
        return Database::update($query);
        }catch (Exception $e) {
              echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
    
   } 
}
