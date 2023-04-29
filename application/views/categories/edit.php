<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1><?= $title ?></h1>
        <p class="lead">Update blog category</p>

        <?php echo validation_errors(); ?>

        <?php echo form_open('categories/update'); ?> 

        <input name="category_id" value="<?php echo $category['category_id']; ?>" type="hidden" />

            <div class="form-group">
            <label class="form-label mt-4">Name</label>
            <input name="name" value="<?php echo $category['name']; ?>" type="text" class="form-control" placeholder="Enter name">
            </div>
            
            <?php echo form_submit('submit', 'Update Blog Category', 'class="btn btn-success mt-4"'); ?>
                    
        <?php echo form_close(); ?>

        
    </div>
    
</div>
