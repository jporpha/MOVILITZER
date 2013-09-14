<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orpha_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function crearCurso($data){
		$this->db->insert('mus_canciones', array(
													'artista'=>$data['artista'],
													'cancion'=>$data['cancion'],
													'genero'=>$data['genero'],
													'duracion'=>$data['duracion'],
													'estado'=>$data['estado'],
													'url'=>$data['url']
												)
						);
	}
	function obtenerCanciones(){
		$query = $this->db->get('mus_canciones');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function obtenerCancion($id){
		$this->db->where('id', $id);
		$query = $this->db->get('mus_canciones');
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function eliminarCancion($id){
		$this->db->delete('mus_canciones', array('id'=>$id));
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