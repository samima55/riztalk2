</div>
            <!-- right     sidebar -->
            <div class="col-start-6 col-span-2 pt-6 ml-6 ">


                <!-- login-form -->

                <div class="bg-blue-300 p-4  rounded align-center">
                    <h3 class="font-bold">Login Form</h3>
                    <hr>
                    <?php if(isLoggedIn()) : ?>
                       <div class="flex flex-col">
                        <p> welcome <?php getUser()['name']; ?>
                        <form action="logout.php" method="post"></form>
                        <button type="submit" name="do_logout" value="logout" 
                        class="text-sm py-1 px-1  bg-blue-200 rounded hover:bg-blue-100 text-blue-600 mr-2 mt-2">
                        logout
                        </button>
                       </div>
                       
                       <?php else : ?>
                    <form action="login.php" method="post">

                        <div class="mt-2">
                            <label class="rounded block label">Username</label>
                            <input name="username" type="text" class="" placeholder="Enter Username">
                        </div>
                        <div class="mt-2">
                            <label class="rounded block label">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <button name="do_login" type="submit"  class="text-sm py-1 px-1 rounded bg-blue-200  hover:bg-blue-100 text-blue-600 mr-2 mt-2">Login</button>
                        <a  href="register.php"  class="text-sm py-1 px-1  bg-blue-200 rounded hover:bg-blue-100 text-blue-600 mr-2 mt-2"> Create Account</a>
                    </form>
                    <?php endif; ?>
                </div>

                <!-- categories -->

                <div class="bg-blue-300 mt-6  p-4 rounded">

                    <h3 class="font-bold pl-2">Categories</h3>
                    <hr>
                    <div class=" flex flex-col pl-2">
                    <a href="posts.php" class="mt-2 p-1 hover:underline <?php echo is_active(null); ?>"> All Tpoics </a>      

                    <?php foreach(getCategories() as $category) : ?>
						<a href="posts.php?category=<?php echo $category->id; ?>" class=" mt-2  hover:underline <?php echo is_active($category->id); ?>"><?php echo $category->type; ?> </a> 
                    <?php endforeach; ?>
                    
                    </div>



                </div>
            </div>
        </div>

    </main>

    <footer>
        <div class=" flex justify-around p-10 bg-blue-800 text-blue-200">
            <!-- left part of footer-->

            <div class="md:w-1/2">
                <h3>Forum Statistics</h3>
                <ul class="flex flex-col">
                    <li>Total Number of Users: <strong class="rounded-lg bg-gray-200 px-2 text-gray-800">
                        <?php echo $totalNumberOfUsers; ?></strong></li>
                    <li>Total Number of Topics: <strong class="rounded-lg bg-gray-200 px-2 text-gray-800">
                        <?php echo $totalNumberOfPosts;?></strong></li>
                    <li>Total Number of Categories: <strong class="rounded-lg bg-gray-200 px-2 text-gray-800 ">
                        <?php echo $totalNumberOfCategories; ?></strong></li>
                </ul>

            </div>

            <!-- right part of the footer -->
            <div class=" flex flex-col items-center">
                <div class="flex items-center">
                    <p> Copyright &copy; RizTalk</p>
                    <img width="60"
                        src="https://cdn1.iconfinder.com/data/icons/app-user-interface-line/64/chat_app_user_interface_conversation_dialogue_discussion-256.png"
                        alt="">
                </div>
                <p>Samima Hassan</p>
            </div>
        </div>


    </footer>

</body>

</html>