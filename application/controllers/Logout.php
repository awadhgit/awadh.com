<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    public function __construct() {
        parent:: __construct();
     if (!$this->session->userdata('user_id'))
        { 
           redirect(base_url('login'));
        }
    }

    public function accesslogout(){
    $this->session->userdata('user_id');
      $this->session->sess_destroy($user_id);
       redirect(base_url('login'));
}

}
