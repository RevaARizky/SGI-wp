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
$id = 'service-excellence-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-service-excellence text-sgi-dark-grey';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$title = get_field('title');
$services = get_field('services');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner">
        <div class="container">
            <div class="title-wrapper mb-16">
                <p class="text-title md:text-left text-center font-montserrat"><?= $title ?></p>
            </div>
            <div class="grid grid-cols-12 relative">
                <div class="md:col-span-6 col-span-12 order-1 md:order-0">
                    <div class="accordion-wrapper">
                        <?php foreach($services as $index => $service) : ?>
                            <div class="item relative py-4 [&:not(:first-child)]:border-t-[0.6px] border-b-[0.6px] border-r-[3px] border-y-sgi-dark-grey cursor-pointer overflow-x-hidden" data-index="<?= $index ?>">
                                <div class="arrow-wrapper absolute top-1/2 -translate-y-1/2">
                                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M-3.49691e-07 7L12 0.0717978L12 13.9282L-3.49691e-07 7Z" fill="#D75C00"/>
                                    </svg>
                                </div>
                                <div class="content-wrapper overflow-y-hidden">
                                    <div class="title-wrapper relative pl-16 text-sgi-dark-grey">
                                        <div class="counter-wrapper absolute left-0 top-0">
                                            <p class="counter text-subtitle font-bold font-montserrat">0<?= $index + 1 ?></p>
                                        </div>
                                        <p class="text-subtitle font-montserrat capitalize"><?= $service['title'] ?></p>
                                    </div>
                                    <div class="description-wrapper pl-16 pr-12">
                                        <p class="text-desc-small"><?= $service['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="md:col-span-6 order-0 md:order-1 col-span-12 md:pb-24 md:pl-24 md:pt-8 md:pr-8 relative">
                    <div class="inner flex items-center h-full pb-14 pt-8 md:py-0">
                        <div class="image-wrapper w-full pt-[100%] relative">
                            <?php foreach($services as $index => $service) : ?>
                                <img src="<?= $service['image']['url'] ?>" data-index="<?= $index ?>" class="image-target w-full h-full absolute inset-0 object-cover rounded-full" alt="">
                            <?php endforeach ?>
                            <div class="border-wrapper">
                                <!-- <svg viewBox="0 0 120 120" class="absolute top-1/2 left-1/2 -tranlate-x-1/2 -translate-y-1/2"><circle cx="55" cy="55" r="50" class="dashed w-[110%] h-[110%] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border-decoration" style="stroke-dasharray: 6, 9;fill: transparent;stroke: #fff;stroke-width: 1px;"></circle></svg>
                                <svg viewBox="0 0 120 120" class="absolute top-1/2 left-1/2 -tranlate-x-1/2 -translate-y-1/2"><circle cx="55" cy="55" r="50" class="dashed w-[125%] h-[125%] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border-decoration" style="stroke-dasharray: 6, 9;fill: transparent;stroke: #fff;stroke-width: 1px;"></circle></svg>
                                <svg viewBox="0 0 120 120" class="absolute top-1/2 left-1/2 -tranlate-x-1/2 -translate-y-1/2"><circle cx="55" cy="55" r="50" class="dashed w-[140%] h-[140%] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 border-decoration" style="stroke-dasharray: 6, 9;fill: transparent;stroke: #fff;stroke-width: 1px;"></circle></svg> -->
                                <div class="border-decoration absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110%] pt-[110%] rounded-full border border-dashed border-sgi-dark-grey z-10"></div>
                                <div class="border-decoration absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[125%] pt-[125%] rounded-full border border-dashed border-sgi-dark-grey z-10"></div>
                                <div class="border-decoration absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[140%] pt-[140%] rounded-full border border-dashed border-sgi-dark-grey z-10"></div>
                            </div>
                        </div>
                    </div>
                    <?php foreach($services as $index => $service) : ?>
                    <link rel="preload" as="image" href="<?= $service['image']['url'] ?>">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>