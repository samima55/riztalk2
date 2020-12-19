<?php include('includes/header.php'); ?>

                <form action="register.php" enctype="multipart/form-data" method="post">
                    <div class="mt-4 flex flex-col">
                        <label >Name*:</label>
                        <input name="name" type="text" placeholder="Enter name"  class="rounded h-8">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <label >Email*:</label>
                        <input name="email" type="email" placeholder="Enter email"  class="rounded h-8">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <label >choose Username*:</label>
                        <input name="username" type="text" placeholder="Choose a username"  class="rounded h-8">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <label >password*:</label>
                        <input name="password" type="password" placeholder="Type Password"  class="rounded h-8">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <label >Confirm password*:</label>
                        <input name="password2" type="password" placeholder="Type Password"  class="rounded h-8">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <label >Upload Avatar:</label>
                        <input name="avatar" type="file"   class="rounded h-8">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <label>About Me</label>
                         <textarea name="about" rows="3" cols="60"  class="rounded "
                        placeholder="Tell us about yourself (Optional)"></textarea>
                    </div>

                    <input name="register" type="submit" class="py-2 px-4 rounded-full bg-blue-500 mt-4 text-blue-200 hover:bg-blue-400" value="Register" />
                </form>
                

                <?php include('includes/footer.php'); ?>