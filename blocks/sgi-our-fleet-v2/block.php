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
$id = 'our-fleet-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-our-fleet bg-sgi-footer';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$title = get_field('title');
$bg = get_field('bg_image');
$slides = get_field('slides');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner relative">
        <div class="container relative overflow-hidden z-20">
            <div class="title-wrapper mb-10">
                <p class="text-4xl">
                    <?= $title ?>
                </p>
            </div>
            <div class="content-wrapper flex md:flex-nowrap flex-wrap justify-center items-center">
                <div class="slider-outer w-full relative">
                    <div class="slider-wrapper fleet-slider md:mb-16 mb-8">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                        <?php foreach($slides as $slide) : ?>
                            <div class="swiper-slide !h-auto">
                                <div class="image-wrapper px-32 h-full">
                                    <img src="<?= $slide['image']['url'] ?>" class="object-cover w-full h-full mx-auto" alt="">
                                </div>
                            </div>
                        <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
            
                    <div class="fleet-options flex justify-center items-center md:gap-x-14 gap-x-8 md:gap-y-0 gap-y-4 md:flex-nowrap flex-wrap relative z-40">
                        <?php $i = 0 ?>
                        <?php foreach($slides as $slide) : $i++ ?>
                            <div class="item cursor-pointer md:px-5 px-2 md:py-2 py-3 rounded-2xl md:rounded-3xl<?= $i == 1 ? ' active' : '' ?>" data-index="<?= $i ?>">
                                <p class="text-[10px] md:text-sm<?= $i == 1 ? ' active' : '' ?>"><?= $slide['title'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-wrapper">
            <img src="<?= $bg['url'] ?>" class="absolute inset-0 w-full h-full object-cover z-10" alt="">
        </div>
    </div>

</section>