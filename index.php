<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col">
           <h1><?= get_the_title(); ?></h1>
           <?= do_shortcode(get_the_content()); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>