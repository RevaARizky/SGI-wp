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
 * 
 * { py-6, py-12, py-24, py-32 }
 */



// Create id attribute allowing for custom "anchor" value.
$id = 'spacer-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-spacer text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$container = get_field('container');
$line = get_field('line');
$space = get_field('space');

?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?> <?= $space ?>">
    <div class="<?= $container ? 'container' : 'wrapper' ?>">
        <?php if($line) : ?> <div class="spacer w-full border-b border-white"></div> <?php endif; ?>
    </div>
</section>