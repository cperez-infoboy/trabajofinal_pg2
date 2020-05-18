<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        
    }

    function listaUsuarios()
    {
        $sql = "SELECT usuario, nombre, (CASE estado WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END) AS descestado, estado FROM usuario";
        $query = $this->db->query($sql); 
        
        return $query->result_array();
    }
    
    function insertaUsuario($datosusuario) {  
        $data = array(
            'usuario' => strval($datosusuario->usuario),
            'nombre' => strval($datosusuario->nombre),
            'estado' => intval($datosusuario->estado)
        );
        
        if(!$this->db->insert('usuario', $data)) {
            $error = $this->db->error();
            
            if($error['code'] == 1062)  
                throw new Exception('Los datos del usuario ya existen');
            else 
                throw new Exception('Ha ocurrido un error al grabar los datos del usuario');
        }
            
    }
}

?>