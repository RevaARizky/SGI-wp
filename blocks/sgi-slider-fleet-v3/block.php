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
// {py-1}

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-fleet-v3-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-slider-fleet-v3 bg-gray-theme text-sgi-dark-grey';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$title = get_field('title');
$fleets = get_field('fleet');
?>
<?php if($fleets) : ?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

    <div class="container">

        <div class="title-wrapper relative mb-6">
            <p class="text-subtitle calculate-width inline-block"><?= $title ?></p>

            <div class="custom-nav absolute top-1/2 calculate-target flex gap-x-4 -translate-y-1/2">
                <div class="prev-btn cursor-pointer">
                    <svg width="37" height="35" viewBox="0 0 67 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="65" height="63" rx="31.5" transform="matrix(-1 0 0 1 66 1)" stroke="#414A50" stroke-width="0.4" stroke-linejoin="bevel"></rect>
                        <path d="M36.5 26.5L30.5 32.5L36.5 38.5" stroke="#414A50" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="next-btn cursor-pointer">
                    <svg width="35" height="35" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="63" height="63" rx="31.5" stroke="#414A50" stroke-width="0.4" stroke-linejoin="bevel"></rect>
                        <path d="M29.5 26.5L35.5 32.5L29.5 38.5" stroke="#414A50" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($fleets as $index => $fleet) :  ?>
                    <div class="swiper-slide">
                        <div class="inner">
                            <div class="grid grid-cols-12 gap-x-14 items-center">
                                <div class="col-span-12 md:col-span-7">
                                    <div class="image-wrapper relative pt-[68%]">
                                        <img src="<?= $fleet['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                        <div class="title-wrapper absolute bottom-6 left-6 w-[166px]">
                                            <p class="text-title !text-white"><?= $fleet['title'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 md:col-span-5 specification-wrapper">
                                    <div class="text-wrapper text-sgi-dark-grey text-desc-small">
                                        <?= $fleet['spec'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- <div class="image-slider-wrapper swiper mb-10">
            <div class="swiper-wrapper">
                <?php foreach($fleets as $index=>$fleet) : ?>
                <div class="swiper-slide">
                    <div class="inner-slide px-24">
                        <div class="image-wrapper relative md:pt-[calc(100vh-200px)] pt-[100%]">
                            <img src="<?= $fleet['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                            <div class="title-image md:w-[200px] w-full absolute md:bottom-12 md:left-12 bottom-6 left-6">
                                <p class="text-hero text-white"><?= $fleet['title'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-y-8 md:gap-y-0 px-24">
            <div class="md:col-span-4 col-span-12">
                <div class="button-nav-wrapper flex gap-x-2 justify-center md:justify-start">
                    <div class="btn prev-btn cursor-pointer">
                        <img src="<?= assets_url('/dist/images/left-arrow.svg') ?>" class="w-[35px] h-[35px]" alt="">
                    </div>
                    <div class="btn next-btn cursor-pointer">
                        <img src="<?= assets_url('/dist/images/right-arrow.svg') ?>" class="w-[35px] h-[35px]" alt="">
                    </div>
                </div>
            </div>
            <div class="md:col-span-8 col-span-12">
                <div class="content-slider-wrapper swiper">
                    <div class="swiper-wrapper">
                        <?php foreach($fleets as $index=>$fleet) : ?>
                        <div class="swiper-slide !h-auto">

                            <div class="specification-wrapper text-sgi-dark-grey text-desc-small">
                                <?= $fleet['spec'] ?>
                            </div>


                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</section>
<?php endif; ?>