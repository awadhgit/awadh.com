<?php
class Site extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // new calculation save

    private $_countryID;
    private $_stateID;

    // set country id
    public function setCountryID($countryID) {
        return $this->_countryID = $countryID;
    }
    // set state id
    public function setStateID($stateID) {
        return $this->_stateID = $stateID;
    }

    public function getAllCountries() {
        $this->db->select(array('c.id as country_id', 'c.sortname', 'c.name as country_name'));
        $this->db->from('countries as c');
        $query = $this->db->get();
        return $query->result_array();
    }

    // get state method
    public function getStates() {
        $this->db->select(array('s.id as state_id', 's.country_id', 's.statename as state_name'));
        $this->db->from('states as s');
        $this->db->where('s.country_id', $this->_countryID);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get city method
    public function getCities() {
        $this->db->select(array('i.id as city_id', 'i.cityName as city_name', 'i.state_id'));
        $this->db->from('cities as i');
        $this->db->where('i.state_id', $this->_stateID);
        $query = $this->db->get();
        return $query->result_array();
    }


      // get all  calculation
    public function getuserdetails($limit, $start)
    {
       $qry = $this->db->select(array('u.p_address','s_address','zipcode','image','date','c.name as countryname','s.statename as statename','ct.cityName as cityname'));
       $qry = $this->db->from('user_address as u');
       $qry = $this->db->join('countries as c','c.id=u.regcountry' );
       $qry = $this->db->join('states as s','s.id=u.state_name' );
       $qry = $this->db->join('cities as ct','ct.id=u.city_name' );$qry = $this->db->order_by("u.id", "desc");
        $qry= $this->db->limit($limit, $start);
        $qry = $this->db->get();
        
     // echo $this->db->last_query();

    
        return $qry->result();
    }

    public function record_count() {
       return $this->db->count_all("user_address");
   }







    
}
