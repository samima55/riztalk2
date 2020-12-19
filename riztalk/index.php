<?php require('core/init.php'); ?>
<?php 

$post = new Post;
$user= new User;
//get template and asign values 
$template= new Template('templates/frontpage.php');

//topics is a vriable of the template 
$template->posts = $post->getAllPosts();


$template->totalNumberOfPosts=$post->getTotalNumberPost();
$template->totalNumberOfCategories= $post->getTotalNumberCategories();
$template->totalNumberOfUsers= $user->getTotalNumberOfUsers();
//display template
echo $template;