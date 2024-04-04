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
$id = 'blog-v2-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-blog-v2 text-sgi-dark-grey';
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
            <div class="grid grid-cols-12 md:gap-x-10 md:gap-y-16 gap-y-7">
                <?php while($post->have_posts()) : ?>
                    <?php $post->the_post(); ?>

                    <div class="md:col-span-4 col-span-12 item">
                        <div class="inner-wrapper bg-sgi-white-shade relative">
                            <a href="<?= get_the_permalink() ?>">
                                <div class="image-wrapper relative pt-[68%]">
                                    <div class="overlay-image absolute inset-0 bg-[rgba(0,0,0,.4)] z-10" style="opacity: 0;"></div>
                                    <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'full') ?>" class="absolute inset-0 object-cover w-full h-full" alt="">
                                    <div class="btn md:px-8 px-4 md:py-4 py-2 bg-sgi-orange md:text-xs text-[10px] text-white absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20" style="opacity: 0;">Read More</div>
                                </div>
                                <div class="text-wrapper px-7 py-10">
                                    <div class="date-wrapper mb-1.5 md:mb-2.5">
                                        <p class="md:text-base text-desc-small font-medium"><?= get_the_date("F j, Y", get_the_id()) ?></p>
                                    </div>
                                    <div class="title-wrapper mb-1.5 md:mb-2.5">
                                        <p class="text-title font-montserrat font-medium"><?= get_the_title(); ?></p>
                                    </div>
                                    <div class="description-wrapper">
                                        <p class="text-desc-small"><?= get_field('short_description', get_the_id()); ?></p>
                                    </div>
                                </div>
                            </a>
                            <div class="line-bottom absolute bottom-0 h-[3px] bg-sgi-orange"></div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>