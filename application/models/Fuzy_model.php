<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuzy_model extends CI_Model{

    public $table = 'fuzy';
    public $id = 'id';
    public $order = 'DESC';

    function read(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function count(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->count_all_results($this->table);
    }

    function readPanitia(){
        $this->db->like('jabatan_panitia', 'pendamping');
        return $this->db->get($this->table)->result();
    }

    function insert($data){
        $this->db->insert($this->table,$data);
    }

    function update($data,$id){
        $this->db->where('id_panitia', $id);
        $this->db->update($this->table,$data);
    }
    
    function searchById($data){
        $this->db->where('id_panitia',$data);
        return $this->db->get($this->table)->row();
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}

?>