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
$id = 'about-team-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-about-team bg-gray-theme text-white no-anim z-10';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$teams = get_field('teams');
$title = get_field('title');
$subtitle = get_field('subtitle');
?>

<style>
    .block-about-team {
        z-index: 10!important;
    }
</style>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

    <div class="container">
        <div class="grid grid-cols-12 md:mb-28">
            <div class="md:col-span-6 col-span-12">
                <div class="section-title">
                    <p class="text-5xl font-montserrat tracking-wide"><?= $title ?></p>
                </div>
            </div>
            <div class="md:col-span-6 col-span-12">
                <div class="section-subtitle">
                    <p class="text-lg tracking-wide"><?= $subtitle ?></p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-12 overlay-wrapper">

            <div class="md:col-span-5 col-span-12">
                <div class="team-box-wrapper">
                    <?php foreach($teams as $index=>$team) : ?>
                        
                        <div class="team-wrapper py-10" data-index="<?= $index ?>">
                            <div class="team-wrapper-inner pb-5 flex justify-between relative">
                                <div class="col-span-1 team-name">
                                    <p class="text-2xl font-bold"><?= $team['name'] ?></p>
                                </div>
                                <div class="col-span-1 team-position">
                                    <p class="text-lg"><?= $team['position'] ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

            <div class="md:col-span-5 md:col-start-8 col-span-12">
                <div class="image-box-wrapper">
                    <?php foreach($teams as $index=>$team) : ?>
                        <div class="image-wrapper fixed top-0" data-index="<?= $index ?>">
                            <img src="<?= $team['image']['url'] ?>" class="w-full" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

    </div>

</section>