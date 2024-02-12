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
$id = 'about-section';
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-about-section bg-gray-theme relative';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' text-' . $block['align'];
}
$title = get_field('title');
$icon = get_field('icon');
$svg = get_field('svg');
$description = get_field('description');
$center = get_field('text_center');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner-animation">
        <div class="container md:min-h-screen">
            <div class="content-wrapper md:py-32 md:mb-32 mb-12 py-12 custom-border-anim border-white<?= $center ? ' text-center' : '' ?>">
                <?php if($svg) : ?>
                <div class="icon-wrapper text-center mb-8">
                    <?= $svg ?>
                </div>
                <?php endif; ?>
                <?php if($title) : ?>
                <div class="title-wrapper mb-5">
                    <h5 class="text-desc-small text-white font-sans animate-text" data-text-type="lines"><?= $title ?></h5>
                </div>
                <?php endif; ?>
                <?php if($description) : ?>
                <div class="description-wrapper">
                    <p class="text-white text-desc-big md:leading-relaxed leading-relaxed tracking-wide font-light animate-text" data-text-type="lines"><?= $description ?></p>
                </div>
                <?php endif; ?>
            </div>
    
        </div>
    </div>

</section>