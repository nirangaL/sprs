<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Job extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Job_model');
    }

    public function index(){
        $data['title'] = 'Jobs';
        $data['tblData'] = $this->Job_model->getTblData();
        // print_r($data);exit();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('job/jobs_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'New Job';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('job/job_add_view');
        $this->load->view('template/footer');
    }

    public function store(){
        if($this->formValidation()){
            $result = $this->Job_model->store();
            if($result){
              $this->session->set_flashdata('item', array('msg-title'=>'Saved!','msg' => '','class' => 'alert-success'));
                redirect(base_url('job'),'refresh');
            }else{
              $this->session->set_flashdata('item', array('msg-title'=>'Not Saved!','msg' => 'Try Again','class' => 'alert-danger'));
              $this->add();
            }
          }else{
              $this->add();
          }
    }


    public function view($id){
        $data['title'] = 'Edit Job';
        $data['data'] = $this->Job_model->getJob($id);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('job/job_edit_view');
        $this->load->view('template/footer');
    }

    public function delete($id){
        $result = $this->Job_model->delete($id);
        if($result){
            $this->session->set_flashdata('item', array('msg-title'=>'Job Successfully Deleted !','msg' => '','class' => 'alert-success'));
            redirect(base_url('job'),'refresh');  
        }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Job Not Delete!','msg' => 'Try Again','class' => 'alert-danger'));
            $this-> view($id);
        }
    }

    public function edit($id){
        if($this->formValidation($id)){
            $storeData = $this->Job_model->update($id);
            if($storeData){
             $this->session->set_flashdata('item', array('msg-title'=>'Job Successfully Update !','msg' => '','class' => 'alert-success'));
               redirect(base_url('job'),'refresh');
           }else{
             $this->session->set_flashdata('item', array('msg-title'=>'Job Not Update!','msg' => 'Try Again','class' => 'alert-danger'));
             $this-> view($id);
           }
        }else{
         $this-> view($id);
        }
    }



    public function formValidation($updateId=''){


        if($updateId ==''){
            $this->form_validation->set_rules('job_name', 'Job Name', 'trim|required');
            $this->form_validation->set_rules('job_location', 'Job Location', 'trim|required');
            $this->form_validation->set_rules('startDate', 'Start Date', 'trim|required');
        }else if(($updateId !='')){

            $getIdData = $this->Job_model->getJob($updateId);
            $savedJob_name= $getIdData[0]->job_name;
          
            $newJob_name = $this->input->post('job_name');
            if($savedJob_name != $newJob_name){
                $this->form_validation->set_rules('job_name', 'Job Name', 'trim|required|is_unique[jobs.job_name]');
            }

            $this->form_validation->set_rules('job_location', 'Job Location', 'trim|required');
            $this->form_validation->set_rules('startDate', 'Start Date', 'trim|required');
           

        }
       
        return $this->form_validation->run();
    }


}
