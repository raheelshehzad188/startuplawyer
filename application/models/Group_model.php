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
        public function getGroupByID($groupID)
        {
         $row= $this->db->where('groupID', $groupID)->get($this->table)->row();
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
        public function getMediaByID($mediaID)
        {
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
                return $this->db->where('UserID',$userID)->update('users',$data);

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
        public function get_user_group($userId)
        {

            $groups= array();
            $this->db->where('userID',$userId);
            $this->db->where('group_members.status',0);
            $this->db->from('group_members');
            $shairgroup=$this->db->get()->result_array();
            if(!empty($shairgroup))
            {
                foreach ($shairgroup as $key => $value) {
                    $groups[]=$value['groupID'];
                }
            } 
            $this->db->select($this->table.'.*' );
            $this->db->from($this->table);
            $this->db->where($this->table.'.status',1);
            $this->db->where($this->table.'.userID',$userId);
            if(count($groups)>0)
            $this->db->where_in($this->table.'.groupID', $groups);
            return $ret = $this->db->get()->result_array();

            
        }
       
        public function groupleave($groupId,$userid,$data)
        {
            return $this->db->where('groupID',$groupId)->where('userID',$userid)->update('group_members',$data);    
        }
        public function saveMember($data)
        {
            $this->db->insert('group_members',$data);   
            return $this->db->insert_id(); 
        }
        public function getMember($Id)
        {  
            return $this->db->where('id',$Id)->get('group_members')->row();
        }
        public function getMemberToken($data)
        {  
            return $this->db->where($data)->get('group_members')->row();
        }
        public function usersbymail($mail)
        {
           return $this->db->where('email',$mail)->get('users')->row();
        }
        public function countNotiForMembers($mail,$userid)
        {


            return count($this->db->or_where('reciver_id',$userid)->where('mail',$mail)->where('status','onrequest')->get('notifcation')->result_array());
        }
        public function addNotification($data)
        {
            $this->db->insert('notifcation',$data);
            return $this->db->insert_id();
        }
        public function getGroupNotification($mail,$userid)
        {
            $this->db->where('email',$mail)->where('status',2)->update('group_members',['status'=>3]);
            $this->db->or_where('reciver_id',$userid)->where('mail',$mail)->where('status','onrequest')->update('notifcation',['status'=>"seen"]);
            $this->db->select('
                notifcation.id AS notifi_id,
                notifcation.type AS type,
                group_members.*,
                member.first_name AS first_name,
                member.last_name AS last_name,
                groups.name AS groups_name,
                book_barrow.*,
                barrowU.UserID AS barrow_Uid,
                barrowU.first_name AS barrow_first_name,
                barrowU.last_name AS barrow_last_name,
                barrowU.email AS barrow_email,
                books.*,');
            $this->db->where('notifcation.reciver_id',$userid)->where('notifcation.mail',$mail)->where('notifcation.status',"seen");
            $this->db->from('notifcation');
            $this->db->join('group_members','group_members.id=notifcation.message_id' ,'left');
            $this->db->join('users AS member','member.UserID=group_members.addBY' ,'left');
            $this->db->join('groups','groups.groupID=group_members.groupID' ,'left');
            $this->db->join('book_barrow','book_barrow.barrowID=notifcation.message_id','left');
            $this->db->join('users AS barrowU','barrowU.UserID=book_barrow.to','left');
            $this->db->join('books','books.bookID=book_barrow.bookID','left');
            return $this->db->get()->result_array();
        }
       
        public function groupMemberStatus($id,$data)
        {
            return $this->db->where('id',$id)->update('group_members',$data);
        }
        public function groupNotificationStatus($id,$data)
        {
            return $this->db->where('id',$id)->update('notifcation',$data);
        }
        public function getNotificationInfo($id)
        {
            return $this->db->where('id',$id)->get('notifcation')->row();
        }

}