<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Canciones extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->model('orpha_model');

	}
	function index(){
		$data['segmento'] = $this->uri->segment(3);
		$this->load->view('orpha\headers');
		if(!$data['segmento']){
			$data['canciones'] = $this->orpha_model->obtenerCanciones();
			$this->load->view('canciones\canciones', $data);
		}
		else{
			$data['canciones'] = $this->orpha_model->obtenerCancion($data['segmento']);
			$this->load->view('canciones\cancion', $data);
		}		 	
	}


	function nuevo(){
		$this->load->view('orpha\headers');
		$this->load->view('canciones\formulario');	
	}
	function recibirDatos(){
		$data = array(
				'artista' => $this->input->post('artista'),
				'cancion' => $this->input->post('cancion'),
				'genero' => $this->input->post('genero'),
				'duracion' => $this->input->post('duracion'),
				'estado' => $this->input->post('estado'),
				'url' => $this->input->post('url')
			);
		$this->orpha_model->crearCurso($data);
		$this->load->view('orpha\headers');


		$this->load->library('menu' , array('Inicio', 'contactos', 'cursos'));
		$menus['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('orpha\bienvenido', $menus);
	}
	function editar(){
		$data['id'] = $this->uri->segment(3);
		$data['cancion'] = $this->orpha_model->obtenerCancion($this->uri->segment(3));
		$this->load->view('orpha/headers');
		$this->load->view('canciones/edit', $data);
	}
	function borrar(){
		$this->orpha_model->eliminarCancion($this->uri->segment(3));
	}
	function actualizar(){
		$data = array(
				'artista' => $this->input->post('artista'),
				'cancion' => $this->input->post('cancion'),
				'genero' => $this->input->post('genero'),
				'duracion' => $this->input->post('duracion'),
				'estado' => $this->input->post('estado'),
				'url' => $this->input->post('url')
			);
			$this->orpha_model->actualizarCancion($this->uri->segment(3),$data);
			redirect(base_url());
	}
	function sendMail(){
		$this->load->library('email');
		$configuraciones['mailtype'] = 'html';
		$this->email->initialize($configuraciones);
		$this->email->from('jporpha@gmail.com','Juan Pablo Orphanopoulos');
		$this->email->to('jporpha@gmail.com');

		$this->email->subject('Prueba Mail');
		$this->email->message('<p>Mensaje de prueba....</p> <strong>prueba....</strong>');

		if($this->email->send()){
			echo"correo enviado";
		}else{
			echo"correo no enviado";
		}
	}

	function prueba(){
		$this->load->view('canciones/prueba');

	}

}


?>