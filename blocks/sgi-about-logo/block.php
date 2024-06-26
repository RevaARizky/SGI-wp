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
$id = 'about-logo-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-about-logo text-white relative';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$main = get_field('main');
$main_logo = get_field('main_logo');
$logos = get_field('logos');
$bg = get_field('bg');
?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?>">
    <div class="inner">
        <div class="md:py-36 relative z-10">
            <div class="bg-overlay"><img src="<?= $bg['url'] ?>" class="absolute inset-0 w-full h-full object-cover -z-10" alt=""></div>
            <div class="inner text-center flex flex-col justify-center items-center">
                <div class="main-logo text-center mb-12">
                    <?php if($main_logo) : ?>
                        <?= $main_logo ?>
                    <?php else : ?>
                        <img src="<?= $main['url'] ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="logos flex items-center gap-x-8">
                    <?php foreach($logos as $logo) : ?>
                        <div class="logo-wrapper" style="height: <?= $logo['logo']['height'] ?>px;">
                            <!-- <img src="<?= $logo['logo']['url'] ?>" class="w-full h-auto" alt=""> -->
                            <?= $logo['svg'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>