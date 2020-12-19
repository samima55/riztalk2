<?php require('core/init.php'); ?>
<?php 
if(isset($_POST['do_login'])){
 //get vars 
  $username =$_POST['username'];
  $password =md5($_POST['password']);
  //create user object
    $user = new User;
    if($user->login($username, $password)){
     redirect('index.php', 'you have been logged in','success');   
    }
    else{
        redirect('index.php', 'this login in not valid', 'error');
        
    }
}
else{
    redirect('index.php');
}