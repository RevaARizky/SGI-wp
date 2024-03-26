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
$id = 'icare-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-icare text-white md:py-20';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$title = get_field('title');
$subtitle = get_field('subtitle');
$icare = get_field('logo');
$bg = get_field('bg');
$description = get_field('description');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?> md:pt-32 md:pb-16">
    <div class="md:container">
        <div class="subtitle-wrapper mb-4 text-center">
            <p class="text-lg"><?= $subtitle ?></p>
        </div>
        <div class="title-wrapper mb-8 text-center">
            <p class="text-5xl font-montserrat tracking-wide"><?= $title ?></p>
        </div>
        <div class="md:py-48 relative z-10 mb-16">
            <div class="bg-overlay"><img src="<?= $bg['url'] ?>" class="absolute inset-0 w-full h-full object-cover -z-10" alt=""></div>
            <div class="inner text-center flex flex-col justify-center items-center">
                <div class="main-logo text-center mb-12">
                    <!-- <img src="<?= $main['url'] ?>" alt=""> -->
                    <?= $icare ?>
                </div>
            </div>
        </div>
        <div class="description-wrapper text-center">
            <p><?= $description ?></p>
        </div>
    </div>

</section>