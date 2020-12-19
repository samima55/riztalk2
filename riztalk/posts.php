<?php require('core/init.php'); ?>
<?php 

$post= new Post;
$user = new User;

$category= isset($_GET['category']) ? $_GET['category'] : null;

$user_id =isset($__GET['user']) ? $_GET['user'] : null;

$template = new Template('templates/posts.php');


if(isset($category)){
   $template->posts= $post->getByCategory($category);
   $template->title ="Post in ".$post->getCategory($category)->type;

}
if(isset($user_id)){
   $template->posts=$post->getByUser($user_id);

}

if(!isset($category) && !isset($user_id)){

    $template->posts=$post->getAllPosts();
}


$template->totalNumberOfPosts=$post->getTotalNumberPost();
$template->totalNumberOfCategories= $post->getTotalNumberCategories();
$template->totalNumberOfUsers= $user->getTotalNumberOfUsers();

echo $template;

