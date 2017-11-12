<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>/assets/css/style.css">
        <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <title>Ciblog</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?=base_url();?>">ciBlog</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="<?=base_url();?>">Home</a></li>
                    <li><a href="<?=base_url();?>about">About</a></li>
                    <li><a href="<?=base_url();?>posts">Blog</a></li>
                    <li><a href="<?=base_url();?>categories">Categories</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php if($this->session->userdata('logged_in')) :?>
                    <li><a href="<?=base_url();?>posts/create">Create post</a></li>
                    <li><a href="<?=base_url();?>categories/create">Create category</a></li>
                    <li><a href="<?=base_url();?>users/logout">LogOut</a></li>
                <?php else:?>
                    <li><a href="<?=base_url();?>users/login">LogIn</a></li>
                    <li><a href="<?=base_url();?>users/register">Register</a></li>
                <?php endif;?>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <?php if($this->session->flashdata('post_created')): ?>
                    <p class="alert alert-success">
                        <?=$this->session->flashdata('post_created');?>
                    </p>
                <?php endif;?>
                <?php if($this->session->flashdata('post_updated')): ?>
                    <p class="alert alert-success">
                        <?=$this->session->flashdata('post_updated');?>
                    </p>
                <?php endif;?>
                <?php if($this->session->flashdata('post_delete')): ?>
                    <p class="alert alert-success">
                        <?=$this->session->flashdata('post_delete');?>
                    </p>
                <?php endif;?>
                <?php if($this->session->flashdata('user_registered')): ?>
                    <p class="alert alert-success">
                        <?=$this->session->flashdata('user_registered');?>
                    </p>
                <?php endif;?>
                <?php if($this->session->flashdata('cat_created')): ?>
                    <p class="alert alert-success">
                        <?=$this->session->flashdata('cat_created');?>
                    </p>
                <?php endif;?>
                <?php if($this->session->flashdata('user_loginfaild')): ?>
                    <p class="alert alert-danger ">
                        <?=$this->session->flashdata('user_loginfaild');?>
                    </p>
                <?php endif;?>
                <?php if($this->session->flashdata('user_logedin')): ?>
                    <p class="alert alert-success ">
                        <?=$this->session->flashdata('user_logedin');?>
                    </p>
                <?php endif;?>
                <?php if($this->session->flashdata('logout_done')): ?>
                    <p class="alert alert-success ">
                        <?=$this->session->flashdata('logout_done');?>
                    </p>
                <?php endif;?>
                <?php if($this->session->flashdata('category_delete')): ?>
                    <p class="alert alert-success ">
                        <?=$this->session->flashdata('category_delete');?>
                    </p>
                <?php endif;?>
            </div> 
