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
$id = 'image-title-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-title';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$content = get_field('content');

?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?> <?= $space ?>">
    <div class="container">
        <div class="grid grid-cols-12 gap-y-14">
            <?php foreach($content as $index => $data) : ?>
                <div class="md:col-span-4 col-span-12">
                    <div class="content-wrapper<?= $data['description'] ? ' has-desc' : '' ?>">
                        <div class="title-wrapper pb-8 pl-5 border-l border-l-sgi-orange">
                            <p class="text-subtitle font-montserrat text-sgi-dark-grey"><?= $data['title'] ?></p>
                        </div>
                        <div class="image-wrapper pt-[77%] w-full relative overflow-y-hidden">
                            <img src="<?= $data['image']['url'] ?>" class="absolute inset-0 object-cover w-full h-full" alt="">
                            <?php if($data['description']) : ?>
                            <div class="overlay-bg absolute inset-0"></div>
                            <div class="description-wrapper absolute left-0 right-0 px-8">
                                <p class="text-desc-small text-white"><?= $data['description'] ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>