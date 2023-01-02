<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Calculator extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *    http://example.com/index.php/welcome
     *  - or -
     *    http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        $this->load->view("cal");
    }

    public function calulate()
    {
        // $this->form_validation->set_error_delimiters('<div class="error" style="color:#900e0ecf">','</div>');
        // if ($this->form_validation->run('calculate_me')==TRUE  && $this->input->server('REQUEST_METHOD')=='POST')){
        //    echo $total=$this->input->post('output');
        $this->form_validation->set_error_delimiters(
            '<div class="error" style="color:#900e0ecf">',
            "</div>"
        );
        if (
            $this->form_validation->run("calculate_me") == true &&
            $this->input->server("REQUEST_METHOD") == "POST"
        ) {
            $total = $this->input->post("output");
            $this->load->model("calculations");
            $getcalculation = $this->calculations->savecalculation($total);
            if ($getcalculation != "") {
                $this->session->set_flashdata("success", "successfuly save !!");
                redirect(base_url("calculator/index"));
            } else {
                $this->session->set_flashdata("success", "getting some error");
                redirect(base_url("calculator/index"));
            }
        } else {
            $this->session->set_flashdata(
                "success",
                "Plase Calculate the value !!!"
            );
            redirect(base_url("calculator/index"));
        }
    }

    public function calculation_list()
    {
        $data["totalcalculation"] = $this->calculations->getcalculation();
        $this->load->view("calculationlist", $data);
    }

    // public function calculateme(){
    //  $this->load->view('cal');

    // }

    public function deleterecord($id)
    {
        $listype = $this->calculations->delete($id);
        $this->session->set_flashdata(
            "success",
            "Successfully Deleted your record!!"
        );
        redirect(base_url("calculator/calculation_list"));
    }
}

?>
