<?php
class Calculations extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // new calculation save
    public function savecalculation($total)
    {
        $qry = $this->db->insert("calculation", ["calculation_item" => $total]);
        echo $this->db->last_query();

        if ($qry) {
            return true;
        } else {
            return false;
        }
    }

    // get all  calculation
    public function getcalculation()
    {
        $qry = $this->db->order_by("id", "ASC");
        $qry = $this->db->get("calculation");
        // echo $this->db->last_query();
        return $qry->result();
    }

    // delete signle record
    public function delete($id)
    {
        $this->db->where("id", $id);
        $qry = $this->db->delete("calculation");
        // echo $this->db->last_query();
        // die();
    }
}
