<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('login');
	}
    public function validate_login()
    {
     $this->form_validation->set_error_delimiters('<div class="error" style="color:#900e0ecf">','</div>');
     if($this->form_validation->run('userauth')== TRUE && $this->input->server('REQUEST_METHOD')== 'POST'){
      if (empty($this->input->post('g-recaptcha-response'))) {

              $this->session->set_flashdata('error','Please validate Captcha');
                   
                    redirect(base_url('index.php/login'));
                        }
     
      $user_credential=array(
         'email'=>$this->input->post('email'),
         'password'=>md5($this->input->post('password'))
     	);
          $this->load->model('Authentication');
          $login_id=$this->Authentication->validate_credential($user_credential);
          print_r($login_id);
     	if ($login_id){
     	   $this->session->set_userdata('user_id',$login_id);
     	    redirect(base_url('dashboard'));
            
     	   
     	 }else{
     	 	$this->session->set_flashdata('error','Please enter valid credentials');
             redirect(base_url('index.php/login'));
     	 }
     }else{
     	  $this->session->set_flashdata('error','Please check validation');
             redirect(base_url('index.php/login'));
     }
     
    }

 public function userregistration(){
    $this->load->view("user_registration");

 }

     public function registration(){
        $config = array(
            'upload_path' => "./assets/img",
            'allowed_types' => "gif|jpg|png|pdf",
            'overwrite' => TRUE,
            'max_size' => "2000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        
             );
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error" style="color:#900e0ecf">','</div>');
        if ($this->form_validation->run('newuser_auth')==  TRUE && $this->upload->do_upload('file_name')== TRUE && $this->input->server('REQUEST_METHOD') == 'POST'){
          
               $data =array(
               'name'=>$this->input->post('username'),
               'email'=>$this->input->post('email'),
               'mobile'=>$this->input->post('phone'),
               'password'=>md5($this->input->post('password')),
               'image_name'=>$this->upload->data('file_name')

           
            );
              
            // print_r($data);

             $this->load->model('Authentication');
             $signup=$this->Authentication->usersignup($data);
             if ($signup){
                  $this->session->set_flashdata('success','Congratulation your credential is valid ');
                  $this->load->view('user_registration');
                }else{
                    $this->session->set_flashdata('error','Please enter valid credentials');
                    // after storing i redirect it to the controller
                    redirect(base_url('user_registration'));
                
                }
                    
        }else{
       $this->session->set_flashdata('error','somthing went credentials');
       $this->load->view('user_registration');
        }
    }
    
}
