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
$id = 'scope-v3-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-scope-v3';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$title = get_field('title');
$scope = get_field('scope');

?>

<?php if($scope) : ?>   
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?>">
    <div class="container relative">
        <?php if($title) : ?>
            <div class="title-wrapper mb-16 text-white">
                <p class="text-4xl font-montserrat"><?= $title ?></p>
            </div>
        <?php endif; ?>
        <div class="slider-wrapper relative">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach($scope as $content) : ?>
                    <div class="swiper-slide !h-auto">
                        <div class="inner-slide flex items-center justify-center h-full w-full">
                            <div class="content-wrapper text-center text-white w-full h-full">
                                <div class="image-wrapper flex justify-center relative pt-[125%] w-full">
                                    <img src="<?= $content['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                </div>
                                <div class="text-wrapper absolute bottom-12 left-0 right-0 px-8 z-10">
                                    <p class="text-2xl font-montserrat text-white"><?= $content['text'] ?></p>
                                </div>
                                <div class="overlay-bg absolute top-[calc(100%-8rem)] bottom-0 w-full left-0 right-0"></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="custom-nav absolute -top-14 right-0 flex gap-x-5 -translate-y-1/2">
                <div class="prev-btn cursor-pointer">
                    <svg width="71" height="65" viewBox="0 0 71 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="69" height="63" rx="12.6" transform="matrix(-1 0 0 1 70 1)" stroke="white" stroke-width="0.4" stroke-linejoin="bevel"/>
                        <path d="M38.5 26.5L32.5 32.5L38.5 38.5" stroke="white" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="next-btn cursor-pointer">
                    <svg width="71" height="65" viewBox="0 0 71 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="69" height="63" rx="12.6" stroke="white" stroke-width="0.4" stroke-linejoin="bevel"/>
                        <path d="M32.5 26.5L38.5 32.5L32.5 38.5" stroke="white" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>