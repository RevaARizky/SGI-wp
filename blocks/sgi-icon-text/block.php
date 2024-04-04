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
$id = 'icon-text-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-icon-text text-sgi-dark-grey';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$contents = get_field('content');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner">
        <div class="container">
            <div class="grid grid-cols-12 md:gap-x-10 gap-y-16">
                <?php foreach($contents as $index=>$content) : ?>
                    <div class="md:col-span-6 col-span-12">
                        <div class="inner-wrapper item bg-sgi-white-shade md:px-20 px-10 md:py-24 py-12 text-center">
                            <div class="icon-wrapper mb-7">
                                <?= $content['icon'] ?>
                            </div>
                            <div class="title-wrapper mb-6">
                                <p class="text-2xl"><?= $content['title'] ?></p>
                            </div>
                            <div class="description-wrapper">
                                <p class="text-lg"><?= $content['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>