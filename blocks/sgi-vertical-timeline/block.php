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
    <div class="container relative">
        <div class="vertical-line absolute left-1/2 top-0 bottom-0 -translate-x-1/2 w-1"></div>
        <div class="vertical-line-progress absolute left-1/2 top-0 -translate-x-1/2 w-1"></div>
        <?php foreach($content as $index => $data) : ?>
            <div class="grid grid-cols-12">
                <div class="vertical-item flex py-6 col-span-6<?= $index % 2 ? " col-start-7 item-right justify-end" : " item-left justify-start" ?>">
                    <?php if($data['additional']) : ?>
                    <div class="additional-wrapper absolute text-center text-white">
                        <p class="font-bold text-lg"><?= $data['additional'] ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="text-wrapper <?= $data['additional'] ? 'item-trigger ' : '' ?>p-8 bg-sgi-footer text-white w-3/4">
                        <div class="inner overflow-y-hidden">
                            <p class="text-lg font-montserrat text-white"><?= $data['text'] ?></p>
                            <?php if($data['more_text']) : ?>
                                <div class="more-text-wrapper" style="height: 0;">
                                    <p class="text-lg font-montserrat text-white"><?= $data['more_text'] ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>