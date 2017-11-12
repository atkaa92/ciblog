<h2><?= $title ;?></h2>
<?= validation_errors(); ?>
<div>
    <?= form_open('posts/update'); ?>
        <input type="hidden" name="id" value="<?= $post['id'] ;?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Add title" value="<?= $post['title'] ;?>">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea class="form-control" name="body" placeholder="Add body" id="editor1"><?= $post['body'] ;?></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <?php foreach($categories as $category):?>
                    <option value="<?= $category['id'] ;?>"><?= $category['name'] ;?></option>
                <?php endforeach ;?>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Update</button>
    <?=form_close(); ?>
</div>