<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movilitzer_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}



	function crearCancion($data){

		$this->db->insert('mus_canciones', array(
													'artista'=>$data['artista'],
													'cancion'=>$data['cancion'],
													'genero'=>$data['genero'],
													'duracion'=>$data['duracion'],
													'estado'=>$data['estado'],
													'url'=>$data['url']
												)
						);
		?>
		<script type="text/javascript">
 			window.location = "http://localhost/proyectoMovilitzer/movilitzerAdmin"
		</script>
 		<?php

	}




	function crearCancionLista($data){

		$this->load->database();
		$id=$data['id'];

		$sql = 'UPDATE mus_canciones SET estado="0" WHERE id="'.$id.'";';

		$this->db->insert('t_prueba', array(
													'prueba'=>$data['id']
												)
						);
	}



		function crearAdmin($data){

		$this->db->insert('usr_administrador', array(
													'nombre'=>$data['nombre'],
													'mail'=>$data['mail'],
													'password'=>$data['password'],
													'resInfo'=>$data['resInfo']
												)
						);
		?>
		<script type="text/javascript">
 		//	window.location = "http://localhost/proyectoMovilitzer/movilitzerAdmin/admin/"
		</script>
 		<?php
	}




	function obtenerCanciones(){
		$this->load->database();
        $sql = 'SELECT * FROM mus_canciones WHERE estado="1";';
        $query = $this->db->query($sql);
        $data = $query->result();

		for($i=0;$i<count($data);$i++){
			$s=$data[$i];
		
			$array = (array)$s;

			$arrays[]=array($array['artista'],$array['cancion'],$array['genero'],$array['id'],"Agregar");

		}

		$data = array(
		 	"aaData"=>$arrays
		);

		return $data;
	}






	function obtenerCancioness(){
		$this->load->database();
        $sql = 'SELECT * FROM mus_canciones;';
        $query = $this->db->query($sql);
        $data = $query->result();

		return $data;
	}






	function obtenerCancion($id){
		$this->load->database();
        $sql = 'SELECT * FROM mus_canciones WHERE id = "'.$id.'";';
        $query = $this->db->query($sql);
        $data = $query->row();

		return $data;
	}



	function eliminarCancion($id){
		$this->load->database();
        $sql = 'SELECT * FROM mus_canciones WHERE id = "'.$id.'";';
        $query = $this->db->query($sql);
        $data->record = $query->row();
        $criteria = array('id'=>$id);
        $this->db->delete('mus_canciones', $criteria);
        $data->rows = $this->db->affected_rows();
        return $data;
		
	}





	function actualizarCancion($id, $data){

		$datos = array(
			'artista'=>$data['artista'],
			'cancion'=>$data['cancion'],
			'genero'=>$data['genero'],
			'duracion'=>$data['duracion'],
			'estado'=>$data['estado'],
			'url'=>$data['url']
		);

		$this->db->where('id', $id);
		$query = $this->db->update('mus_canciones',$datos);
	}
}


?>