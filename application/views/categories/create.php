<h2><?= $title ;?></h2>
<?= validation_errors(); ?>
<div>
    <?= form_open_multipart('categories/create'); ?>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Add name">
        </div>
        <button type="submit" class="btn btn-default">Add catgoery</button>
    <?=form_close(); ?>
</div>