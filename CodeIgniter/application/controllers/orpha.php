<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orpha extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->model('orpha_model');

	}
	function index(){
		$this->load->library('menu' , array('Inicio', 'contactos', 'cursos'));
		$data['mi_menu'] = $this->menu->construirMenu();
		$this->load->view('orpha\headers');
		$this->load->view('orpha\bienvenido', $data);

	}
	function holamundo(){
		$this->load->view('orpha\headers');
		$this->load->view('orpha\bienvenido');	
	}
	function nuevo(){
		$this->load->view('orpha\headers');
		$this->load->view('orpha\formulario');	
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
}





?>