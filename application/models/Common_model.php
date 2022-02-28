<?php
class Common_model extends CI_Model {
        public $table= 'genres';
        public $key= 'id';

        public function get($data)
        {
            $this->db->order_by($this->key, "desc");
                if(!$data)
                {
                        return $this->db->get($this->table)->result_array();
                }
                else
                {
                        return $this->db->where($data)->get($this->table)->result_array();
                }
        }
        public function get_sort($data = array(),$key, $type)
        {
            $this->db->order_by($key, $type);
                if(!$data)
                {
                        return $this->db->get($this->table)->result_array();
                }
                else
                {
                        return $this->db->where($data)->get($this->table)->result_array();
                }
        }
        public function getMediaByID($mediaID)
        {

             $row= $this->db->where('mediaID', $mediaID)->get('media')->row();
            if($row)
            {

                    return $row;
            }   
        }
        public function update($genreID, $data)
        {
                return $this->db->where($this->key, $genreID)->update($this->table, $data);
        }
        public function delete($tagID)
        {
                return $this->db->where($this->key, $tagID)->delete();
        }
        public function add($data)
        {
                $this->db->insert($this->table,$data);
                return $this->db->insert_id();

        }
        public function addMedia($ar)
        {
            
            $this->db->insert('media', $ar);
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
                return $this->db->where('UserID',$userID)->update('users');

        }
        public function getbyid($userID)
        {
                return $this->db->where($this->key,$userID)->get($this->table)->row();

        }
        public function getrolebyid($roleID)
        {
                
 
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


         public function get_tag($data)
        {
                if(!$data)
                {
                        return $this->db->get('tags')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('tags')->result_array();
                }
        }

        

}