<?php
class Group_model extends CI_Model {
        private $table= 'groups';
        public function getLangByID($id)
        {
         $row= $this->db->where('id', $id)->get('list')->row();
        if($row)
        {

                return $row;
        }   
        }
        public function getGroupTypeByID($groupID)
        {
         $row= $this->db->where('gtID', $groupID)->get('group_type')->row();
        if($row)
        {

                return $row;
        }   
        }
        public function gen_new($mediaID)
    {
         $row= $this->db->where('mediaID', $mediaID)->get('media')->row();
        if($row && empty($row->resizer_path))
        {
                $content = file_get_contents('https://api.imageresizer.io/v1/images?key=79c401225a58a69ea28d96f5bdd512e98016ccb9&url='.$row->url);
            $ar = json_decode($content, true);
            $thumb =  $url;
            if($ar['success'])
            {
                $resizer = 'https://im.ages.io/'.$ar['response']['id'];
                $rest  = \Cloudinary\Uploader::upload($resizer, array());
                $nrl = $rest['url'];
                $up = array(
                    "public_id"=> $rest['public_id'],
                    "url"=> $rest['url'],
                    "resizer_path"=>$resizer
                    );
                    if($this->db->where('mediaID', $mediaID)->update('media',$up))
                    {
                        return true;
                    }
            }
                
        }
            
    }
        public function getMediaByID($mediaID)
        {
            $this->gen_new($mediaID);
         $row= $this->db->where('mediaID', $mediaID)->get('media')->row();
        if($row)
        {

                return $row;
        }   
        }
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
        public function getList($data = array())
        {
                if(!$data)
                {
                        return $this->db->get('list')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('list')->result_array();
                }
        }
        public function addMedia($ar)
        {
            
            $this->db->insert('media', $ar);
            return $this->db->insert_id();

        }
        public function getGrouptype($data = array())
        {
                if(!$data)
                {
                        return $this->db->get('group_type')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('group_type')->result_array();
                }
        }
        public function update($groupID, $data)
        {
                return $this->db->where('groupID', $groupID)->update($this->table, $data);
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