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
$id = 'about-section-' . $block['id'];
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
$subtitle = get_field('subtitle');
$icon = get_field('icon');
$svg = get_field('svg');
$description = get_field('description');
$descriptionSize = get_field('description_size');
$isAnimate = get_field('animate');
$center = get_field('text_center');
$cta = get_field('cta');
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
                <?php if($subtitle) : ?>
                <div class="subtitle-wrapper mb-5">
                    <h5 class="text-title text-white font-sans animate-text" data-text-type="lines"><?= $subtitle ?></h5>
                </div>
                <?php endif; ?>
                <?php if($description) : ?>
                <div class="description-wrapper">
                    <?php if($descriptionSize) : ?>
                        <p class="text-white md:leading-relaxed leading-relaxed tracking-wide font-light<?= $isAnimate ? ' animate-text' : '' ?>" data-text-type="lines" style="font-size: <?= $descriptionSize ?>px!important;"><?= $description ?></p>
                    <?php else : ?>
                        <p class="text-white text-desc-big md:leading-relaxed leading-relaxed tracking-wide font-light<?= $isAnimate ? ' animate-text' : '' ?>" data-text-type="lines"><?= $description ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if($cta) : ?>
                <div class="button-wrapper mt-9">
                    <a href="<?= $cta['url'] ?>" class="md:px-8 px-4 md:py-4 py-2 bg-sgi-orange md:text-xs text-[12px] text-white"><?= $cta['title'] ?></a>
                </div>
                <?php endif; ?>
            </div>
    
        </div>
    </div>

</section>