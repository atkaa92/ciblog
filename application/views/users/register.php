
<?= validation_errors(); ?>
<div>
    <?= form_open_multipart('users/register'); ?>
    <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="text-center"><?= $title ;?></h2>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Zipcode</label>
                    <input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
    <?=form_close(); ?>
</div>