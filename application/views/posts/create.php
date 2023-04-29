<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1><?= $title ?></h1>
        <p class="lead">Create new blog post</p>
        
        <?php echo validation_errors(); ?>

        <?php echo form_open_multipart('posts/create'); ?> 

            <div class="form-group">
            <label class="form-label mt-4">Title</label>
            <input name="title" type="text" class="form-control" placeholder="Enter title">
            </div>
            
            <div class="form-group">
            <label class="form-label mt-4">Category</label>
            <select name="category_id" class="form-control">

                <?php foreach($categories as $category) : ?>

                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>

                <?php endforeach; ?>
                
            </select>
            </div>

            <div class="form-group">
            <label class="form-label mt-4">Body</label>
            <textarea id="editor1" name="body"></textarea>
            </div>

            <div class="form-group">
            <label class="form-label mt-4">Upload Post Image</label>
            <input type="file" name="userfile" class="form-control" />
            </div>
            
            <?php echo form_submit('submit', 'Save Blog Post', 'class="btn btn-primary mt-4"'); ?>
                    
        <?php echo form_close(); ?>

        
    </div>
    
</div>
