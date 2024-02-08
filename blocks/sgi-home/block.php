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
$id = 'home-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-home';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$units = get_field('units');
?>
<?php if($units) : ?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="grid grid-cols-12 relative h-screen md:h-auto">
        <?php foreach($units as $i => $unit) : ?>
            <div class="col-span-12 md:col-span-3 unit-wrapper md:relative absolute inset-0 md:inset-auto md:h-screen h-screen after-opacity overflow-hidden<?= $unit['coming_soon'] ? '' : ' cursor-pointer' ?><?= $i == 0 ? ' mobile-active' : '' ?>" data-index="<?= $i ?>">
                <a href="<?= $unit['coming_soon'] ? '#' : $unit['url'] ?>" class="delay-link w-full h-full inline-block">
                    <div class="image-wrapper">
                        <img src="<?= $unit['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="<?= $unit['image']['alt'] ?>" />
                    </div>
                    <div class="logo-wrapper absolute md:bottom-16 bottom-1/2 z-10 left-1/2 flex flex-col gap-y-4 md:block pointer-events-none">
                        <img src="<?= $unit['logo']['url'] ?>" alt="<?= $unit['logo']['alt'] ?>" class="mb-8 md:mb-0 md:max-w-[120%]">
                        <a href="<?= $unit['url'] ?>" class="button-link text-white px-4 py-2 bg-sgi-orange inline-block md:hidden text-center">Learn More</a>
                    </div>
                    <?php if($unit['coming_soon']) : ?>
                    <div class="coming-soon-wrapper absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-40 pointer-events-none">
                        <p class="text-white text-2xl">Coming Soon</p>
                    </div>
                    <?php endif; ?>
                    <div class="animation-line anim-hover-line"></div>
                    <div class="animation-line anim-init-line"></div>
                    <div class="animation-line anim-delay-line"></div>
                </a>
            </div>
        <?php endforeach; ?>
        <div class="nav-mobile flex md:hidden flex-col absolute bottom-8 gap-y-6 left-1/2 -translate-x-1/2 z-30">
            <?php foreach($units as $index => $unit) : ?>
            <div class="nav-wrapper translate-y-12 opacity-0 text-center<?= $index == 0 ? ' active' : '' ?>" data-target="<?= $index ?>">
                <span class="text-white text-base font-montserrat relative"><?= $unit['title']; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>