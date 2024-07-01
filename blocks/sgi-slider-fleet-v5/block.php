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
$id = 'slider-fleet-v5-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-slider-fleet-v5 bg-gray-theme text-white';
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
                        <rect width="65" height="63" rx="31.5" transform="matrix(-1 0 0 1 66 1)" stroke="#fff" stroke-width="0.4" stroke-linejoin="bevel"></rect>
                        <path d="M36.5 26.5L30.5 32.5L36.5 38.5" stroke="#fff" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="next-btn cursor-pointer">
                    <svg width="35" height="35" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1" y="1" width="63" height="63" rx="31.5" stroke="#fff" stroke-width="0.4" stroke-linejoin="bevel"></rect>
                        <path d="M29.5 26.5L35.5 32.5L29.5 38.5" stroke="#fff" stroke-width="2.15" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($fleets as $index => $fleet) :  ?>
                    <div class="swiper-slide">
                        <div class="inner fleet-parent" data-index="<?= $index ?>">
                            <div class="grid grid-cols-12 md:gap-x-14 items-center">
                                <div class="col-span-12 md:col-span-6">
                                    <div class="image-wrapper main-image-wrapper relative pt-[100%]">
                                        <img src="<?= $fleet['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover rounded-full" alt="">
                                    </div>
                                </div>
                                <div class="col-span-12 md:col-span-6 specification-wrapper">
                                    <!-- Mobile -->
                                    <div class="content-wrapper md:hidden block pb-12">
                                        <div class="title-wrapper text-center my-8">
                                            <p class="text-title text-sgi-orange"><?= $fleet['title'] ?></p>
                                        </div>
                                        <?php foreach($fleet['content'] as $index => $content) : ?>
                                            <div class="subtitle-wrapper text-center<?= $index ? "" : " mt-8 " ?> mb-6">
                                                <p class="font-medium uppercase">
                                                    <?= $content['title'] ?>
                                                </p>
                                            </div>
                                            <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                                                <?php foreach($content['item'] as $item) : ?>
                                                    <div class="content">
                                                        <div class="title mb-0.5">
                                                            <p><?= $item['title'] ?></p>
                                                        </div>
                                                        <div class="description">
                                                            <p class="font-bold"><?= $item['description'] ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php if(++$index != count($fleet['content'])) : ?>
                                                <div class="spacer border-sgi-orange mx-auto border-b mt-8 mb-6" style="width: 168px;"></div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- End mobile -->
                                    <!-- Desktop -->
                                    <div class="content-wrapper text-sgi-grey text-desc-small hidden md:block">
                                        <div class="title-wrapper mb-9">
                                            <p class="text-subtitle text-sgi-orange"><?= $fleet['title'] ?></p>
                                        </div>
                                        <div class="navigation-bar mb-9 pb-3 flex w-full justify-between relative">
                                            <?php foreach($fleet['content'] as $index => $content) : ?>
                                                <a href="#" class="font-medium uppercase nav<?= !$index ? ' active' : '' ?>" data-index="<?= $index ?>"><?= $content['title'] ?></a>
                                            <?php endforeach; ?>
                                            <div class="line-animation-bar"></div>
                                        </div>
                                        <?php foreach($fleet['content'] as $index => $content) : ?>
                                            <div class="inner navigation-target calculate-height" style="display: <?= !$index ? 'block' : 'hidden' ?>;" data-index="<?= $index ?>">
                                                <div class="description-wrapper grid grid-cols-2 gap-x-6 gap-y-7">
                                                    <?php foreach($content['item'] as $item) : ?>
                                                    <div class="content">
                                                        <div class="title mb-0.5">
                                                            <p><?= $item['title'] ?></p>
                                                        </div>
                                                        <div class="description">
                                                            <p class="font-bold"><?= $item['description'] ?></p>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

</section>
<?php endif; ?>