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

// {col-span-12, col-span-6, col-span-4, col-span-3}

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-v2-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-gallery-v2 text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$rows = get_field('row');

$mediaClasses = 'absolute inset-0 w-full h-full object-cover';
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

    <div class="outer-wrapper relative">
        <div class="container">
            <?php foreach($rows as $index=>$row) : ?>
                <div class="grid grid-cols-12 md:gap-x-5">
                    <?php 
                    $colSpan = false;
                    if(count($row['media']) == 2) {
                        switch ($row['file_width']) {
                            case 'left':
                                $colSpan = array('col-span-8', 'col-span-4');
                                break;
                                
                            case 'right':
                                $colSpan = array('col-span-4', 'col-span-8');
                                break;
                            
                            case 'equal':
                                $colSpan = array('col-span-6', 'col-span-6');
                                break;
                        }
                    }
                    ?>
                    <?php foreach($row['media'] as $index => $media) : ?>
                        <div class="item <?= $colSpan ? $colSpan[$index] : 'col-span-' . 12 / count($row['media']) ?>">
                            <div class="media-wrapper relative md:pt-[600px] pt-[400px] mb-5">
                                <?php if($media['file']['type'] == 'image') : ?>
                                    <img src="<?= $media['file']['url'] ?>" class="<?= $mediaClasses ?>" alt="">
                                <?php else : ?>
                                    <video autoplay muted loop src="<?= $media['file']['url'] ?>" class="<?= $mediaClasses ?>"></video>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>