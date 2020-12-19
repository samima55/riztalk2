<?php include('includes/header.php'); ?>

                <form action="create.php" method="post">
                    <div class="mt-4 flex flex-col ">
                        <label >Topic title :</label>
                        <input name="title" type="text" placeholder="Enter post title"  class="rounded h-8">
                    </div>
                    <div class="mt-4 flex flex-col">
                        <label >select category :</label>
                        <select name="category" class="rounded h-8">
                            
                        <?php foreach(getCategories() as $category) : ?>
              <option value="<?php echo $category->id; ?>"><?php echo $category->type; ?></option>
                          <?php endforeach; ?>
                    
                    
                        </select>
                    </div>
                    <div class="mt-4 flex flex-col">
                        <label >Topic body</label>
                        <textarea id="body" name="body" rows="6" cols="60" class="rounded" ></textarea>      
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#body' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    
                    </div>
                    <button  name="do_create" type="submit" class="py-2 px-4 rounded-full bg-blue-500 mt-4 text-blue-200 hover:bg-blue-400">Submit</button>
                </form>
                <?php include('includes/footer.php'); ?>