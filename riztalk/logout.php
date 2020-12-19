<?php require('core/init.php'); ?>
<?php 
if(isset($_POST['do_logout'])){
   //create user obejct
   $user = new User;
   
if($user->logout()){
    redirect('index.php', 'you are logged out','success');
}

else{
    redirect('index.php');
}
}
