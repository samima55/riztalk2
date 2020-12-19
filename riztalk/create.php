<?php require('core/init.php'); ?>
<?php 


$post= new Post;
$user= new User;

if(isset($__post['do_create'])){
   $validate= new Validator;
     $data= array();
     $data['title']=$__post['title'];
     $data['category_id']=$__post['category'];
     $data['body']=$__post['body'];
     $data['user_id'] = getUser()['user_id'];
      $data['last_activity'] = date("Y-m-d H:i:s");
    
    //required fieds for creating the topic
     $field_array = array('title', 'body', 'category');
    
    
    if($validate->isRequired($field_array)){
		//Register User
		if($post->create($data)){
			redirect('index.php', 'Your topic has been posted', 'success');
		} else {
			redirect('topic.php?id='.$post_id, 'Something went wrong with your post', 'error');
		}
	} else {
		redirect('create.php', 'Please fill in all required fields', 'error');
	}
}


//get template and asign values 
$template= new Template('templates/create.php');

$template->totalNumberOfPosts=$post->getTotalNumberPost();
$template->totalNumberOfCategories= $post->getTotalNumberCategories();
$template->totalNumberOfUsers= $user->getTotalNumberOfUsers();

//display template
echo $template;
