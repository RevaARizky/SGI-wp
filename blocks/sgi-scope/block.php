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
$id = 'scope-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-scope';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$title = get_field('title');
$bg = get_field('bg');
$scope = get_field('scope');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($classes); ?>">
    <div class="inner-wrapper py-32 relative">
        <div class="bg-wrapper">
            <img src="<?= $bg['url'] ?>" class="absolute inset-0 object-cover w-full h-full" alt="">
        </div>
        <div class="grid grid-cols-12 relative z-10">
            <div class="md:col-span-6 md:col-start-6 bg-white py-8 px-6">
                <div class="title-wrapper mb-8">
                    <h4 class="text-4xl"><?= $title ?></h4>
                </div>
                <div class="content-wrapper">
                    <?php foreach($scope as $content) : ?>
                        <div class="text-wrapper flex items-center gap-x-4 [&:not(:last-child)]:mb-6">
                            <div class="icon">
                                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.23276 10.4569C8.93281 10.7426 8.92123 11.2173 9.2069 11.5172C9.49256 11.8172 9.96729 11.8288 10.2672 11.5431L9.23276 10.4569ZM15.5172 6.5431C15.8172 6.25744 15.8288 5.78271 15.5431 5.48276C15.2574 5.18281 14.7827 5.17123 14.4828 5.4569L15.5172 6.5431ZM14.4828 6.5431C14.7827 6.82877 15.2574 6.81719 15.5431 6.51724C15.8288 6.21729 15.8172 5.74256 15.5172 5.4569L14.4828 6.5431ZM10.2672 0.456897C9.96729 0.171232 9.49256 0.182811 9.2069 0.482759C8.92123 0.782706 8.93281 1.25744 9.23276 1.5431L10.2672 0.456897ZM15 6.75C15.4142 6.75 15.75 6.41421 15.75 6C15.75 5.58579 15.4142 5.25 15 5.25V6.75ZM1 5.25C0.585787 5.25 0.25 5.58579 0.25 6C0.25 6.41421 0.585787 6.75 1 6.75V5.25ZM10.2672 11.5431L15.5172 6.5431L14.4828 5.4569L9.23276 10.4569L10.2672 11.5431ZM15.5172 5.4569L10.2672 0.456897L9.23276 1.5431L14.4828 6.5431L15.5172 5.4569ZM15 5.25L1 5.25V6.75L15 6.75V5.25Z" fill="#D75C00"/>
                                </svg>
                            </div>
                            <p><?= $content['text'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="border-b border-white md:py-16"></div>
    </div>

</section>