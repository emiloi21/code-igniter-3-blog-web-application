<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1><?= $title ?></h1>
        <p class="lead">List of all blog posts</p>
        <!--p><a href="<?php echo site_url('/posts/create'); ?>" class="btn btn-primary"><i class="bi bi-plus"></i> Create Blog Post</a></p-->

        <?php foreach($posts as $post) : ?>
            <div class="row mb-4">

                <div class="col-3">
                    <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" style="width: 100%; height: auto;" class="img-thumbnail"/>
                </div>

                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $post['title']; ?></h4>
                            <h6 class="card-subtitle mb-2 text-muted"><span class="badge bg-light">Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?> Category</strong></span></h6>
                            <p class="card-text"><?php echo word_limiter($post['body'], 60); ?></p>
                            <a href="<?php echo site_url('/posts/'.$post['id']); ?>" class="btn btn-primary">Read more &raquo;</a>
                        </div>
                    </div>
                </div>

            </div>
            
        <?php endforeach; ?>
        <div class="pagination-links";>
        <?php echo $this->pagination->create_links(); ?>
        </div>

    </div>
    
</div>
