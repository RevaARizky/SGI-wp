<?php
/**
 * Block template file: block.php
 *
 * Hero Internal Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-blog no-anim md:py-32 py-12 text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php
        $post = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order'
        ));
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <?php if($post->have_posts()) : ?>
        <div class="container">
            <div class="grid grid-cols-12 md:gap-x-10 md:gap-y-14 gap-y-7">
                <?php while($post->have_posts()) : ?>
                    <?php $post->the_post(); ?>

                    <div class="md:col-span-6 col-span-12">
                        <a href="<?= get_the_permalink() ?>">
                                <div class="image-wrapper relative pt-[75%] mb-5">
                                    <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'full') ?>" class="absolute inset-0 object-cover w-full h-full" alt="">
                                </div>
                                <div class="date-wrapper mb-2.5">
                                    <p class="text-base font-medium"><?= get_the_date("F j, Y", get_the_id()) ?></p>
                                </div>
                                <div class="title-wrapper mb-2.5">
                                    <p class="text-2xl font-montserrat font-medium"><?= get_the_title(); ?></p>
                                </div>
                                <div class="description-wrapper">
                                    <p class="text-lg font-medium"><?= get_field('short_description', get_the_id()); ?></p>
                                </div>
                        </a>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>