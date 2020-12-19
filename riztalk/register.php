<?php require('core/init.php'); ?>
<?php 

$post = new Post;


//Create User Object
$user = new User;


//Create validator Object
$validate = new Validator;

if(isset($_POST['register'])){
	//Create Data Array
	$data = array();
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];
	$data['password'] = md5($_POST['password']);
	$data['password2'] = md5($_POST['password2']);
	$data['about'] = $_POST['about'];
    $data['last_activity'] = date("Y-m-d H:i:s");

    $field_array = array('name','email','username','password','password2');

    //checking for validation of fields in register form 
    
	if($validate->isRequired($field_array)){
		if($validate->isValidEmail($data['email'])){
			if($validate->passwordsMatch($data['password'],$data['password2'])){

					//Upload Avatar Image
					if($user->uploadAvatar()){
						$data['avatar'] = $_FILES["avatar"]["name"];
					}else{
						$data['avatar'] = 'noimage.png';
                    }
                    
					//Register User
					if($user->register($data)){
						redirect('index.php', 'You are registered and can now log in', 'success');
					} else {
						redirect('index.php', 'Something went wrong with registration', 'error');
					}
			} else {
				redirect('register.php', 'Your passwords did not match', 'error');
			}
		} else {
			redirect('register.php', 'Please use a valid email address', 'error');
		}
	} else {
		redirect('register.php', 'Please fill in all required fields', 'error');
	}
}

//this is the controller for the register view or register template 
//get template and asign values 
$template= new Template('templates/register.php');

$template->totalNumberOfPosts=$post->getTotalNumberPost();
$template->totalNumberOfCategories= $post->getTotalNumberCategories();
$template->totalNumberOfUsers= $user->getTotalNumberOfUsers();
//display template
echo $template;