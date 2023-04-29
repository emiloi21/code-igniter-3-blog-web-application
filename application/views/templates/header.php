<html>

    <head>

        <title>ci3 Blog</title>
        <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.css">
        <link rel="stylesheet" href="https://bootswatch.com/_vendor/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://bootswatch.com/_assets/css/custom.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

        <!-- CKEDITOR V.4-->
        <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    </head>

    <body>

    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="<?php echo base_url(); ?>" class="navbar-brand">ci3 Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>categories">Category</a>
            </li>

          </ul>

          <ul class="navbar-nav ms-md-auto">

            <?php if(!$this->session->userdata('logged_in')) : ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
            </li>

            <?php endif; ?>
            
            <?php if($this->session->userdata('logged_in')) : ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Category</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
            </li>
            
            <?php endif; ?>
            
          </ul>

        </div>
      </div>
    </div>

    <div class="container">
      
    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('user_registered')) : ?>

    <div class="alert alert-dismissible alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('user_registered'); ?>
    </div>

    <?php endif; ?>

    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('post_created')) : ?>

    <div class="alert alert-dismissible alert-primary">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('post_created'); ?>
    </div>

    <?php endif; ?>

    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('post_updated')) : ?>

    <div class="alert alert-dismissible alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('post_updated'); ?>
    </div>

    <?php endif; ?>

    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('post_deleted')) : ?>

    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('post_deleted'); ?>
    </div>

    <?php endif; ?>


    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('category_created')) : ?>

    <div class="alert alert-dismissible alert-primary">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('category_created'); ?>
    </div>

    <?php endif; ?>

    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('category_updated')) : ?>

    <div class="alert alert-dismissible alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('category_updated'); ?>
    </div>

    <?php endif; ?>

    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('category_deleted')) : ?>

    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('category_deleted'); ?>
    </div>

    <?php endif; ?>


    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('login_success')) : ?>

    <div class="alert alert-dismissible alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('login_success'); ?>
    </div>

    <?php endif; ?>

    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('login_failed')) : ?>

    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('login_failed'); ?>
    </div>

    <?php endif; ?>

    <!-- FLASH MESSAGES -->
    <?php if($this->session->flashdata('user_logout')) : ?>

    <div class="alert alert-dismissible alert-secondary">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <?php echo $this->session->flashdata('user_logout'); ?>
    </div>

    <?php endif; ?>


    
      






    