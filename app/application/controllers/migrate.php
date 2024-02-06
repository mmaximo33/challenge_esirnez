<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function index() {
        echo "Feature disabled until problem is detected.";
        exit;
//        $this->input->is_cli_request()
//        or exit("Run via CLI: php migrate");

        var_dump("load");
        $this->load->library('migration');
        var_dump("dont load, no errors");
        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo 'Success migration';
        }
    }

}