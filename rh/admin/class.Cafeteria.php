<?php
include_once("class.Database.php");
class Cafeteria
{
	public $id_art;
    public $descr_art;
    public $precio_art;
    public $fk_id_suc;
    
    
  function __construct($id_usuario)
    {
        $usuario = Database::select("SELECT id_art, 
	descr_art, 
	precio_art, 
	fk_id_suc, 
	
	FROM articulo WHERE id_usuario = $id_usuario");
        $articulo = $articulo[0];
        $this->id_art = $usuario['id_art'];
        $this->descr_art = $usuario['descr_art'];
        $this->precio_art = $usuario['precio_art'];
        $this->fk_id_suc = $usuario['fk_id_suc'];
        
       

                  
        
       
    }


     public static function agregarUsuario($nombre,$apellido_paterno, $apellido_materno,
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
}
   
