<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent:: __construct();

    if (!$this->session->userdata('user_id'))

        { 

          redirect(base_url('login'));

        }
    
        
       $this->load->library("pagination");
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin/dashboard');
	}

     
    
    public function addmyimage()
	{   
        $config = array(
            'upload_path' => "./assets/img",
            'allowed_types' => "gif|jpg|png|pdf",
            'overwrite' => TRUE,
            'max_size' => "2000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        
             );
             $this->load->library('upload', $config);
        $this->form_validation->set_error_delimiters('<div class="error" style="color:#900e0ecf">','</div>');
        if(
            $this->form_validation->run("addproduct") == true && $this->upload->do_upload('productimage') ==true &&  $this->input->server("REQUEST_METHOD") == "POST"){
            
              $data = array(
                'p_name' => $this->input->post('p_name'),
                 'productimage'=>$this->upload->data('file_name')

            );print_r($data);

            $productadd=$this->Productdata->addproduct($data);
            if($productadd){
                $this->session->set_flashdata("success", "Added a new product");
                redirect(base_url("imageupload/list"));
            }else{
            $this->session->set_flashdata("error", "something wen worng");
            redirect(base_url("imageupload"));
            }
          
        }else {
            $this->session->set_flashdata(array('error'=> $this->upload->display_errors()));
            redirect(base_url("imageupload"));
        }
	}


    public function list3()

	{
    // $this->load->library("pagination");
       $config = array();
       $config["base_url"] = base_url('/imageupload/list') . '';
       $config["total_rows"] = $this->Productdata->record_count();
       $config["per_page"] = 4;
       $config["uri_segment"] = 3;
       $this->pagination->initialize($config);
       // $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
     $data['product']=$this->Productdata->getproductdetails($config["per_page"], $this->uri->segment(3));
      $this->load->view('list', $data);
		
	}

public function graph()
  {
    $this->load->view('graph.php');
  }



}
