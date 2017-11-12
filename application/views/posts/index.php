<h2><?= $title ;?></h2>
<?php foreach($posts as $post): ?>
    <div class="row">
        <div class="col-sm-3">
            <img src="<?= site_url() ;?>assets/images/posts/<?= $post['postimage']; ?>" style="width:100%">
        </div>
        <div class="col-sm-9">
            <h3> <?= $post['title']; ?> </h3>    
            <small class="postDate">Posted on: <b><?= $post['created_at']; ?></b><br> In category: <b><?= $post['name']; ?></b></small>
            <p> <?= word_limiter($post['body']); ?></p>
            <p><a href="<?= site_url('posts/'.$post['iid']); ?>" class="btn btn-default">Read more...</a></p>
        </div>
    </div>
<?php endforeach; ?>
<div class="pagination-link">
    <?= $this->pagination->create_links();?>
</div>