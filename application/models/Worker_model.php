<?php

class Worker_model extends CI_model{

    public function getJobTitle(){
        $result = $this->db->get('job_title')->result();
        return $result;
    }
   
    public function getTblData(){
        $this->db->where('delete',0);;
        $result = $this->db->get('jobs')->result();
        return $result;
    }

    public function store(){
        $job_name = $this->input->post('job_name');
        $job_location = $this->input->post('job_location');
        $job_desc = $this->input->post('job_desc');
        $startDate = $this->input->post('startDate');
   
        // if($active ==''){
        //    $active = 0;
        // }

        $data = array(
            'job_name'=>$job_name,
            'location'=>$job_location,
            'job_des'=>$job_desc,
            'start_date'=>$startDate,
        );
   
       return $this->db->insert('jobs',$data);
       }

       public function getJob($id){
        $this->db->where('id',$id);
        $result = $this->db->get('jobs')->result();
        return $result;
    }

    public function delete($id){
        $this->db->set('delete',1);
        $this->db->where('id',$id);
       return $this->db->update('jobs');
    }

    public function update($id){
            $job_name = $this->input->post('job_name');
            $job_location = $this->input->post('job_location');
            $job_desc = $this->input->post('job_desc');
            $startDate = $this->input->post('startDate');
    
            $data = array(
                'job_name'=>$job_name,
                'location'=>$job_location,
                'job_des'=>$job_desc,
                'start_date'=>$startDate,
            );
       
            // print_r($data);exit();

        $this->db->set($data);
        $this->db->where('id',$id);
       return $this->db->update('jobs');
    }


}