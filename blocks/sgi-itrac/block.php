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
$id = 'itrac-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-itrac md:py-16 py-8';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$mainImage = get_field('main_image');
$bg = get_field('bg');
$logos = get_field('logos');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

    <div class="inner" style="background-image: url(<?= $bg['url'] ?>)">

        <div class="content-wrapper py-64">
            <div class="main-image-wrapper text-center">
                <img src="<?= $mainImage['url'] ?>" class="w-full object-cover" alt="">
            </div>

            <div class="logo-wrapper flex gap-x-4 items-center">
                <?php foreach($logos as $logo) : ?>
                    <?= $logo['svg'] ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

</section>