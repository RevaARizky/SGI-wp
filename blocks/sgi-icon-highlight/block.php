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
$useFooter = get_field('use_footer');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner<?= $useFooter ? ' bg-sgi-secondary' : '' ?>" style="background-image: url(<?= $bg['url'] ?>);">
        <div class="container">
            <div class="md:py-32 py-16 md:px-14 content-center">
                <div class="inner grid grid-cols-12 relative md:gap-x-24 gap-y-12">
                    <?php foreach($contents as $content) : ?>
                        <div class="item md:col-span-3 col-span-12 text-center relative z-10 px-7">
                            <div class="icon-wrapper md:mb-8 mb-4 text-center relative">
                                <img src="<?= $content['icon']['url'] ?>" class="md:w-full w-3/4 mx-auto h-auto" alt="">
                            </div>
                            <div class="title-wrapper md:mb-4 mb-2">
                                <p class="text-sgi-orange text-subtitle font-montserrat"><?= $content['title'] ?></p>
                            </div>
                            <div class="description-wrapper">
                                <p class="text-white capitalize text-desc-small"><?= $content['description'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="line absolute left-[34px] right-[34px] top-[82px] h-[0.6px] bg-sgi-orange md:block hidden"></div>
                </div>
            </div>
        </div>
    </div>
</section>