<?php require('core/init.php'); ?>
<?php 
  
$post= new Post;
$user= new User;
$post_id = isset($_GET['id']) ? $_GET['id'] : 1;
if(isset($_POST['do_reply'])){
	//Create Data Array
	$data = array();
	$data['post_id'] = $_GET['id'];
	$data['body'] = $_POST['body'];
	$data['user_id'] = getUser()['user_id'];

	//Create Validator Object
	$validate = new Validator;
	
	//Required Fields
	$field_array = array('body');
	
	if($validate->isRequired($field_array)){
		//Register User
		if($post->reply($data)){
			redirect('topic.php?id='.$post_id, 'Your reply has been posted', 'success');
		} else {
			redirect('topic.php?id='.$post_id, 'Something went wrong with your reply', 'error');
		}
	} else {
		redirect('topic.php?id='.$post_id, 'Your reply form is blank!', 'error');
	}
}



$template= new Template('templates/topic.php');

$template->post = $post->getPost($post_id);
$template->replies = $post->getReplies($post_id);
$template->title = $post->getPost($post_id)->title;


$template->totalNumberOfPosts=$post->getTotalNumberPost();
$template->totalNumberOfCategories= $post->getTotalNumberCategories();
$template->totalNumberOfUsers= $user->getTotalNumberOfUsers();
echo $template;