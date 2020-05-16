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
        /*
        $sql = "INSERT INTO usuario(usuario, nombre, estado) VALUES (?,?,?)";
        
        $this->db->query($sql, array($datosusuario->usuario,
                                     $datosusuario->nombre,
                                     $datosusuario->estado));
        */
        
        $data = array(
            'usuario' => strval($datosusuario->usuario),
            'nombre' => strval($datosusuario->nombre),
            'estado' => 0
        );
        
        $this->db->insert('usuario', $data);
    }
}

?>