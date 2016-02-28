<?php 
    
    //这个类的一个对象实例，表示一条评论记录
    class Post{
    
        private $id;
        private $comment_author;
        private $comment_date;
        private $comment_post_id;
        private $comment_type;
        private $comment_content;

        
        public function getId(){
            return $this->id;
        } 
        
        public function getCommentAuthor(){
            return $this->comment_author;
        }
        
        public function getCommentDate(){
            return $this->comment_date;
        }
        
        public function getCommentPostId(){
            return $this->comment_post_id;
        }
        
        public function comment_type(){
            return $this->comment_type;
        }
        
        public function comment_content(){
            return $this->comment_content;
        }
        

    }

?>
