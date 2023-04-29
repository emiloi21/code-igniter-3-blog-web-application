<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1><?= $title ?></h1>
        <p class="lead">List of all blog categories</p>
         
        <?php foreach($categories as $category) : ?>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title"><a href="<?php echo site_url('/categories/posts/'.$category['category_id']); ?>" title="View all post under <?php echo $category['name']; ?> category..."><?php echo $category['name']; ?></a></h4>

                    <?php if($this->session->userdata('user_id') == $category['user_id']) : ?>
                    <hr />

                    <?php echo form_open('/categories/delete/'.$category['category_id']); ?>

                    <a href="<?php echo site_url('/categories/edit/'.$category['category_id']); ?>" class="btn btn-success float-left">Edit Blog category</a>
                
                    
                    <?php echo form_submit('submit', 'Delete', 'class="btn btn-danger"'); ?>
                    <?php echo form_close(); ?>
                    <?php endif; ?>

                </div>
            </div>
            
        <?php endforeach; ?>

    </div>
    
</div>
