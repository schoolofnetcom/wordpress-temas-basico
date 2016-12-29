<?php get_header();?>
<?php //get_header('personalizado'); ?>

<div class="container">
    <h1><?php single_post_title(); ?></h1>
    <div class="row">
        <div class="col-md-9">
            <?php
            if (have_posts()): the_post();
                    the_post_thumbnail('medium');
                    the_content();
            endif;
            ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
        <!--<div class="col-md-3">
            <?php //get_sidebar('personalizado') ?>
        </div>-->
    </div>
</div>

<?php //get_footer('personalizado'); ?>
<?php get_footer(); ?>
