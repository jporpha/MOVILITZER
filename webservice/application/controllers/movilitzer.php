<?php
require(APPPATH.'libraries/REST_Controller.php');


class Movilitzer extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('movilitzer_model');
	}




	function obtenerCanciones_get(){//para tabla dinamica cool
		
		$data = $this->movilitzer_model->obtenerCanciones();
		$this->response($data, 200);		 	
	}



	function obtenerCancioness_get(){//para tabla normal
		
		$data = $this->movilitzer_model->obtenerCancioness();
		$this->response($data, 200);		 	
	}




	function obtenerCancion_get(){
		
		$segmento = $this->uri->segment(3);
		$data = $this->movilitzer_model->obtenerCancion($segmento);
		$this->response($data, 200);	 	
	}

	function borrar_get($id){

		$segmento = $this->uri->segment(3);
		print_r($segmento);
		$data = $this->movilitzer_model->eliminarCancion($segmento);
        $this->response($data, 200);
        ?>
		<script type="text/javascript">
 			window.location = "http://localhost/proyectoMovilitzer/movilitzerAdmin/mostrarMusicaDisponible.html"
		</script>
 		<?php
        
	}

	    function actualizar_post($id) {
        $this->load->database();
        $data->id = $this->uri->segment(3);
        $sql = 'SELECT * FROM mus_canciones WHERE id = "'.$this->uri->segment(3).'";';
        $query = $this->db->query($sql);
        $data->old = $query->row();
        $data->changes = $_POST;
        $this->db->where('id', $this->uri->segment(3));
        $this->db->update('mus_canciones', $_POST);
        $data->rows = $this->db->affected_rows();
        $query = $this->db->query($sql);
        $data->new = $query->row();
        $this->response($data, 200);
    }



	function recibirDatos_post(){

		$data = array(
				'artista' => $this->input->post('artista'),
				'cancion' => $this->input->post('cancion'),
				'genero' => $this->input->post('genero'),
				'duracion' => $this->input->post('duracion'),
				'estado' => $this->input->post('estado'),
				'url' => $this->input->post('url')
			);
		$this->movilitzer_model->crearCancion($data);
	}



	function agregarLista_post(){

		$data = array(
				'id' => $this->uri->segment(3)
			);

		$this->movilitzer_model->crearCancionLista($data);
	}



	function agregarUsuarioAdmin_post(){

		if($this->input->post('resInfo')=="on")
		{
			$resInfo=1;
		}else{
			$resInfo=0;
		}

		$data = array(
				'nombre' => $this->input->post('nombre'),
				'mail' => $this->input->post('mail'),
				'password' => $this->input->post('password'),
				'resInfo' => $resInfo
			);
		//$this->movilitzer_model->crearAdmin($data);
	}



}
