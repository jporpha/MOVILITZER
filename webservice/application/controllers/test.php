
<?php
require(APPPATH.'libraries/REST_Controller.php');

class Test extends REST_Controller {

    function books_get() {
        $this->load->database();
        $sql = 'SELECT * FROM modules;';
        $query = $this->db->query($sql);
        $data = $query->result();
        
        $this->response($data, 200);
    }
    
    function book_get($module) {
        $this->load->database();
        $sql = 'SELECT * FROM modules WHERE code = "'.$module.'";';
        $query = $this->db->query($sql);
        $data = $query->row();
        
        $this->response($data, 200);
    }
    
    function addbook_post() {
        $this->load->database();
        $title = $_POST['title'];
        $author = $_POST['author'];
        $info = array('id'=>null, 'title'=>$title, 'author'=>$author);
        $this->db->insert('books', $info);
        $data->id = $this->db->insert_id();
        $data->title = $title;
        $data->author = $author;
        $this->response($data, 200);
    }
    
  /* function deletebook_id_delete($id) {
        $this->load->database();
        $sql = 'SELECT * FROM modules WHERE id = "'.$id.'";';
        $query = $this->db->query($sql);
        $data->record = $query->row();
        $criteria = array('id'=>$id);
        $this->db->delete('modules', $criteria);
        $data->rows = $this->db->affected_rows();
        $this->response($data, 200);
    }
    */
    
    function updatebook_id_post($id) {
        $this->load->database();
        $data->id = $id;
        $sql = 'SELECT * FROM books WHERE id = "'.$id.'";';
        $query = $this->db->query($sql);
        $data->old = $query->row();
        $data->changes = $_POST;
        $this->db->where('id', $id);
        $this->db->update('books', $_POST);
        $data->rows = $this->db->affected_rows();
        $query = $this->db->query($sql);
        $data->new = $query->row();
        $this->response($data, 200);
    }
}


