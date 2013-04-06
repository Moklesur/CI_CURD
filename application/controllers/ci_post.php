<?php

    class Ci_post extends CI_Controller{
        
        function __construct() {
            parent::__construct();
            $this->load->model('mpost');
        }
        
        function index(){
            $data['post'] = $this->mpost->get_posts();
            $this->load->view('post_index',$data);
        }
        
        function single_page($postID){
            $data['single'] = $this->mpost->get_post($postID);
            $this->load->view('single_pages',$data);
        }
        
        function insert(){
            if($_POST){
                $data = array(
                    'title'=> $_POST['title'],
                    'post'=> $_POST['post'],
                    'active'=>1
                );
                 $this->mpost->insert_post($data);
                 redirect(base_url().'ci_post');
            }  else {
                $this->load->view('insert');
            }
        }
        
        function editpost($postID){
            $data['success']=0;
            if($_POST){
            $data1 = array(
                    'title'=> $_POST['title'],
                    'post'=> $_POST['post'],
                    'active'=>1
                );
                 $this->mpost->edit_post($postID,$data1);
                 $data['success']=1;
                redirect(base_url().'ci_post');
            }
            $data['post'] = $this->mpost->get_post($postID);
            $this->load->view('editpost',$data);
        }
        
        function delete($postID){
            $this->mpost->post_delete($postID);
            redirect(base_url().'ci_post');
        }
        
        function login(){
            $data['error']=0;
            
            if($_POST){
                
            
            
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $pass_the_input_value = $this->mpost->login($username,$password);
            
            if(!$pass_the_input_value){
                $data['error']=1;
                
                
            }else{
                
               $this->session->set_userdata('userID', $pass_the_input_value['userID']);
               $this->session->set_userdata('username',$pass_the_input_value['username']);
               $this->session->set_userdata('name', $pass_the_input_value['name']);
              
               redirect(base_url().'ci_post');
               //$this->session->set_userdata(); 
                }
            }
            
            $this->load->view('login',$data);
            
        }
        
        function logout(){
            $this->session->sess_destroy();
            redirect(base_url().'ci_post');
        }
        
       
    }
?>
