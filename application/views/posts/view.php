<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1><?= $title ?></h1>
        <h6 class="card-subtitle mb-2 text-muted"><span class="badge bg-light">Posted on: <?php echo $post['created_at']; ?></span></h6>

            <div class="card">
                <div class="card-body">
                    
                    <p class="card-text" style="text-align: center;">
                    <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" style="width: 75%; height: auto;" class="img-thumbnail" />
                    </p>

                    <p class="card-text"><?php echo $post['body']; ?></p>

                    <?php if($this->session->userdata('user_id') == $post['user_id']) : ?>

                    <hr />

                    <?php echo form_open('/posts/delete/'.$post['id']); ?>

                    <a href="<?php echo site_url('/posts/edit/'.$post['id']); ?>" class="btn btn-success float-left">Edit Blog Post</a>
                    
                    <?php echo form_submit('submit', 'Delete', 'class="btn btn-danger"'); ?>
                    <?php echo form_close(); ?>
                    
                    <?php endif; ?>

                    <hr />

                    <h5>Comments</h5>
                    
                    <?php if($comments) : ?>
                    
                        <?php foreach($comments as $comment) : ?>
                            
                        <div class="card border-secondary mb-3 col-12">

                            <div class="card-header"><?php echo $comment['name']; ?></div>

                            <div class="card-body">
                                <p class="card-text"><?php echo $comment['body']; ?></p>
                            </div>

                        </div>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <p>No Comments to Display</p>

                    <?php endif; ?>

                    <hr />
                    
                    <?php echo validation_errors(); ?>

                    <?php echo form_open('/comments/create/'.$post['id']); ?>
                    
                    <h5>Add Comment</h5>
                    <div class="row">

                        <div class="col-12">
                            <div class="row">

                                <div class="form-group col-6">
                                <label class="form-label mt-4">Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter name">
                                </div>

                                <div class="form-group col-6">
                                <label class="form-label mt-4">Email Address</label>
                                <input name="email_address" type="email" class="form-control" placeholder="Enter email address">
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-4">
                            <label class="form-label mt-4">Body</label>
                            <textarea id="editor1" name="body"></textarea>
                            </div>
                        </div>

                    </div>

                    <?php echo form_submit('submit', 'Add Comment', 'class="btn btn-primary"'); ?>
                    <?php echo form_close(); ?>
                    
                </div>
            </div>

    </div>
    
</div>
