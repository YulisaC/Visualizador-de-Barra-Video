<?php

class Model_Usuario extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //la funcion de Select * en sql
    public function selVideos(){
        $query = $this->db->query("Select * from cat_videos");
        //retornamos todos los registros de la tabla cat_usuarios
        return $query->result();
    }
    
     public function selEstatus(){
        $query = $this->db->query("Select * from cat_estatus");
        //retornamos todos los registros de la tabla cat_usuarios
        return $query->result();
    }   

     public function selUsuario(){
        $query = $this->db->query("Select * from cat_usuarios");
        //retornamos todos los registros de la tabla cat_usuarios
        return $query->result();
    } 
    
    //funcion para insertar usuarios
   public function ins_videos($txtusuario, $titulo, $descripcion, $imageprincipal, $user_file, $txtestatus){
        $arrayDatos = array(
            'eCodUsuario' =>$txtusuario,
            'tTitulo' => $titulo,
            'tDescripcion' => $descripcion,
            'tImagePrincipal' => $imageprincipal,
            'tVideo' => $user_file,
            'eCodEstatus' =>$txtestatus,
        );
        
        $this->db->insert('cat_videos', $arrayDatos);  
        $this->session->set_flashdata('msg', 'Registrado!');
        redirect(base_url(''));
   }
    
    //funcion para listar los usuarios
    public function list_usuarios(){
            $query = $this->db->query("SELECT cu.*,ce.tNombre as tEstatus, cc.tNombre as tUsuario  FROM cat_videos cu INNER JOIN cat_estatus ce ON cu.eCodEstatus = ce.eCodEstatus INNER JOIN cat_usuarios cc ON cu.eCodUsuario = cc.eCodUsuario");

       return $query->result();
    }  
    

}          