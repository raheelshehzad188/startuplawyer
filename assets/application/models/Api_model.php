<?php
class Api_model extends CI_Model {

        public function login($uname, $upass)
        {
                $upass = md5($upass);
                $sql = "select * from `users` WHERE (email = '$uname'  OR `uname` = '$uname') AND `upass` = '$upass'";
                
 
                $query = $this->db->query($sql);
                return $query->row();
        }
        public function get($data)
        {
                
                if(!$data)
                {
                        return $this->db->get('users')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('users')->result_array();
                }
        }
        public function create($data)
        {
                $this->db->insert('links', $data);
                return $this->db->insert_id();
        }
        public function updatebyid($linkID, $data)
        {
                return $this->db->where('linkID',$linkID)->update('links', $data);

        }
        public function getgatebyid($roleID)
        {
                $this->db->where('tagID',$roleID);
                $query = $this->db->get('tags')->row();
                return $query;
        }
        public function getbyid($linkID)
        {
                $this->db->where('linkID',$linkID);
                $query = $this->db->get('links')->row();
                return $query;
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }
        public function updatePassword($user_id,$password)
        {
             $password = md5($password);
             return $this->db->where('UserID',$user_id)->update('users',['upass'=>$password,'code'=>'']);
        }
        

}