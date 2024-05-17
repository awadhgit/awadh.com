<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
    public function __construct() {
        parent:: __construct();

    if (!$this->session->userdata('user_id'))

        { 

          redirect(base_url('login'));

        }
    
        $this->load->model('Authentication');
        $this->load->model('site', 'location');
       $this->load->library("pagination");
    }


// get details of pages 

  

    // get state names
    public function index() {
        $data['page'] = 'country-list';
        $data['title'] = 'country List | TechArise';
        $data['geCountries'] = $this->location->getAllCountries();   
        $this->load->view('admin/addaddress', $data);
    }

    // get state names
    public function getstates() {
        $json = array();
        $this->location->setCountryID($this->input->post('countryID'));
        $json = $this->location->getStates();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    // get city names
    function getcities() {
        $json = array();
        $this->location->setStateID($this->input->post('stateID'));
        $json = $this->location->getCities();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

// add new address

     public function add_address(){

        $config = array(
            'upload_path' => "./assets/img",
            'allowed_types' => "gif|jpg|png|pdf",
            'overwrite' => TRUE,
            'max_size' => "2000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        
             );
        $this->load->library('upload', $config);
        // $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error" style="color:#900e0ecf">','</div>');

        if ($this->form_validation->run('addnewaddress')==  TRUE && $this->upload->do_upload('image')== TRUE && $this->input->server('REQUEST_METHOD') == 'POST'){
             
               $data =array(
               'p_address'=>$this->input->post('p_address'),
               's_address'=>$this->input->post('s_address'),
               'regcountry'=>$this->input->post('regcountry'),
                'state_name'=>$this->input->post('state_name'),
                'city_name'=>$this->input->post('city_name'),
                'zipcode'=>$this->input->post('zipcode'),
               'image'=>$this->upload->data('file_name')

           
            );
              
            // print_r($data);

            // die("dssdfdsf");

             $this->load->model('Authentication');
             $signup=$this->Authentication->adddata($data);
             if ($signup){
                  $this->session->set_flashdata('success','Congratulation you have sucessfully added a new address');
                  redirect(base_url('location'));
                }else{
                    $this->session->set_flashdata('error','Please enter valid credentials');
                    // after storing i redirect it to the controller
                    redirect(base_url('location'));
                
                }
                    
        }else{
       $this->session->set_flashdata('error','Please fill all the required field ');
        redirect(base_url('location'));
        }
    }

// address list 

    public function list()

  {
    // $this->load->library("pagination");
       $config = array();
       $config["base_url"] = base_url('/location/list') . '';
       $config["total_rows"] = $this->location->record_count();
       $config["per_page"] = 3;
       $config["uri_segment"] = 3;
       $this->pagination->initialize($config);
       // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
     $data['useraddress']=$this->location->getuserdetails($config["per_page"], $this->uri->segment(3));
      $this->load->view('admin/add_list', $data);
    
  }





}
