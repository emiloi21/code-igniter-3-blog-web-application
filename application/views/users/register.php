<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <h1><?= $title ?></h1>
        <p class="lead">Sign up for free</p>
 
        <?php echo validation_errors(); ?>

        <?php echo form_open('users/register'); ?> 

            <div class="row">

                <div class="form-group col-4">
                <label class="form-label mt-4">Last Name</label>
                <input name="lname" type="text" class="form-control" placeholder="Enter last name">
                </div>

                <div class="form-group col-4">
                <label class="form-label mt-4">First Name</label>
                <input name="fname" type="text" class="form-control" placeholder="Enter first name">
                </div>
                
                <div class="form-group col-4">
                <label class="form-label mt-4">Emaill Address</label>
                <input name="email_address" type="email" class="form-control" placeholder="Enter valid email address">
                </div>

                <div class="form-group col-4">
                <label class="form-label mt-4">Username</label>
                <input name="username" type="text" class="form-control" placeholder="Enter username">
                </div>

                <div class="form-group col-4">
                <label class="form-label mt-4">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Enter password">
                </div>

                <div class="form-group col-4">
                <label class="form-label mt-4">Confirm Password</label>
                <input name="password2" type="password" class="form-control" placeholder="Confirm password">
                </div>

                <div class="d-grid gap-2">
                <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary mt-4"'); ?>
                </div>
                
            </div>

            
                    
        <?php echo form_close(); ?>

        
    </div>
    
</div>
