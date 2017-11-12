<h2><?= $post['title'] ;?></h2>
<img src="<?= site_url() ;?>assets/images/posts/<?= $post['postimage']; ?>">
<div class="post_body">
    <p><?= $post['body'] ;?> </p>
</div>
<small class="postDate">Posted on: <?= $post['created_at']; ?> </small>
<?php if($this->session->userdata('user_id') == $post['user_id']):?>
    <hr>
    <a href="<?=base_url(); ?>posts/edit/<?=$post['id']; ?>" class="btn btn-primary">Edit</a>
    <div class="pull-right">
        <?= form_open('posts/delete/'.$post['id']); ?>
            <button type="submit" class="btn btn-danger">Delete</button>
        <?=form_close(); ?>
    </div>
<?php endif;?>
<hr>
<h3>Comments</h3>
<?php if($comments) :?>
    <?php foreach($comments as $comment): ?>
        <div class="well">
            <h5><?= $comment['body']; ?></h5>
            <small>Written on : <?= $comment['created_at']; ?> by: <b><?= $comment['name']; ?></b></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="well">
        <h3>No comment found</h3>
    </div>
<?php endif;?>
<?= validation_errors(); ?>
<?= form_open('comments/create/'.$post['id']); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Add name">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Add eamil">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea class="form-control" name="body" placeholder="Add body"></textarea>
    </div>
    <input type="hidden" name="id" value="<?=$post['id'] ;?>">
    <button type="submit" class="btn btn-default">Add comment</button>
<?=form_close(); ?>
