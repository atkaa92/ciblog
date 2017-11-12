
<?= validation_errors(); ?>
<div>
    <?= form_open_multipart('users/login'); ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="text-center"><?= $title ;?></h2>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">LogIn</button>
            </div>
        </div>
    <?=form_close(); ?>
</div>