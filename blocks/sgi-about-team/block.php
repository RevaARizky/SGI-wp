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
$id = 'about-team-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-about-team bg-sgi-secondary text-white z-10';
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
    <div class="inner bg-sgi-secondary">
        <div class="container">
            <div class="grid grid-cols-12 md:mb-28">
                <div class="md:col-span-6 col-span-12">
                    <div class="section-title">
                        <p class="text-title text-white font-montserrat tracking-wide"><?= $title ?></p>
                    </div>
                </div>
                <div class="md:col-span-6 col-span-12">
                    <div class="section-subtitle">
                        <p class="text-desc-small text-white tracking-wide"><?= $subtitle ?></p>
                    </div>
                </div>
            </div>
    
            <div class="grid grid-cols-12 overlay-wrapper">
    
                <div class="md:col-span-5 col-span-12">
                    <div class="team-box-wrapper">
                        <?php foreach($teams as $index=>$team) : ?>
                            
                            <div class="team-wrapper py-10" data-index="<?= $index ?>">
                                <div class="team-wrapper-inner pb-5 relative">
                                    <div class="inner flex justify-between relative items-center">
                                        <div class="col-span-2 team-name">
                                            <p class="text-subtitle"><?= $team['name'] ?></p>
                                        </div>
                                        <div class="col-span-1 team-position text-end">
                                            <p class="text-desc-small text-white"><?= $team['position'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-span-3 team-description overflow-hidden" style="height: 0;">
                                    <?php if($team['social_media']['linkedin_url']) : ?>
                                        <div class="social pt-4">
                                            <a href="<?= $team['social_media']['linkedin_url'] ?>" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#d75c00" class="w-[1.5rem] h-[1.5rem]"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path></svg>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                        
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
                        <?php foreach($teams as $index=>$team) : ?>
                            <div class="image-wrapper fixed top-0" style="width: inherit;" data-index="<?= $index ?>">
                                <div class="inner relative w-full pt-[100%]">
                                    <img src="<?= $team['image']['url'] ?>" class="absolute inset-0 w-1/2 h-1/2 rounded-full object-cover" alt="">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
    
            </div>
    
        </div>
    </div>

</section>