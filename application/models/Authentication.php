<?php
class Authentication extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function validate_credential($user_credential){
	 $query=$this->db->get_where('user',$user_credential);
		
		if ($query->num_rows()){
	     return $query->row()->id;
			 // echo $this->db->last_query();
		}else{
			return false;
		}
	}

  // new registration
		public function usersignup($data){	

    	$qry=$this->db->insert('user',$data);
    	//echo $this->db->last_query();
		if ($qry){
	     return true;
		}else{
			return false;
		}

	}

   // add new address
	public function adddata($data){	
    	$qry=$this->db->insert('user_address',$data);
    	//echo $this->db->last_query();
		if ($qry){
	     return true;
		}else{
			return false;
		}

	}
	// get gupnp_control_point_browse_start(cpoint)


	
	
}
