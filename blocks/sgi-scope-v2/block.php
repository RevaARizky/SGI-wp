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
$id = 'scope-v2-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-scope-v2';
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
                <p class="text-4xl"><?= $title ?></p>
            </div>
        <?php endif; ?>
        <div class="slider-wrapper relative">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach($scope as $content) : ?>
                    <div class="swiper-slide !h-auto">
                        <div class="inner-slide flex items-center justify-center h-full w-full bg-sgi-footer">
                            <div class="content-wrapper py-14 text-center text-white">
                                <div class="icon-wrapper mb-6 flex justify-center">
                                    <?= $content['icon'] ?>
                                </div>
                                <div class="text-wrapper">
                                    <?= $content['text'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="custom-nav absolute -top-14 right-0 flex gap-x-5 -translate-y-1/2">
                <div class="prev-btn cursor-pointer">
                    <svg width="62" height="66" viewBox="0 0 62 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M61.5 32.5496C61.5 14.8256 47.822 0.499614 31 0.499616C14.178 0.499617 0.499996 14.8256 0.499997 32.5496C0.499999 50.2736 14.178 64.5996 31 64.5996C47.822 64.5996 61.5 50.2736 61.5 32.5496Z" stroke="white"/>
                        <path d="M22.6523 32.5488L41.7293 32.5488" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M29.8071 40.0605L21.6968 33.0618C21.6227 32.9978 21.5633 32.919 21.5226 32.8306C21.482 32.7423 21.4609 32.6466 21.4609 32.5497C21.4609 32.4528 21.482 32.357 21.5226 32.2687C21.5633 32.1804 21.6227 32.1016 21.6968 32.0375L29.8071 25.0375" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="next-btn cursor-pointer">
                    <svg width="62" height="66" viewBox="0 0 62 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.50001 32.5496C0.500012 14.8256 14.178 0.499614 31 0.499616C47.822 0.499617 61.5 14.8256 61.5 32.5496C61.5 50.2736 47.822 64.5996 31 64.5996C14.178 64.5996 0.500009 50.2736 0.50001 32.5496Z" stroke="white"/>
                        <path d="M39.3477 32.5488L20.2707 32.5488" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M32.1929 40.0605L40.3032 33.0618C40.3773 32.9978 40.4367 32.919 40.4774 32.8306C40.518 32.7423 40.5391 32.6466 40.5391 32.5497C40.5391 32.4528 40.518 32.357 40.4774 32.2687C40.4367 32.1804 40.3773 32.1016 40.3032 32.0375L32.1929 25.0375" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>