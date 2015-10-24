<?php
include_once("class.Persona.php");
//include_once("class.CicloEscolar.php");

class Maestro extends Persona
{
    function __construct($id_usuario)
    {
        $persona = Database::select("SELECT * FROM usuario WHERE id_usuario = $id_usuario");
        $persona = $persona[0];
        $this->foto                 = $persona['usu_img'];
        
    }

     public static function insert($nombres,$apellido_paterno, $apellido_materno)
    {
       // $password = parent::generarPassword(8);
        $query = "INSERT INTO `usuario` 
	(`usu_nombre`, 
	`usu_ape_pat`, 
	`usu_ape_mat`, 
	`usu_usuario`, 
	`usu_password`, 
	`usu_alta`, 
	`usu_fec_alta`)
	VALUES
	('$nombres', 
	'$apellido_paterno', 
	'$apellido_materno', 
	'usu_usuario', 
	'usu_password', 
	'usu_alta', 
	now())";
        return Database::insert($query);
    }
    

    
    static function agregarEmpresa($nombreEmpr)
    {
       // $password = parent::generarPassword(8);
        $query = "INSERT INTO `empresa` 
	(`nombre_empresa`, 
	`usu_alta`, 
	`usu_fec_alta`)
	VALUES
	('$nombreEmpr', 
	'isaac', 
	now())";
        return Database::insert($query);
    }
    
      static function agregarPuesto($nombrePuesto,$usr)
    {
       // $password = parent::generarPassword(8);
        $query = "INSERT INTO `puesto` 
	(`descr_puesto`, 
	`usu_alta`, 
	`usu_fec_alta`)
	VALUES
	('$nombrePuesto', 
	'$usr', 
	now())";
        return Database::insert($query);
    }
    
     static function agregarSucursal($nombreSuc,$fk_empresa)
    {
       // $password = parent::generarPassword(8);
        $query = "INSERT INTO `sucursal` 
	(`nombre_suc`, 
	`fk_id_empresa`, 
	`usu_alta`, 
	`usu_fec_alta`)
	VALUES
	('$nombreSuc',
	 '$fk_empresa',
	'isaac', 
	now())";
        return Database::insert($query);
    }
    

    
     static function agregarDepto($nombreDepto,$fk_suc)
    {
       // $password = parent::generarPassword(8);
        $query = "INSERT INTO `departamento` 
	(`nombre_depto`, 
	`fk_id_suc`, 
	`usu_alta`, 
	`usu_fec_alta`)
	VALUES
	('$nombreDepto',
	 '$fk_suc',
	'isaac', 
	now())";
        return Database::insert($query);
    }
    
   
    
    
    static function listaEmpresas()
    {
        $query = "SELECT  * from empresa";
        return Database::select($query);
    }
    
     static function listaSucursales()
    {
        $query = "SELECT  * from sucursal join
        empresa on id_empresa=fk_id_empresa order by id_empresa";
        return Database::select($query);
    }
    
     static function cmbSucursal($idEmpresa)
    {
        $query = "SELECT  * from sucursal join
        empresa on id_empresa=fk_id_empresa
        where id_empresa=$idEmpresa";
        return Database::select($query);
    }
    
     static function cmbDepto($idSucursal)
    {
        $query = "SELECT  * from departamento join
        sucursal on id_suc=fk_id_suc
        where id_suc=$idSucursal";
        return Database::select($query);
    }
    
    static function listaDepto()
    {
        $query = "SELECT  * from sucursal join
        empresa on id_empresa=fk_id_empresa
        join departamento on fk_id_suc=id_suc order by id_suc";
        return Database::select($query);
    }
    
     static function cmbNivelEst()
    {
        $query = "SELECT  * from nivel_est";
        return Database::select($query);
    }
    
            static function eliminaEmpresa($idEmpresa)
    {
        $query = "delete from empresa WHERE id_empresa = $idEmpresa";
        return Database::update($query);
    }
    
                static function eliminaSucursal($idSuc)
    {
        $query = "delete from sucursal WHERE id_suc = $idSuc";
        return Database::update($query);
    }
    
     static function eliminaDepto($idSuc)
    {
        $query = "delete from departamento WHERE id_depto = $idSuc";
        return Database::update($query);
    }
    
         static function eliminaPuesto($idPuesto)
    {
        $query = "delete from puesto WHERE id_puesto = $idPuesto";
        return Database::update($query);
    }
    
    static function listaPuestos()
    {
        $query = "SELECT  * from puesto";
        return Database::select($query);
    }
    
}
