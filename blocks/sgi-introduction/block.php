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
$id = 'introduction-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-introduction';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$title = get_field('title');
$subtitle = get_field('subtitle');

?>

<?php if($title || $subtitle) : ?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

    <div class="container pt-12 pb-6 text-white text-center">
        <?php if($subtitle) : ?>
        <div class="subtitle-wrapper w-3/4 mx-auto">
            <p class="text-4xl leading-snug tracking-wider font-montserrat"><?= $subtitle; ?></p>
        </div>
        <?php endif; ?>
    </div>

</section>

<?php endif; ?>