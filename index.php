<?php wp_head(); ?>

<?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>

<?php wp_footer(); ?>