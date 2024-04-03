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
$id = 'slider-fleet' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-slider-fleet bg-gray-theme text-sgi-dark-grey';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$fleets = get_field('fleet');
?>
<?php if($fleets) : ?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

    <div class="container">

        <div class="image-slider-wrapper swiper mb-10 !overflow-visible">
            <div class="swiper-wrapper">
                <?php foreach($fleets as $index=>$fleet) : ?>
                <div class="swiper-slide">
                    <div class="image-wrapper relative md:pt-[calc(100vh-130px)] pt-[100%]">
                        <img src="<?= $fleet['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                        <div class="title-image w-[200px] absolute bottom-12 left-12">
                            <p class="text-5xl text-white"><?= $fleet['title'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="grid grid-cols-12">
            <div class="col-span-4">
                <div class="button-nav-wrapper flex gap-x-4">
                    <div class="btn prev-btn cursor-pointer">
                        <img src="<?= assets_url('/dist/images/left-arrow.svg') ?>" class="w-full" alt="">
                    </div>
                    <div class="btn next-btn cursor-pointer">
                        <img src="<?= assets_url('/dist/images/right-arrow.svg') ?>" class="w-full" alt="">
                    </div>
                </div>
            </div>
            <div class="col-span-8">
                <div class="content-slider-wrapper swiper">
                    <div class="swiper-wrapper">
                        <?php foreach($fleets as $index=>$fleet) : ?>
                        <div class="swiper-slide !h-auto">

                            <div class="specification-wrapper text-sgi-dark-grey">
                                <?= $fleet['spec'] ?>
                            </div>


                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery-slider-wrapper">
            <div class="swiper-wrapper">
                <?php foreach($fleets as $index=>$fleet) : ?>
                    <div class="swiper-slide">
                        <?php if($fleet['gallery']) : ?>
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-3 col-span-12 md:mb-20">
                                <div class="title-wrapper pr-[48px]">
                                    <div class="title text-5xl"><?= $fleet['title'] ?> Gallery</div>
                                </div>
                            </div>
                            <div class="md:col-span-9 col-span-12 md:mb-20 self-end">
                                <hr class="line"></hr>
                            </div>
                            <?php foreach($fleet['gallery'] as $gallery) : ?>
                                <?php if($gallery['type'] == 'full') : ?>
                                    <div class="col-span-12 md:mb-10">
                                        <div class="image-wrapper pt-[450px] relative">
                                            <img src="<?= $gallery['image_1']['url'] ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                                        </div>
                                    </div>
                                <?php elseif($gallery['type'] == 'left-bigger') : ?>
                                    <div class="md:col-span-8 col-span-12 md:mb-10 md:mr-10">
                                        <div class="image-wrapper pt-[450px] relative">
                                            <img src="<?= $gallery['image_1']['url'] ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                                        </div>
                                    </div>
                                    <div class="md:col-span-4 col-span-12">
                                        <div class="image-wrapper pt-[450px] relative">
                                            <img src="<?= $gallery['image_2']['url'] ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="md:col-span-4 col-span-12 md:mb-10 md:mr-10">
                                        <div class="image-wrapper pt-[450px] relative">
                                            <img src="<?= $gallery['image_1']['url'] ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                                        </div>
                                    </div>
                                    <div class="md:col-span-8 col-span-12">
                                        <div class="image-wrapper pt-[450px] relative">
                                            <img src="<?= $gallery['image_2']['url'] ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</section>
<?php endif; ?>