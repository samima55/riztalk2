<?php include('includes/header.php'); ?>

<ul class="mt-6">
    <li class="grid grid-cols-6 gap-x-0 mt-2 border-b-2 border-gray-400 bg-gray-200">
        <!-- img -->
        <div class="col-span-1 align-start">
            <img src="images/avatar/<?php echo $posts->avatar; ?>" width="80" alt="">
            <ul class="text-xs text-gray-500 -ml-12">
                <li><?php echo $post->username ?></li>
                <li><?php echo userPostCount($post->user_id); ?> Posts</li>
                <li class="hover:underline">
                    <a href="<?php echo BASE_URI; ?>posts.php?user=<?php echo $post->user_id; ?>">
                        Profile</a>
            </ul>
        </div>
        <!-- topic-title-user-time-date -->

        <div class="col-start-2 col-span-5 text-left">
            <p><?php echo $post->body; ?></p>

        </div>
    </li>
    <?php foreach ($replies as $reply) : ?>
        <li class="grid grid-cols-6 gap-x-0 mt-2 border-b-2 border-gray-400">
            <!-- img -->
            <div class="col-span-1 justify-center">
                <img src="<?php echo BASE_URI; ?>images/avatar/<?php echo $posts->avatar; ?>" width="80" alt="">
                <ul class="text-xs text-gray-500 -ml-12">
                    <li><?php echo $reply->username; ?></li>
                    <li><?php echo userPostCount($reply->user_id); ?> Posts</li>
                    <li class="hover:underline">
                        <a href="<?php echo BASE_URI; ?>posts.php?user=<?php echo $reply->user_id; ?>">Profile</a>
                </ul>
            </div>
            <!-- topic-title-user-time-date -->

            <div class="col-start-2 col-span-5 text-left">
                <p><?php echo $reply->body; ?></p>

            </div>
        </li>
    <?php endforeach; ?>
</ul>



<?php if (isLoggedIn()) : ?>
    <h3 class="text-blue-600 mt-4">Reply To Topic</h3>

    <form method="post" action="posts.php?id=<?php echo $post->id; ?>">
        <div class="mt-1 flex flex-col ">
            <textarea id="reply" name="reply" rows="6" cols="60" class="rounded"></textarea>
            <script>
                ClassicEditor
                    .create(document.querySelector('#reply'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        </div>
        <button name="do_reply" type="submit" class="py-2 px-4 rounded-full bg-blue-500 mt-4 text-blue-200 hover:bg-blue-400 float-left">
            Submit
        </button>
    </form>

<?php else : ?>
    <p> please log in to reply </p>
<?php endif; ?>


<?php include('includes/footer.php'); ?>