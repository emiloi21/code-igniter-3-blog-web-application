<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1><?= $title ?></h1>
        <p class="lead">Create new blog category</p>
 
        <?php echo validation_errors(); ?>

        <?php echo form_open_multipart('categories/create'); ?> 

            <div class="form-group">
            <label class="form-label mt-4">Name</label>
            <input name="name" type="text" class="form-control" placeholder="Enter name">
            </div>
            
            <?php echo form_submit('submit', 'Save Blog Category', 'class="btn btn-primary mt-4"'); ?>
                    
        <?php echo form_close(); ?>

        
    </div>
    
</div>
