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
$id = 'gallery-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-gallery text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$gallery = get_field('gallery');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

    <div class="outer-wrapper relative">
        <div class="gallery-slider-wrapper swiper">
            <div class="swiper-wrapper">
                <?php foreach($gallery as $index=>$image) : ?>
                    <div class="swiper-slide">
                        <div class="image-wrapper relative h-screen w-screen">
                            <img src="<?= $image['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="gallery-slider-nav">
            <div class="button-nav-wrapper flex gap-x-4">
                <div class="btn prev-btn cursor-pointer absolute bottom-10 right-36 z-30">
                    <img src="<?= assets_url('/dist/images/left-arrow.svg') ?>" class="w-full" alt="">
                </div>
                <div class="btn next-btn cursor-pointer absolute bottom-10 right-16 z-30">
                    <img src="<?= assets_url('/dist/images/right-arrow.svg') ?>" class="w-full" alt="">
                </div>
            </div>
        </div>
    </div>

</section>