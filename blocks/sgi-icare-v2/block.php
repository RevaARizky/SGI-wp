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
$id = 'icare-v2-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-icare-v2';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$content = get_field('content');
$bg = get_field('bg');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?>">
    <div class="inner text-white">
        <div class="md:py-36 relative z-10">
            <div class="bg-overlay"><img src="<?= $bg['url'] ?>" class="absolute inset-0 w-full h-full object-cover -z-10" alt=""></div>
            <div class="container">
                <div class="inner text-center grid grid-cols-12 justify-center items-center">
                    <?php foreach($content as $data) : ?>
                        <div class="item col-span-4 relative px-6 h-full justify-center flex flex-col">
                            <div class="logo-wrapper mb-10 text-center flex items-center">
                                <?php if($data['icon']) : ?>
                                    <?= $data['icon'] ?>
                                <?php else : ?>
                                <img src="<?= $data['image']['url'] ?>" class="w-3/5 object-cover mx-auto" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="text-wrapper">
                                <p class="text-lg"><?= $data['description'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>