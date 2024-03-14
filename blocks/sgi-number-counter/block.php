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
$id = 'number-counter-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-number-counter text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$contents = get_field('content');

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner bg-sgi-orange">
        <div class="container">
            <div class="grid grid-flow-col relative md:gap-x-16 py-16 content-center">
                <?php foreach($contents as $content) : ?>
                    <div class="text-center">
                        <div class="inner flex text-5xl justify-center mb-4 ">
                            <span class="counter-anim"><?= $content['highlight'] ?></span><?php if($content['highlight_accent']) : ?> <span class="text-[55%] leading-none"> <?= $content['highlight_accent'] ?> </span> <?php endif; ?>
                        </div>
                        <div class="title-wrapper text-base">
                            <?= $content['title'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>