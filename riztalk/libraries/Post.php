<?php

 class Post{
     private $db;


    public function __construct()
    {
        $this->db= new Database();
    }

     public function getAllPosts(){
      $query ="select posts.*, users.username ,users.avatar, categories.type 
         FROM posts
         INNER JOIN users
         ON posts.user_id = users.id
         INNER JOIN categories
         ON posts.category_id=categories.id
         ORDER BY create_date desc";
        $this->db->query($query);
        $results= $this->db->resultset();
        return $results;

     }

    public function getByCategory($category_id){
      $query ="SELECT posts.*, categories.*, users.username, users.avatar FROM posts
						INNER JOIN categories
						ON posts.category_id = categories.id
						INNER JOIN users
						ON posts.user_id=users.id
						WHERE posts.category_id = :category_id";		
     $this->db->query($query);
     $this->db->bind(':category_id',$category_id);
     $results= $this->db->resultset();
     return $results;

    }
   



    public function getByUser($user_id){
      $query ="SELECT posts.*, categories.*, users.username, users.avatar FROM posts
      INNER JOIN categories
      ON posts.category_id = categories.id
      INNER JOIN users
      ON posts.user_id = users.id
      WHERE posts.user_id = :user_id";	
                  
     $this->db->query($query);
     $this->db->bind(':user_id',$user_id);
     $results= $this->db->resultset();
     return $results;

     
    }


   function getPost($id)
   {
      $this->db->query("SELECT posts.*, users.username, users.avatar from posts
      INNER JOIN users
      on posts.user_id= users.id
      where posts.id = :id");

      $this->db->bind(':id', $id);

      //asing row 
      $row = $this->db->single();
      return $row;
   }



   	/*
	 * Get Category By ID
	*/
	public function getCategory($category_id){
		$this->db->query("SELECT * FROM categories WHERE id = :category_id
		");
		$this->db->bind(':category_id', $category_id);
	
		//Assign Row
		$row = $this->db->single();
	
		return $row;
   }
   
   
     //to get total number of posts on app

     function getTotalNumberPost(){
        $this->db->query("select*from posts");
        $rows=$this->db->resultset();
        return $this->db->rowCount();
     }


     function getTotalNumberCategories(){
        $this->db->query("select*from categories");
        $rows=$this->db->resultset();
        return $this->db->rowCount();
     }



   /*
  * get topic's  replies by topic_id
  */


   public function getReplies($post_id)
   {
      $this->db->query("SELECT replies.*,users.* from replies
             INNER JOIN users
             on replies.user_id= users.id
             where replies.post_id = :post_id
             order by create_date ASC
             ");

      $this->db->bind(':post_id', $post_id);

      //asing row 
      $results = $this->db->resultset();
      return $results;
   }


   /*
	 * Create Topic
	*/
	public function create($data){
		//Insert Query
		$this->db->query("INSERT INTO posts (category_id, user_id, title, body,last_activity)
											VALUES (:category_id, :user_id, :title,:body,:last_activity)");
		//Bind Values
		$this->db->bind(':category_id', $data['category_id']);
		$this->db->bind(':user_id', $data['user_id']);
		$this->db->bind(':title', $data['title']);
		$this->db->bind(':body', $data['body']);
		$this->db->bind(':last_activity', $data['last_activity']);
		//Execute
		if($this->db->execute()){
			return true;
		} else {
			return false;
		}
	}
  


   /*
	 * Add Reply
	 */

    
	public function reply($data){
		//Insert Query
		$this->db->query("INSERT INTO replies (post_id, user_id, body)
											VALUES (:post_id, :user_id, :body)");
		//Bind Values
		$this->db->bind(':post_id', $data['post_id']);
		$this->db->bind(':user_id', $data['user_id']);
		$this->db->bind(':body', $data['body']);
		//Execute
		if($this->db->execute()){
			return true;
		} else {
			return false;
		}
	}




    }