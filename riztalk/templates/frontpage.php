   <?php include('includes/header.php'); ?>
   
                <ul class="mt-6">
                  <?php if($posts) :?>
                    <?php foreach ($posts as $posts) : ?>
                    <li class="grid grid-cols-6 gap-x-0 mt-2 border-b-2 border-gray-400">
                        <!-- img -->
                        <div class="col-span-1">
                            <img src="images/avatar/<?php echo $posts->avatar; ?>"
                                alt="user-avatar">
                        </div>
                        <!-- topic-title-user-time-date -->
                        <div class="col-start-2 col-span-5 text-left">
                            <h3  class="text-blue-600 hover:underline">
                            <a href="topic.php?id=<?php echo ($posts->id); ?>">
                            <?php echo $posts->title; ?></a></h3>

                            <!-- info -->
                            <div class="text-sm text-gray-500">

                                <a href="posts.php?category=<?php echo ($posts->category_id); ?>"
                                class="hover:text-gray-200">
                                 <?php echo $posts->type;?> </a>


                                -- <a href="posts.php?user=<?php echo ($posts->user_id); ?>"
                                   class="hover:text-gray-200">
                                   <?php echo $posts->username; ?></a>
                                -- posted on  <?Php echo formatDate($posts->create_date); ?> <span
                                    class="float-right rounded-lg bg-gray-200 px-2 ">
                                    <?php echo replyCount($posts->id); ?></span>
                            </div>

                        </div>
                    </li>

                    <?php endforeach ;?>

                </ul>

                <?php else : ?>
                        <p> No Posts yet </p>
                    <?php endif; ?>
            <?php include('includes/footer.php'); ?>
            