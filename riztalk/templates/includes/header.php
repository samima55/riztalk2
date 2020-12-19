<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="templates/css/style.css">
    <title>RizTalk</title>

    <?php
      if(!isset($title)){
        $title= SITE_TITLE;
      }
         ?>
</head>

<body>

    <!-- header ----- -->
    <header>
        <div class="md:flex  bg-blue-400 md:justify-between p-2 sm:justify-between">
            <!-- left -->
            <div class="flex items-center">
                <img width="60"
                    src="https://cdn1.iconfinder.com/data/icons/app-user-interface-line/64/chat_app_user_interface_conversation_dialogue_discussion-256.png"
                    alt="">
                <a href="#" class="text-lg font-bold text-blue-100">RizTalk</a>
            </div>
            <!-- right -->

            <div class="pt-2">
                <a href="index.php"
                    class="inline-block text-sm py-1 px-4 rounded-full bg-blue-200 hover:bg-blue-100 text-blue-600 mr-2">Home</a>
                    
                    <!-- if not loggedn in show create account on navbar -->
                   
                    <?php if(!isLoggedIn()) : ?>
                <a href="register.php"
                    class="inline-block text-sm py-1 px-4 rounded-full bg-blue-200  hover:bg-blue-100 text-blue-600 mr-2">Create
                    Acount</a>
              
                    <!-- if logged in then show create topic on navbar -->
                  
                    <?php else : ?>
                <a href="create.php"
                    class="inline-block  text-sm py-1 px-4 rounded-full bg-blue-200  hover:bg-blue-100 text-blue-600 mr-2">Create
                    Topic</a>
                    <?php endif; ?>
            </div>
        </div>
    </header>
    <!-- main part -->

    <main class="bg-blue-200">

        <div class="md:grid md:grid-cols-8 gap-2 py-2 pb-20">
            <!-- left -->
            <div class=" col-start-2 col-span-4  text-center">
                <h1 class="text-blue-600 font-bold"> <?php echo $title ?></h1>
                <hr>
                <?php displayMessage(); ?>