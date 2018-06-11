<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->library('migration');

        if ($this->migration->current()) {
            echo "Successful migration!";
        }
        else {
            echo $this->migration->error_string();
        }
    }
}