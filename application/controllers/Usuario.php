<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller {
    function __construct() {
        parent::__construct();
        /* comunicacion con el modelo */
        $this->load->model('Model_Usuario');
    }

    public function index() {
        $this->db->get('cat_videos');
        $data['contenido'] = "usuario/index"; /* enviar a la plantilla de la vista usuario */
        $data['selVideos'] = $this->Model_Usuario->selVideos();
        $data['selEstatus'] = $this->Model_Usuario->selEstatus();
        $data['selUsuario'] = $this->Model_Usuario->selUsuario();
        $data['list_usuarios'] = $this->Model_Usuario->list_usuarios();
        $this->load->view('plantilla', $data);
    }

     public function subir_archivos(){
        $config['upload_path'] = './archivos/imagenes'; //direccion de la carpeta
        $config['allowed_types'] = 'jpg|png|jpeg|gif'; //formatos de archivo que acepta
        //$config['max_size'] = '10000'; //esta en kB 10000=>9.7656 mb
        $config['overwrite'] = TRUE;
        
        $this->load->library('upload', $config); //libreria de upload
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('imageprincipal')) {
             $data = $this->upload->display_errors();
              print_r($data);
        }
            $imagen = $this->upload->data();

        //segundo archivo
        $configVideo['upload_path'] = './archivos/videos/';
        //$configVideo['remove_spaces']= TRUE;
        //$configVideo['overwrite'] = FALSE;
        //$configVideo['encrypt_name'] = TRUE;
        $configVideo['allowed_types'] = 'mp4|m4a|mp3|flv|avi|zip';
       
        $this->load->library('upload',$configVideo);
        $this->upload->initialize($configVideo);
       // $this->encryption->encrypt($configVideo);
        
        if(!$this->upload->do_upload('user_file')){
            $data = $this->upload->display_errors();
            print_r($data);
        }  
            $video = $this->upload->data();
            
            $datos = $this->input->post();
            $titulo = $datos['titulo'];
            $descripcion = $datos['descripcion'];
            $imageprincipal = $imagen['file_name'];
            $user_file = $video['file_name'];
            $eCodEstatus = $datos['txtestatus'];
            $eCodUsuario = $datos['txtusuario'];
            $this->Model_Usuario->ins_videos($eCodUsuario, $titulo, $descripcion, $imageprincipal, $user_file, $eCodEstatus);
            redirect('');
    }

 }