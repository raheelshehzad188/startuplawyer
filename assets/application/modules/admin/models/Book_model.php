<?php
class Book_model extends CI_Model {
        private $table= 'links';

        public function searchAuthor($txt)
        {
                $this->db->like('name', $txt);
                $this->db->where('status', 0);
                //
                return $this->db->get('author')->result_array();


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
        public function getAuthorByID($authorID)
        {
         $row= $this->db->where('authorID', $authorID)->get('author')->row();
        if($row)
        {

                return $row;
        }
        }   
        public function getGenreByBookID($bookID)
        {
         $row= $this->db->select('book_to_genre.genre_id,genres.name')->where('book_id', $bookID)->join('genres','genres.genreID=book_to_genre.genre_id ')->get('book_to_genre')->result_array();
        if($row)
        {

                return $row;
        }   
        }
        public function delGenreByBookID($bookID)
        {
            return $this->db->where('book_id',$bookID)->delete('book_to_genre');
        }
        public function delLangByBookID($bookID)
        {
            return $this->db->where('book_id',$bookID)->delete('book_to_lang');
        }
        public function delTagByBookID($bookID)
        {
            return $this->db->where('book_id',$bookID)->delete('book_to_tag');
        }
        public function getTagsByBookID($bookID)
        {
         $row= $this->db->where('book_id', $bookID)->get('book_to_tag')->result_array();
        if($row)
        {

                return $row;
        }   
        }   
        public function getLangByBookID($bookID)
        {
         $row= $this->db->select('list.id,list.value as name')->where('book_id', $bookID)->join('list','book_to_lang.list_id = list.id')->get('book_to_lang')->result_array();
        if($row)
        {

                return $row;
        }   
        }
        public function getAuthorID($data)
        {
                $row= $this->db->where('name', $data['name'])->get('author')->row();
                if($row)
                {

                        return $row->authorID;
                }
                else
                {

                        if($this->db->insert('author', $data))
                        {
                                // die("add".$this->db->insert_id());
                         return $this->db->insert_id();       
                        }
                        else
                        {
                                return 0;
                        }
                        
                }
        }
        public function getTagID($data)
        {
                $row= $this->db->where('name', $data['name'])->get('tags')->row();
                if($row)
                {

                        return $row->authorID;
                }
                else
                {

                        if($this->db->insert('tags', $data))
                        {
                                // die("add".$this->db->insert_id());
                         return $this->db->insert_id();       
                        }
                        else
                        {
                                $error = $this->db->last_query();
                                print_r($error);
                                die();
                        }
                        
                }
        }
        public function get($data)
        {
            $this->db->order_by("linkID", "desc");

                if(!$data)
                {
                        return $this->db->get($this->table)->result_array();
                }
                else
                {
                        return $this->db->where($data)->get($this->table)->result_array();
                }
        }
        public function getGenere($data = array())
        {
                if(!$data)
                {
                        return $this->db->get('genres')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('genres')->result_array();
                }
        }
        public function addMedia($ar)
        {
            
            $this->db->insert('media', $ar);
            return $this->db->insert_id();

        }
        public function addBookGenre($book_id, $genre_id)
        {
            $ar = array(
                "id"=> '',
                "book_id"=> $book_id,
                "genre_id"=> $genre_id
            );
            $this->db->insert('book_to_genre', $ar);

            return $this->db->insert_id();

        }
        public function addBookLang($book_id, $list_id)
        {
            $ar = array(
                "id"=> '',
                "book_id"=> $book_id,
                "list_id"=> $list_id
            );
            $this->db->insert('book_to_lang', $ar);
            return $this->db->insert_id();

        }
        public function addBookTag($book_id, $tag_id)
        {
            $ar = array(
                "id"=> '',
                "book_id"=> $book_id,
                "tag_id"=> $tag_id
            );
            $this->db->insert('book_to_tag', $ar);
            return $this->db->insert_id();

        }
        public function getTag($data = array())
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
        public function update($bookID, $data)
        {
                return $this->db->where('linkID', $bookID)->update($this->table, $data);
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
        public function getuserbyid($userID)
        {
                return $this->db->where('UserID',$userID)->get('users')->row();

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