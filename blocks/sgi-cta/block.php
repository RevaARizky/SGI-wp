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
$id = 'cta-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-home md:py-16 py-8';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$bgImage = get_field('bg_image');
$title = get_field('title');
$cta = get_field('cta');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner-animation">
        <div class="container">
            <div class="content-wrapper flex justify-center items-center md:py-28 py-16" style="background-image: url('<?= $bgImage['url'] ?>'); background-position: center; background-size: cover;">
                <div class="wrapper">
                    <div class="title-wrapper text-center md:mb-8 mb-4">
                        <p class="font-montserrat text-title text-white md:leading-relaxed"><?= $title ?></p>
                    </div>
                    <div class="button-wrapper text-center">
                        <a href="<?= $cta['url'] ?>" class="md:px-8 px-4 md:py-4 py-2 bg-sgi-orange md:text-xs text-[10px] text-white"><?= $cta['text'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>