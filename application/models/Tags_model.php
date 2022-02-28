<?php
class Tags_model extends CI_Model {
        private $table= 'tags';

        public function get($data)
        {
                if(!$data)
                {
                        return $this->db->get($this->table)->result_array();
                }
                else
                {
                        return $this->db->where($data)->get($this->table)->result_array();
                }
        }
        public function update($tagID, $data)
        {
                return $this->db->where('tagID', $tagID)->update($this->table, $data);
        }
        public function delete($tagID)
        {
                return $this->db->where('tagID', $tagID)->delete();
        }
        public function add($data)
        {
                $this->db->insert($this->table,$data);
                return $this->db->insert_id();

        }
        public function login($uname, $upass)
        {
                $upass = md5($upass);
                $sql = "select * from `users` WHERE email = '$uname'  OR `uname` = '$uname' AND `upass` = '$upass'";
 
                $query = $this->db->query($sql);
                return $query->row();
        }
        public function updateuserbyid($userID, $data)
        {
                return $this->db->where('UserID',$userID)->updatr('users');

        }
        public function getrolebyid($roleID)
        {
                $this->db->where('roleID',$roleID);
 
                $query = $this->db->get('roles');
                return $query->row();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        

}