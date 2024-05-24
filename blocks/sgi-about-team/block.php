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
$classes = 'acf-block block-about-team bg-sgi-secondary text-white z-10';
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

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner bg-sgi-secondary">
        <div class="container">
            <div class="grid grid-cols-12 md:mb-28">
                <div class="md:col-span-6 col-span-12">
                    <div class="section-title">
                        <p class="text-title text-white font-montserrat tracking-wide"><?= $title ?></p>
                    </div>
                </div>
                <div class="md:col-span-6 col-span-12">
                    <div class="section-subtitle">
                        <p class="text-desc-small text-white tracking-wide"><?= $subtitle ?></p>
                    </div>
                </div>
            </div>
    
            <div class="grid grid-cols-12 overlay-wrapper">
    
                <div class="md:col-span-5 col-span-12">
                    <div class="team-box-wrapper">
                        <?php foreach($teams as $index=>$team) : ?>
                            
                            <div class="team-wrapper py-10" data-index="<?= $index ?>">
                                <div class="team-wrapper-inner pb-5 relative">
                                    <div class="inner flex justify-between relative items-center">
                                        <div class="col-span-2 team-name">
                                            <p class="text-subtitle"><?= $team['name'] ?></p>
                                        </div>
                                        <div class="col-span-1 team-position text-end">
                                            <p class="text-desc-small text-white"><?= $team['position'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-span-3 team-description overflow-hidden" style="height: 0;">
                                    <?php if($team['social_media']['linkedin_url']) : ?>
                                        <div class="social pt-4">
                                            <a href="<?= $team['social_media']['linkedin_url'] ?>" class="flex items-center gap-x-4" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="108px" height="26px"><g transform="matrix(0.424533, 0, 0, 0.424533, 0, 0)"><path fill="#d75c00" d="M26.896 43.398v8.704H0V9.043h9.433v34.355zM31.062 22.9h9.066v29.2h-9.066zm4.534-14.505a5.26 5.26 0 0 1 5.259 5.257c0 2.906-2.356 5.255-5.26 5.255s-5.256-2.35-5.256-5.255a5.26 5.26 0 0 1 5.256-5.257m61.76 14.502h11.1l-11.9 13.5L108.207 52.1H96.825l-9.62-14.425h-.117V52.1h-9.063V9.04h9.063v25.735zm-52.212.017h8.702v4h.12c1.208-2.297 4.17-4.713 8.58-4.713 9.188 0 10.88 6.043 10.88 13.898v16H64.36V37.903c0-3.386-.062-7.735-4.716-7.735-4.713 0-5.436 3.687-5.436 7.493v14.43h-9.066V22.914zm82.407 11.194c.06-3.022-2.298-5.56-5.564-5.56-3.987 0-6.164 2.72-6.403 5.56zm7.674 12.93c-2.9 3.687-7.673 5.804-12.4 5.804-9.064 0-16.317-6.047-16.317-15.414s7.253-15.4 16.317-15.4c8.468 0 13.78 6.043 13.78 15.4v2.84h-21.032c.72 3.445 3.323 5.68 6.83 5.68 2.962 0 4.955-1.5 6.467-3.567zm20.27-17.072c-4.53 0-7.248 3.024-7.248 7.432 0 4.416 2.72 7.434 7.248 7.434 4.536 0 7.257-3.018 7.257-7.434-.001-4.408-2.72-7.432-7.257-7.432m15.6 22.12h-8.342v-3.87h-.118c-1.395 2.115-4.897 4.594-9.008 4.594-8.706 0-14.446-6.283-14.446-15.17 0-8.16 5.076-15.654 13.416-15.654 3.75 0 7.255 1.027 9.3 3.867h.118V9.04h9.07z" style="fill: #d75c00;"/><path d="M236.78 0h-52.107c-2.5 0-4.513 1.974-4.513 4.406v52.327c0 2.435 2.023 4.41 4.513 4.41h52.107c2.494 0 4.526-1.976 4.526-4.41V4.406C241.307 1.974 239.275 0 236.78 0z" fill="#0177b5" style="&#10;    fill: #d75c00;&#10;"/><path d="M189.226 22.923h9.07v29.18h-9.07zm4.537-14.505a5.26 5.26 0 0 1 5.255 5.257 5.26 5.26 0 0 1-5.255 5.259 5.26 5.26 0 0 1-5.26-5.259 5.26 5.26 0 0 1 5.26-5.257m10.22 14.505h8.698V26.9h.12c1.2-2.294 4.17-4.713 8.58-4.713 9.184 0 10.88 6.044 10.88 13.9v16.005H223.2v-14.2c0-3.384-.062-7.737-4.713-7.737-4.72 0-5.443 3.686-5.443 7.492v14.435h-9.06v-29.18z" fill="#fff"/></g></svg>
                                            
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                        
                                    </div>
                                </div>
                                <div class="image-mobile-wrapper block md:hidden">
                                    <img src="<?= $team['image']['url'] ?>" class="w-full" alt="">
                                </div>
                            </div>
    
                        <?php endforeach; ?>
                    </div>
                </div>
    
                <div class="md:col-span-5 md:col-start-8 col-span-12 md:block hidden">
                    <div class="image-box-wrapper">
                        <?php foreach($teams as $index=>$team) : ?>
                            <div class="image-wrapper fixed top-0" style="width: inherit;" data-index="<?= $index ?>">
                                <div class="inner relative w-full pt-[100%]">
                                    <img src="<?= $team['image']['url'] ?>" class="absolute inset-0 w-1/2 h-1/2 rounded-full object-cover" alt="">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
    
            </div>
    
        </div>
    </div>

</section>