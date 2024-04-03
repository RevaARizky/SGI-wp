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
$id = 'contact-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-contact text-sgi-dark-grey md:py-32 relative';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$title = get_field('title');
$address = get_field('address');
$links = get_field('links');
$form = get_field('contact_form');
?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?>">

    <div class="container">
        <div class="grid grid-cols-12">
            <div class="md:col-span-5 col-span-12">
                <div class="title-wrapper md:mb-20">
                    <p class="md:text-4xl font-light"><?= $title ?></p>
                </div>
                <div class="address-wrapper md:mb-12">
                    <p class="md:text-2xl"><?= $address ?></p>
                </div>
                <div class="links-wrapper">
                    <?php foreach($links as $index=>$link) : ?>
                        <div class="link pb-5 md:mb-12">
                            <a href="<?= $link['url'] ?>"><p class="text-xl"><?= $link['text'] ?></p></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="md:col-span-7 col-span-12">
                <?= do_shortcode($form); ?>
            </div>
        </div>
    </div>

</section>