<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1><?= $title ?></h1>
        <p class="lead">Update blog post</p>

        <?php echo validation_errors(); ?>

        <?php echo form_open('posts/update'); ?> 

        <input name="id" value="<?php echo $post['id']; ?>" type="hidden" />

            <div class="form-group">
            <label class="form-label mt-4">Title</label>
            <input name="title" value="<?php echo $post['title']; ?>" type="text" class="form-control" placeholder="Enter title">
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
            <!--textarea name="body" class="form-control" rows="3" placeholder="Enter blog contents"><?php echo $post['body']; ?></textarea-->
            <textarea id="editor1" name="body"><?php echo $post['body']; ?></textarea>
            </div>
            
            <?php echo form_submit('submit', 'Update Blog Post', 'class="btn btn-success mt-4"'); ?>
                    
        <?php echo form_close(); ?>

        
    </div>
    
</div>
