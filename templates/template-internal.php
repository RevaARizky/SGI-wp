<?php /* Template Name: Internal */

get_header();

$description = get_field('description');
?>

<div class="h-[88px] md:h-[108px] lg:h-[140px]"></div>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> relative my-16 lg:my-32">
    <div class="content md:w-8/12 md:mx-auto text-center px-10">
        <p class="mb-8 uppercase text-gray-6 text-sm lg:text-base"><a href="/">Home</a> /</p>
        <h1 class="text-4xl lg:text-[64px] lg:leading-none"><?php echo get_field('title'); ?></h1>

        <?php if ( $description ) : ?>
        <h2 class="mt-5 font-light text-gray-3 text-xl lg:text-[32px] lg:leading-tight">
            <?php echo $description; ?>
        </h2>
        <?php endif; ?>
    </div>
</div>

<?php while (have_posts()) : the_post(); ?>
    <div class="container my-16 lg:my-28">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
