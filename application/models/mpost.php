<?php

    class Mpost extends CI_Model{
        
        function get_posts($num=20,$start=0){
            $this->db->select()->from('posts')->where('active',1)->limit($num,$start);
            $query = $this->db->get();
            return $query->result_array();
        }      
        function get_post($postID){
            $this->db->select()->from('posts')->where(array('active'=>1,'postID'=>$postID));
            $query = $this->db->get();
            return $query->first_row('array');
        }
        function insert_post($data){
            $this->db->insert('testform',$data);
            return $this->db->insert_id();
            
        } 
        function edit_post($postID,$data){
          $this->db->where('postID', $postID);
          $this->db->update('posts', $data);   
        }
        function post_delete($postID){
          $this->db->where('postID', $postID);
          $this->db->delete('posts');     
        }
        
        function login($username,$password){
            $where = array(
                'username'=>$username,
                'password'=>sha1($password)
            );
            $this->db->select()->from('users')->where($where);
            $query = $this->db->get();
            return $query->first_row('array');
        }
        
       
     }
    ?>