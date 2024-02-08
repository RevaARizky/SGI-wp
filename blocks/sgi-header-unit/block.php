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
$id = 'header-section';
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-header-unit';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$bgImage = get_field('bg_image');
$title = get_field('title');
$logo = get_field('logo');
?>
<?php if($logo) : ?>
<!-- Overide default header behavior -->
<style>
    header#header .logo-wrapper {
        visibility: hidden!important;
    }
</style>
<?php endif; ?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

    <div class="outer-wrapper relative md:h-screen py-60 md:py-0 w-full parallax-bg" style="background-image: url(<?= $bgImage['url'] ?>); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
        <div class="text-wrapper absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            <h3 class="text-hero text-gray-shade font-montserrat text-center animate-text animate-scroll-text" data-text-type="lines"><?= $title ?></h3>
        </div>
        <div class="scroll-wrapper absolute left-1/2 -translate-x-1/2 bottom-8">
            <a href="#" class="relative scroll-trigger">
                <img src="<?= assets_url('/dist/images/scroll.png') ?>" width="80" alt="" class="loop-infinite">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" width="15" height="21" viewBox="0 0 15 21" fill="none">
                    <path d="M14.8718 13.1071C15.0479 12.9223 15.0407 12.6297 14.8559 12.4537C14.6711 12.2777 14.3785 12.2848 14.2025 12.4697L14.8718 13.1071ZM7.65436 19.3452C7.47834 19.53 7.48547 19.8226 7.6703 19.9986C7.85513 20.1746 8.14765 20.1675 8.32368 19.9827L7.65436 19.3452ZM7.65392 19.9827C7.82995 20.1676 8.12248 20.1747 8.3073 19.9987C8.49213 19.8226 8.49927 19.5301 8.32324 19.3453L7.65392 19.9827ZM1.77509 12.4697C1.59906 12.2849 1.30653 12.2778 1.12171 12.4538C0.936881 12.6298 0.929746 12.9223 1.10577 13.1072L1.77509 12.4697ZM7.52665 19.6639C7.52665 19.9192 7.73356 20.1261 7.9888 20.1261C8.24404 20.1261 8.45095 19.9192 8.45095 19.6639H7.52665ZM8.45095 1.32911C8.45095 1.07388 8.24404 0.866966 7.9888 0.866966C7.73356 0.866966 7.52665 1.07388 7.52665 1.32911H8.45095ZM14.2025 12.4697L7.65436 19.3452L8.32368 19.9827L14.8718 13.1071L14.2025 12.4697ZM8.32324 19.3453L1.77509 12.4697L1.10577 13.1072L7.65392 19.9827L8.32324 19.3453ZM8.45095 19.6639V1.32911H7.52665L7.52665 19.6639H8.45095Z" fill="white"/>
                </svg>
            </a>
        </div>

        <div class="logo-wrapper absolute top-[50px] md:top-[60px] left-1/2 -translate-x-1/2 z-40 -translate-y-1/2">
            <a href="/sgi">
                <img src="<?= $logo['url'] ?>" class="w-24 md:w-44 lg:w-56" class="" alt="">
            </a>
        </div>
        
    </div>

</section>