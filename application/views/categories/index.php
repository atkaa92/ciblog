<h2><?= $title ;?></h2>
<?php foreach($categories as $category):?>
    <a href="<?= site_url('categories/posts/'. $category['id']) ;?>"><?= $category['name'] ;?></a>
    <?php if($this->session->userdata('user_id') == $category['user_id']):?>
        <form action="categories/delete/<?= $category['id'];?>" method="post" style="display:inline;">
            <input type="submit" class="btn-link" value="[X]" style="color:red;">
        </form>
    <?php endif ;?>
    <br>
<?php endforeach ;?>