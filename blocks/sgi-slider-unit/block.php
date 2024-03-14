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
$id = 'slider-unit-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-slider-unit';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$contents = get_field('slider');
?>
<?php if(count($contents) > 1 ) : ?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner-animation">
        <div class="outer-wrapper slider-wrapper hover-target hover-target-image py-16 md:py-0" style="background-image: url('<?=  $contents[0]['image']['url'] ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">
            <div class="container md:pt-16 md:pb-24 md:flex md:flex-col justify-between md:min-h-screen">
                <div class="content-wrapper hidden md:block">
                    <div class="logo-wrapper mb-4">
                        <img src="<?= $contents[0]['logo']['url'] ?>" class="hover-target hover-target-logo h-24" alt="">
                    </div>
                    <div class="description-wrapper md:w-5/12 mb-7">
                        <p class="text-white md:text-lg text-xs leading-8 hover-target hover-target-description animate-text" data-text-type="lines"><?= $contents[0]['description'] ?></p>
                    </div>
                    <div class="button-wrapper">
                        <a href="<?= $contents[0]['button']['url'] ?>" class="px-9 bg-sgi-orange py-4 text-white inline-block hover-target hover-target-button button-link"><?= $contents[0]['button']['text'] ?></a>
                    </div>
                </div>
                <div class="spacer md:py-16"></div>
                <div class="slider flex flex-wrap md:flex-nowrap">
                    <?php $i = 0; ?>
                    <?php foreach($contents as $content) : $i++; ?>
                    <?php 
                    $itemClasses = '';
                    if($i == 1) {
                        $itemClasses = 'md:pr-5 active';
                    } elseif($i == count($contents)) {
                        $itemClasses = 'md:pl-5';
                    } else {
                        $itemClasses = 'md:px-5';
                    }
                    
                    ?>
                        <div class="item-wrapper cursor-pointer <?= $itemClasses ?>" data-index="<?= $i; ?>" data-content='<?= json_encode($content) ?>'>
                            <!-- <a href="<?= $content['button']['url'] ?>"> -->
                                <div class="title-wrapper md:py-3.5 pt-3 pb-1 relative inline-block md:block">
                                    <div class="top-line absolute w-full left-0 right-0" style="background-color: <?= $content['color_theme']; ?>;"></div>
                                    <p class="text-white md:text-2xl text-base"><?= $content['title'] ?></p>
                                </div>
                                <div class="logo-wrapper overflow-hidden md:hidden block">
                                    <img src="<?= $content['logo']['url'] ?>" class="mb-3 md:mb-0">
                                </div>
                                <div class="brief-wrapper hidden md:block">
                                    <p class="text-white text-lg text-animate"><?= $content['brief'] ?></p>
                                </div>
                                <div class="active-wrapper overflow-hidden md:hidden mb-4 md:mb-0">
                                    <div class="description-wrapper">
                                        <p class="text-white md:text-lg text-xs leading-8 hover-target hover-target-description"><?= $content['description'] ?></p>
                                    </div>
                                    <div class="button-wrapper">
                                        <a href="<?= $content['button']['url'] ?>" class="md:px-9 px-4 py-2 md:py-4 text-[8px] bg-sgi-orange text-white inline-block hover-target hover-target-button button-link"><?= $content['button']['text'] ?></a>
                                    </div>
                                </div>
                                <!-- </a> -->
                        </div>
                        <link rel="preload" as="image" href="<?= $content['image']['url'] ?>">
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

</section>

<?php endif; ?>