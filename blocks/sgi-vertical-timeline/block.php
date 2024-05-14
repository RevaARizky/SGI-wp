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
 * 
 * 
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'vertical-timeline-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-vertical-timeline';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$content = get_field('content');

?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?>">
    <div class="container">
        <div class="inner relative">
            <div class="vertical-line absolute md:left-1/2 md:right-unset right-0 left-unset top-0 bottom-0 -translate-x-1/2 w-1"></div>
            <div class="vertical-line-progress absolute md:left-1/2 right-0 md:right-unset top-0 -translate-x-1/2 w-1"></div>
            <?php foreach($content as $index => $data) : ?>
                <div class="grid grid-cols-12 relative">
                    <div class="vertical-item md:relative flex py-6 col-span-10 md:col-span-6<?= $index % 2 ? " md:col-start-7 item-right md:justify-end" : " item-left md:justify-start" ?>">
                        <?php if($data['additional']) : ?>
                        <div class="additional-wrapper absolute text-center hidden md:block">
                            <p class="font-bold text-desc-small text-white"><?= $data['additional'] ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="text-wrapper <?= $data['additional'] ? 'item-trigger ' : '' ?>p-8 bg-sgi-shade text-white md:w-3/4">
                            <div class="inner overflow-y-hidden">
                                <?php if($data['additional']) : ?>
                                    <p class="text-title font-montserrat text-white mb-4 block md:hidden"><?= $data['additional'] ?></p>
                                <?php endif; ?>
                                <p class="text-desc-small font-montserrat text-white"><?= $data['text'] ?></p>
                                <?php if($data['more_text']) : ?>
                                    <div class="more-text-wrapper" style="height: 0;">
                                        <p class="text-desc-small font-montserrat text-white"><?= $data['more_text'] ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="icon h-[70px] w-[70px] justify-center items-center flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="31" viewBox="0 0 22 31" fill="none">
                                <path d="M3.9376 23.8296C3.36149 24.0939 2.63176 24.0561 2.24768 23.6785C1.8252 23.3009 1.97883 22.8099 2.43972 22.47C16.0743 12.0092 20.2607 0 20.2607 0C22.4499 5.32483 26.4058 14.0863 3.9376 23.8296Z" fill="white"/>
                                <path d="M3.43988 27.9942C2.8472 28.0334 2.25453 27.8766 2.04535 27.4063C1.87103 26.9359 2.21966 26.5048 2.74261 26.2696C10.6915 22.977 14.5264 20.8996 20 16C18.5706 24.7801 8.73912 27.7982 3.43988 27.9942Z" fill="white"/>
                                <path d="M1.12563 30.819C0.527637 30.762 0 30.5343 0 30.1641C0 29.7939 0.492461 29.5092 1.12563 29.5092C6.68342 29.4522 10.9749 28.8258 14 28C11.2915 30.0502 8.51256 31.5309 1.12563 30.819Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>