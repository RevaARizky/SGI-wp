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
$id = 'button-hover-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-button-hover text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$title = get_field('title');
$titlePosition = get_field('title_position');

$buttons = get_field('buttons');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="container">
        <div class="content-wrapper border-b border-white md:pb-32">
            <div class="title-wrapper mb-16">
                <p class="text-4xl font-montserrat">Scope of SGI operations</p>
            </div>
            <div class="flex">
                <div class="box text-center px-10 py-5 border border-white border-solid grow">
                    <p>Geo/Magno/Spectro Mapping<br />and Seismic Surveys</p>
                </div>
                <div class="box text-center px-10 py-5 border border-white border-solid grow">
                    <p>Mineral Exploration<br />and Sampling</p>
                </div>
                <div class="box text-center px-10 py-5 border border-white border-solid grow">
                    <p>Equipment Transportation<br />and Recovery</p>
                </div>
                <div class="box text-center px-10 py-5 border border-white border-solid grow">
                    <p>Urgent Freight and<br />Equipment Transfers</p>
                </div>
            </div>
            <div class="flex">
                <div class="box text-center px-10 py-5 border border-t-0 border-white border-solid grow">
                    <p>Construction</p>
                </div>
                <div class="box text-center px-10 py-5 border border-t-0 border-white border-solid grow">
                    <p>Crew and Equipment Ferrying to remote or inaccessible areas</p>
                </div>
                <div class="box text-center px-10 py-5 border border-t-0 border-white border-solid grow">
                    <p>Tourism, Photography & Filming</p>
                </div>
            </div>
        </div>
    </div>
</section>