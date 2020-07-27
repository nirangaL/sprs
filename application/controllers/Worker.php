<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(-1);
//ini_set('display_errors', 1);
class Worker extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Worker_model');
    }

    public function index(){
        $data['title'] = 'Worker';
        $data['tblData'] = $this->Worker_model->getTblData();
        // print_r($data);exit();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('Worker/Worker_list_view');
        $this->load->view('template/footer');
    }

    public function add(){
        $data['title'] = 'New Worker';
        $data['jobTitle'] = $this->Worker_model->getJobTitle();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('Worker/Worker_add_view');
        $this->load->view('template/footer');
    }

    public function store(){
        if($this->formValidation()){
            $result = $this->Worker_model->store();
            if($result){
              $this->session->set_flashdata('item', array('msg-title'=>'Worker Saved!','msg' => '','class' => 'alert-success'));
                redirect(base_url('Worker'),'refresh');
            }else{
              $this->session->set_flashdata('item', array('msg-title'=>'Worker Not Saved!','msg' => 'Try Again','class' => 'alert-danger'));
              $this->add();
            }
          }else{
              $this->add();
          }
    }


    public function view($id){
        $data['title'] = 'Edit Job';
        $data['data'] = $this->Worker_model->getJob($id);
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('Worker/Worker_edit_view');
        $this->load->view('template/footer');
    }

    public function delete($id){
        $result = $this->Worker_model->delete($id);
        if($result){
            $this->session->set_flashdata('item', array('msg-title'=>'Worker Successfully Deleted !','msg' => '','class' => 'alert-success'));
            redirect(base_url('Worker'),'refresh');  
        }else{
            $this->session->set_flashdata('item', array('msg-title'=>'Worker Not Delete!','msg' => 'Try Again','class' => 'alert-danger'));
            $this-> view($id);
        }
    }

    public function edit($id){
        if($this->formValidation($id)){
            $storeData = $this->Worker_model->update($id);
            if($storeData){
             $this->session->set_flashdata('item', array('msg-title'=>'Worker Successfully Update !','msg' => '','class' => 'alert-success'));
               redirect(base_url('Worker'),'refresh');
           }else{
             $this->session->set_flashdata('item', array('msg-title'=>'Worker Not Update!','msg' => 'Try Again','class' => 'alert-danger'));
             $this-> view($id);
           }
        }else{
         $this-> view($id);
        }
    }



    public function formValidation($updateId=''){


        if($updateId ==''){
            $this->form_validation->set_rules('worker_name', 'Worker Name', 'trim|required');
            $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
            // $this->form_validation->set_rules('startDate', 'Start Date', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('amount', 'Day Charge', 'trim|required');
        }else if(($updateId !='')){

            $getIdData = $this->Worker_model->getJob($updateId);
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
