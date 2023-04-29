
<div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4">

        <?php echo validation_errors(); ?>

        <?php echo form_open('users/login'); ?> 

            <h1><?= $title ?></h1>
            <hr />
            <div class="form-group">
            <label class="form-label mt-4">Username</label>
            <input name="username" type="text" class="form-control" placeholder="Enter username" autofucos>
            </div>

            <div class="form-group">
            <label class="form-label mt-4">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Enter password">
            </div>

            <div class="d-grid gap-2">
            <?php echo form_submit('submit', 'Login', 'class="btn btn-primary mt-4"'); ?>
            </div>

        <?php echo form_close(); ?>

    </div>

    <div class="col-md-4"></div>

</div>

    
            

 
