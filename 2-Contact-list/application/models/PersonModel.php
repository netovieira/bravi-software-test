<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PersonModel extends CI_Model {

    protected $table_name = 'persons';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ContactModel');
    }

    private function getData($query){
        $return = array();
        if ($query->num_rows() > 0) {
            $rows = $query->result_array();
            foreach ($rows as $row){
                $contacts = $this->contacts($row['id']);
                if ( is_null($contacts)) $contacts = array();
                $row['contacts'] = $contacts;
                $return[] = $row;
            }
            return $return;
        } else {
            return null;
        }
    }

    public function get_all(){
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

    public function contacts($id){
        $this->load->model('ContactModel');
        return $this->ContactModel->get_all($id);
    }
}