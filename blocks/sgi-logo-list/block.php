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
$id = 'logo-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-logo-list no-anim';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$logos = get_field('logos');
?>
<?php if($logos) : ?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="container">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($logos as $index=>$logo) : ?>
                <div class="swiper-slide !h-auto">
                    <div class="logo-wrapper h-full flex items-center">
                        <img src="<?= $logo['image']['url'] ?>" class="w-full h-auto object-cover" alt="">
                    </div>
                </div>
                <?php endforeach; ?>
                <?php foreach($logos as $index=>$logo) : ?>
                <div class="swiper-slide !h-auto">
                    <div class="logo-wrapper h-full flex items-center">
                        <img src="<?= $logo['image']['url'] ?>" class="w-full h-auto object-cover" alt="">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- <?php foreach($logos as $index => $logo) : ?>
            <div class="col-span-1">
                <div class="logo-wrapper">
                    <img src="<?= $logo['image']['url'] ?>" class="w-full h-auto object-cover" alt="">
                </div>
            </div>
        <?php endforeach; ?> -->
    </div>
</section>
<?php endif; ?>