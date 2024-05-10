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
$useGlobal = get_field('use_global_options');
$option = false;
if($useGlobal) {
    $option = 'option';
}

$contents = get_field('slider', $option);
?>
<?php if(count($contents) > 1 ) : ?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner-animation">
        <div class="outer-wrapper slider-wrapper hover-target hover-target-image py-16 md:py-0" style="background-image: url('<?=  $contents[0]['image']['url'] ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">
            <div class="container md:pt-8 md:pb-16 md:flex md:flex-col justify-between md:min-h-screen">
                <div class="content-wrapper hidden md:block">
                    <div class="logo-wrapper mb-4">
                        <img src="<?= $contents[0]['logo']['url'] ?>" class="hover-target hover-target-logo h-24" alt="">
                    </div>
                    <div class="description-wrapper md:w-5/12 mb-7">
                        <p class="text-white md:text-lg text-xs leading-8 hover-target hover-target-description animate-text" data-text-type="lines"><?php if($content['description_list']) : ?>
                                                <?php foreach($content['description_list'] as $list) : ?>
                                                <div class="flex items-center mb-3">
                                                <div class="icon-wrapper mr-3"><svg width="20" height="35" viewBox="0 0 35 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.00854 37.7283C6.12197 38.1326 5.02048 38.1056 4.37571 37.5127C3.73093 36.9199 3.97273 36.1383 4.67123 35.5724C25.8413 18.9989 32.3428 0 32.3428 0C35.6741 8.46192 41.8263 22.2867 7.00854 37.7283Z" fill="<?= $content['color_theme'] ? $content['color_theme'] : '#fff' ?>"/>
                                                <path d="M4.46914 44.9974C3.41444 45.0255 2.41383 44.8291 2.08931 44.0995C1.76479 43.3418 2.35975 42.6403 3.30627 42.3036C16.9632 37.0842 23.5618 33.773 33 26C30.4579 39.9184 13.5287 44.7168 4.46914 44.9974Z" fill="<?= $content['color_theme'] ? $content['color_theme'] : '#fff' ?>"/>
                                                <path d="M1.90476 49.6497C0.870748 49.5465 0 49.0563 0 48.334C0 47.6117 0.843537 47.0183 1.90476 47.0183C11.4286 46.9151 18.7755 45.6252 24 44C19.3469 48.1018 14.585 51.0427 1.90476 49.6497Z" fill="<?= $content['color_theme'] ? $content['color_theme'] : '#fff' ?>"/>
                                                </svg></div>
                                                <?= $list['list'] ?>    
                                                </div>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <?= $content['description'] ?>
                                            <?php endif; ?></p>
                    </div>
                    <div class="button-wrapper">
                    <?php if($content['button']['url'] && $content['button']['text']) : ?>
                        <a href="<?= $contents[0]['button']['url'] ?>" class="px-9 bg-sgi-orange py-4 text-white inline-block hover-target hover-target-button button-link"><?= $contents[0]['button']['text'] ?></a>
                    <?php endif; ?>
                    </div>
                </div>
                <!-- <div class="spacer md:py-16"></div> -->
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
                                    <p class="text-white text-subtitle"><?= $content['title'] ?></p>
                                </div>
                                <div class="logo-wrapper overflow-hidden md:hidden block">
                                    <img src="<?= $content['logo']['url'] ?>" class="mb-3 md:mb-0">
                                </div>
                                <div class="brief-wrapper hidden md:block">
                                    <p class="text-white text-lg text-animate"><?= $content['brief'] ?></p>
                                </div>
                                <div class="active-wrapper overflow-hidden md:hidden mb-4 md:mb-0">
                                    <div class="description-wrapper mb-4 md:mb-0">
                                        <p class="text-white md:text-lg text-xs md:leading-8 leading-6 hover-target hover-target-description">
                                            <?php if($content['description_list']) : ?>
                                                <?php foreach($content['description_list'] as $list) : ?>
                                                <div class="flex items-center mb-3">
                                                <div class="icon-wrapper mr-3"><svg width="20" height="35" viewBox="0 0 35 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.00854 37.7283C6.12197 38.1326 5.02048 38.1056 4.37571 37.5127C3.73093 36.9199 3.97273 36.1383 4.67123 35.5724C25.8413 18.9989 32.3428 0 32.3428 0C35.6741 8.46192 41.8263 22.2867 7.00854 37.7283Z" fill="<?= $content['color_theme'] ? $content['color_theme'] : '#fff' ?>"/>
                                                <path d="M4.46914 44.9974C3.41444 45.0255 2.41383 44.8291 2.08931 44.0995C1.76479 43.3418 2.35975 42.6403 3.30627 42.3036C16.9632 37.0842 23.5618 33.773 33 26C30.4579 39.9184 13.5287 44.7168 4.46914 44.9974Z" fill="<?= $content['color_theme'] ? $content['color_theme'] : '#fff' ?>"/>
                                                <path d="M1.90476 49.6497C0.870748 49.5465 0 49.0563 0 48.334C0 47.6117 0.843537 47.0183 1.90476 47.0183C11.4286 46.9151 18.7755 45.6252 24 44C19.3469 48.1018 14.585 51.0427 1.90476 49.6497Z" fill="<?= $content['color_theme'] ? $content['color_theme'] : '#fff' ?>"/>
                                                </svg></div>
                                                <?= $list['list'] ?>    
                                                </div>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <?= $content['description'] ?>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="button-wrapper">
                                        <?php if($content['button']['url'] && $content['button']['text']) : ?>
                                        <a href="<?= $content['button']['url'] ?>" class="md:px-9 px-4 py-2 md:py-4 text-[8px] bg-sgi-orange text-white inline-block hover-target hover-target-button button-link"><?= $content['button']['text'] ?></a>
                                        <?php endif; ?>
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