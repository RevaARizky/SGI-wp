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
$id = 'icon-highlight-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-icon-highlight text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$bg = get_field('bg_image');
$contents = get_field('content');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner has-bg" style="background-image: url(<?= $bg['url'] ?>);">
        <div class="container">
            <div class="py-32 px-14 content-center">
                <div class="inner grid grid-cols-12 relative md:gap-x-24">
                    <?php foreach($contents as $content) : ?>
                        <div class="item col-span-3 text-center relative z-10">
                            <div class="icon-wrapper mb-8 text-center relative">
                                <img src="<?= $content['icon']['url'] ?>" class="w-full h-auto" alt="">
                            </div>
                            <div class="title-wrapper mb-4">
                                <p class="text-white"><?= $content['title'] ?></p>
                            </div>
                            <div class="description-wrapper">
                                <p class="text-white capitalize"><?= $content['description'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="line absolute w-full top-[110px] h-[0.6px] bg-sgi-orange"></div>
                </div>
            </div>
        </div>
    </div>
</section>