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
$id = 'about-team-v2-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-about-team-v2 bg-sgi-white-shade text-sgi-dark-grey no-anim z-10';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$teams = get_field('teams');
$title = get_field('title');
$subtitle = get_field('subtitle');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner bg-white-shade">
        <div class="container">
            <div class="grid grid-cols-12 mb-6">
                <div class="md:col-span-6 col-span-12">
                    <div class="section-title">
                        <p class="text-title font-montserrat tracking-wide"><?= $title ?></p>
                    </div>
                </div>
                <div class="md:col-span-6 col-span-12">
                    <div class="section-subtitle">
                        <p class="text-desc-small tracking-wide"><?= $subtitle ?></p>
                    </div>
                </div>
            </div>
    
            <div class="grid grid-cols-12 overlay-wrapper">
    
                <div class="md:col-span-5 col-span-12">
                    <div class="team-box-wrapper">
                        <?php foreach($teams as $index=>$team) : ?>
                            
                            <div class="team-wrapper py-4" data-index="<?= $index ?>">
                                <div class="team-wrapper-inner pb-2 flex justify-between relative">
                                    <div class="col-span-1 team-name">
                                        <p class="text-subtitle"><?= $team['name'] ?></p>
                                    </div>
                                    <div class="col-span-1 team-position">
                                        <p class="text-desc-small"><?= $team['position'] ?></p>
                                    </div>
                                </div>
                                <div class="image-mobile-wrapper block md:hidden">
                                    <img src="<?= $team['image']['url'] ?>" class="w-full" alt="">
                                </div>
                            </div>
    
                        <?php endforeach; ?>
                    </div>
                </div>
    
                <div class="md:col-span-5 md:col-start-8 col-span-12 md:block hidden">
                    <div class="image-box-wrapper">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php foreach($teams as $index=>$team) : ?>
                                    <div class="swiper-slide">
                                        <div class="image-wrapper relative w-full pt-[100%]" data-index="<?= $index ?>">
                                            <img src="<?= $team['image']['url'] ?>" class="absolute inset-0 w-3/4 h-3/4 rounded-full object-cover" alt="">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </div>
    </div>

</section>