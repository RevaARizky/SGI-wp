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
$lineWidth = get_field('line_width');
$space = get_field('space');
$mobileSpace = get_field('mobile_space');
$bg = get_field('use_footer_bg');
if($space == 'py-6') {
    $space = 'py-8';
}

?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?> md:<?= $space ?> <?= $mobileSpace ? $mobileSpace : $space ?><?= $bg ? ' bg-sgi-secondary' : '' ?>">
    <div class="<?= $container ? 'container' : 'wrapper' ?>">
        <?php if($line) : ?> <div class="spacer <?= $lineWidth ? 'border-sgi-orange' : 'w-full border-white' ?> mx-auto border-b" <?= $lineWidth ? 'style="width: ' . $lineWidth . ';"' : '' ?>></div> <?php endif; ?>
    </div>
</section>