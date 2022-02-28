<?php
class Auth_model extends CI_Model {

        public function login($uname, $upass)
        {
                $upass = md5($upass);
                $sql = "select * from `wp_users` WHERE (email = '$uname'  OR `uname` = '$uname') AND `upass` = '$upass'";
                
 
                $query = $this->db->query($sql);
                return $query->row();
        }
        public function get($data)
        {
                
                if(!$data)
                {
                        return $this->db->get('wp_users')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('wp_users')->result_array();
                }
        }
        public function create($data)
        {
                $this->db->insert('wp_users', $data);
                return $this->db->insert_id();
        }
        public function updateuserbyid($userID, $data)
        {
                return $this->db->where('UserID',$userID)->update('wp_users', $data);

        }
        public function getrolebyid($roleID)
        {
                $this->db->where('roleID',$roleID);
                $query = $this->db->get('roles')->row();
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
             return $this->db->where('UserID',$user_id)->update('wp_users',['upass'=>$password,'code'=>'']);
        }
        

}