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
$classes = 'acf-block block-image-text text-white md:py-20';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$imageRight = get_field('image_right');
$image = get_field('image');
$title = get_field('title');
$description = get_field('description');
$icon = get_field('logo');

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="container">
        <div class="grid grid-cols-12 relative md:gap-x-16 items-center">
            <div class="md:col-span-6 col-span-12<?= $imageRight ? ' md:order-1' : 'md:order-0' ?>">
            <?php if($image) : ?>
                <div class="image-wrapper relative pt-[100%]">
                    <img src="<?= $image['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                </div>
            <?php endif; ?>
            </div>
            <div class="md:col-span-6 col-span-12<?= $imageRight ? ' md:order-0' : ' md:order-1' ?>">
                <?php if($title || $description) : ?>
                <div class="text-wrapper mb-6">
                    <?php if($title) : ?>
                    <div class="title-wrapper mb-9">
                        <p class="text-5xl"><?= $title ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($description) : ?>
                    <div class="description-wrapper">
                        <p class="text-lg"><?= $description ?></p>
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