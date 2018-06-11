<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContactModel extends CI_Model {

    protected $table_name = 'contacts';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function getData($query){
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function get_all($person_id){
        $this->db->where('person_id', $person_id);
        $query = $this->db->get($this->table_name);
        return $this->getData($query);
    }

    public function get($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);
        return $this->getData($query);
    }

    public function insert($data) {
        if(!isset($data))
            return false;

        $this->db->insert($this->table_name, $data);
        return $this->get($this->db->insert_id());
    }

    public function update($id, $data) {
        if(is_null($id) || !isset($data))
            return false;

        $this->db->where('id', $id);
        return $this->db->update($this->table_name, $data);
    }

    public function delete($id) {
        if(is_null($id))
            return false;
        $this->db->where('id', $id);
        return $this->db->delete($this->table_name);
    }
}