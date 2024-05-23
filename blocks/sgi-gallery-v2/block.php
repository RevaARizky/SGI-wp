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

// {md:col-span-12, md:col-span-6, md:col-span-4, md:col-span-3}

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
                                $colSpan = array('md:col-span-8', 'md:col-span-4');
                                break;
                                
                            case 'right':
                                $colSpan = array('md:col-span-4', 'md:col-span-8');
                                break;
                            
                            case 'equal':
                                $colSpan = array('md:col-span-6', 'md:col-span-6');
                                break;
                        }
                    }
                    ?>
                    <?php foreach($row['media'] as $index => $media) : ?>
                        <div class="item col-span-12 <?= $colSpan ? $colSpan[$index] : 'md:col-span-' . 12 / count($row['media']) ?>">
                            <div class="media-wrapper relative md:pt-[600px] pt-[400px] mb-5 <?= $media['file']['type'] == 'image' ? '' : 'cursor-pointer video' ?>">
                                <?php if($media['file']['type'] == 'image') : ?>
                                    <img src="<?= $media['file']['url'] ?>" class="<?= $mediaClasses ?>" alt="">
                                <?php else : ?>
                                    <video autoplay muted loop src="<?= $media['file']['url'] ?>" class="<?= $mediaClasses ?>"></video>
                                <div class="icon-volume absolute left-8 w-[40px] h-[40px] flex justify-center items-center bg-sgi-primary rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#d05900" class="volume-off" viewBox="0 0 576 512"><path d="M301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3zM425 167l55 55 55-55c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-55 55 55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-55-55-55 55c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l55-55-55-55c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#d05900" class="volume-on" style="display: none;" viewBox="0 0 640 512"><path d="M533.6 32.5C598.5 85.2 640 165.8 640 256s-41.5 170.7-106.4 223.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C557.5 398.2 592 331.2 592 256s-34.5-142.2-88.7-186.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zM473.1 107c43.2 35.2 70.9 88.9 70.9 149s-27.7 113.8-70.9 149c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C475.3 341.3 496 301.1 496 256s-20.7-85.3-53.2-111.8c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zm-60.5 74.5C434.1 199.1 448 225.9 448 256s-13.9 56.9-35.4 74.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C393.1 284.4 400 271 400 256s-6.9-28.4-17.7-37.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zM301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3z"/></svg>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>