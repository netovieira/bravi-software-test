<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PersonModel');
        $this->model = $this->PersonModel;
    }

    public function index()
    {
        $return = $this->model->get_all();
        $status = is_null($return) ? 204 : 200;
        $this->response($return, $status);
    }

    public function index_get($id){
        $return = $this->model->get($id);
        $status = is_null($return) ? 204 : 200;
        $this->response($return, $status);
    }

    public function index_put() {
        $return = $this->model->insert($this->input->input_stream(null));
        $status = is_null($return) ? 204 : 200;
        $this->response($return, $status);
    }

    public function index_post() {
        $return = $this->model->insert($this->input->get('id'), $this->input->post(null));
        $status = is_null($return) ? 204 : 200;
        $this->response($return, $status);
    }

    public function index_delete($id) {
        return $id;
    }


    public function contacts($id) {
        $return = $this->model->contacts($id);
        $status = is_null($return) ? 204 : 200;
        $this->response($return, $status);
    }

    private function response($data, $status = 200){
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }
}
