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
$id = 'image-text-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-text text-sgi-dark-grey relative';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$bg = get_field('use_bg_footer');
$bgimage = get_field('bg_image');
$imageRight = get_field('image_right');
$image = get_field('image');
$imageRadius = get_field('image_radius');
$ratio = get_field('image_size');
$imageSize = get_field('image_width_height');
$subtitle = get_field('subtitle');
$title = get_field('title');
$description = get_field('description');
$buttonLink = get_field('btn_link');
$buttonText = get_field('btn_text');
$icon = get_field('logo');

$imagePos = '';
if($imageSize != 'full') {
    $imagePos = 'md:top-1/2 md:left-1/2 md:right-unset md:bottom-unset md:-translate-y-1/2 md:-translate-x-1/2';
}

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?> <?= $bg ? 'bg-sgi-white-shade' : '' ?>">
<div class="inner-wrapper">
    <?php if($bgimage) : ?>
    <div class="bg-overlay">
        <img src="<?= $bgimage['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
    </div>
    <?php endif; ?>
</div>
    <div class="container">
        <div class="grid grid-cols-12 relative md:gap-x-16 md:gap-y-0 gap-y-6 items-center">
            <div class="md:col-span-6 col-span-12<?= $imageRight ? ' md:order-1' : ' md:order-0' ?>">
            <?php if($image) : ?>
                <div class="image-wrapper relative <?= $ratio ? '' : 'pt-[60%]' ?>" style="<?= $ratio ? 'padding-top: ' . $ratio : '' ?>" data-speed=".92">
                    <img src="<?= $image['url'] ?>" class="absolute inset-0 <?= $imagePos ?> md:w-<?= $imageSize ?> md:h-<?= $imageSize ?> w-full h-full object-cover" style="<?= $imageRadius ? 'border-radius: ' . $imageRadius . ';' : '' ?>" alt="">
                </div>
            <?php endif; ?>
            </div>
            <div class="md:col-span-6 col-span-12<?= $imageRight ? ' md:order-0' : ' md:order-1' ?>">
                <?php if($title || $description || $subtitle) : ?>
                <div class="text-wrapper mb-6">
                    <?php if($subtitle) : ?>
                        <div class="subtitle-wrapper mb-8">
                            <p class="text-desc-small"><?= $subtitle ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($title) : ?>
                    <div class="title-wrapper md:mb-9 mb-4">
                        <p class="text-subtitle"><?= $title ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($description) : ?>
                    <div class="description-wrapper">
                        <p class="text-desc-small"><?= $description ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($buttonLink && $buttonText) : ?>
                    <div class="button-wrapper mt-9">
                        <a href="<?= $buttonLink ?>" class="md:px-8 px-4 md:py-4 py-2 bg-sgi-orange md:text-xs text-[12px] text-sgi-dark-grey"><?= $buttonText ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if($icon) : ?>
                <div class="icon-wrapper">
                    <img src="<?= $icon['url'] ?>" class="object-cover" width="250" alt="">
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>