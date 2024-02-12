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
$id = 'our-fleet-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-our-fleet bg-gray-theme';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$subtitle = get_field('subtitle');
$title = get_field('title');
$slides = get_field('slides');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner-animation">
        <div class="container relative md:mb-16 overflow-hidden pt-12 md:pt-0">
    
            <div class="text-wrapper lg:absolute lg:top-16 lg:left-[3.75rem]">
                <div class="subtitle-wrapper mb-4">
                    <p class="md:text-lg text-xs text-white"><?= $subtitle ?></p>
                </div>
                <div class="title-wrapper">
                    <p class="font-montserrat text-white md:text-5xl text-lg tracking-wide leading-normal"><?= $title ?></p>
                </div>
            </div>
    
            <div class="content-wrapper flex md:flex-nowrap flex-wrap justify-center items-center border-b border-white pb-12 md:pt-24 md:pb-24">
        
                <div class="slider-outer w-full relative">
                    <div class="slider-wrapper fleet-slider md:mb-16 mb-8">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                        <?php foreach($slides as $slide) : ?>
                            <div class="swiper-slide">
                                <div class="image-wrapper">
                                    <img src="<?= $slide['image']['url'] ?>" class="object-cover mx-auto" alt="">
                                </div>
                            </div>
                        <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
            
                    <div class="fleet-options flex justify-center items-center md:gap-x-14 gap-x-8 md:gap-y-0 gap-y-4 md:flex-nowrap flex-wrap relative z-40">
                        <?php $i = 0 ?>
                        <?php foreach($slides as $slide) : $i++ ?>
                            <div class="item cursor-pointer md:px-5 px-2 md:py-2 py-3 rounded-2xl md:rounded-3xl<?= $i == 1 ? ' active' : '' ?>" data-index="<?= $i ?>">
                                <p class="text-[10px] md:text-sm<?= $i == 1 ? ' active' : '' ?>"><?= $slide['title'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="circle-decoration-wrapper">
                        <div class="circle-decoration pointer-events-none opacity-40 w-[156px] md:w-[25vh] h-[156px]  md:h-[25vh] border-[0.4px] border-white rounded-full absolute top-[35%] md:top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
                        <div class="circle-decoration pointer-events-none opacity-40 w-[230px] md:w-[50vh] h-[230px] md:h-[50vh] border-[0.4px] border-white rounded-full absolute top-[35%] md:top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
                        <div class="circle-decoration pointer-events-none opacity-40 w-[313px] md:w-[75vh] h-[313px] md:h-[75vh] border-[0.4px] border-white rounded-full absolute top-[35%] md:top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
                    </div>
                </div>
        
        
    
            </div>
    
            
        </div>
    </div>

</section>