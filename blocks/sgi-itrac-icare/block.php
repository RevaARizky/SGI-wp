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
$id = 'itrac-icare-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-itrac-icare text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$itrac = get_field('itrac');
$icare = get_field('icare');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner md:h-[75vh] flex justify-center items-center relative itrac">
        <div class="bg-overlay">
            <img src="<?= $itrac['bg_image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
        </div>
        <div class="inner text-center flex flex-col justify-center items-center relative py-14 md:py-0">
            <div class="main-logo text-center mb-12">
                <img src="<?= $itrac['main_logo']['url'] ?>" alt="">
            </div>
            <div class="logos flex items-center gap-x-8 md:flex-row flex-col gap-y-4 md:gap-y-0">
                <?php foreach($itrac['logos'] as $index => $content) : ?>
                <div class="logo-wrapper" style="height: px;">
                    <?= $content['logo'] ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="inner md:h-[75vh] flex justify-center items-center relative icare">
        <div class="bg-overlay">
            <img src="<?= $icare['bg_image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
        </div>
        <div class="container">
            <div class="inner text-center grid grid-cols-12 justify-center items-center gap-y-12 md:gap-y-0 py-14 md:py-0">
                <?php foreach($icare['logos'] as $index => $logo) : ?>
                <div class="item md:col-span-4 col-span-12 relative px-6 h-full justify-center flex flex-col">
                    <div class="logo-wrapper mb-10 text-center flex items-center">
                        <?= $logo['logo'] ?>
                    </div>
                    <div class="text-wrapper">
                        <p class="text-desc-small"><?= $logo['description'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    
</section>