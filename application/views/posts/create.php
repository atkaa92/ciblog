<h2><?= $title ;?></h2>
<?= validation_errors(); ?>
<div>
    <?= form_open_multipart('posts/create'); ?>
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Add title">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" name="body" placeholder="Add body" id="editor1"></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <?php foreach($categories as $category):?>
                    <option value="<?= $category['id'] ;?>"><?= $category['name'] ;?></option>
                <?php endforeach ;?>
            </select>
        </div>
        <div class="form-group">
            <label>Upload Image</label>
            <input type="file" class="form-control" name="userfile" size="20">
        </div>
        <button type="submit" class="btn btn-default">Add post</button>
    <?=form_close(); ?>
</div>