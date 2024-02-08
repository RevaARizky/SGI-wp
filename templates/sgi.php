<?php /** Template Name: SGI Website */ 
get_header('sgi'); ?>

<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <?= the_content(); ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer('sgi') ?>