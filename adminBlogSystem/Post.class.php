<?php 
    
    //这个类的一个对象实例，表示一条博文记录
    class Post{
    
        private $id;
        private $post_author;
        private $post_date;
        private $post_content;
        private $post_title;
	private $post_type;
        
        public function getId(){
            return $this->id;
        } 
        
        public function getPostAuthor(){
            return $this->post_author;
        }
        
        public function getPostDate(){
            return $this->post_date;
        }
        
        public function getPostContent(){
            return $this->post_content;
        }
        
        public function getPostTitle(){
            return $this->post_title;
        }
        
        public function getPostType(){
            return $this->post_type;
        }

    }

?>
