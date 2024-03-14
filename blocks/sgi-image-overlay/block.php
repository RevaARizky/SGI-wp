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
$id = 'image-overlay-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-overlay text-white';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$items = get_field('items');
$title = get_field('title');
$subtitle = get_field('subtitle');
?>
<?php if($items) : ?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner-animation">
        <div class="container md:py-24">
            <div class="section-heading mb-16">
                <div class="section-title text-center mb-4">
                    <p class="text-lg text-white"><?= $title ?></p>
                </div>
            
                <div class="section-subtitle text-center">
                    <p class="text-5xl text-white"><?= $subtitle ?></p>
                </div>
            </div>
        
            <!-- <div class="grid grid-cols-12 gap-10">
                <?php foreach($items as $index => $item) : ?>
                    <div class="md:col-span-6 col-span-12 overlay-item" data-overlay="<?= $index ?>" data-speed="<?= $index % 2 == 0 ? '1.0' : '1.2' ?>">
                        <div class="image-wrapper relative pt-[75%] mb-5">
                            <?php if($item['overlay']) : ?>
                            <div class="overlay-button-wrapper absolute bottom-4 right-4 cursor-pointer z-20" data-target="<?= $index ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.62681e-08 17.7504C0.000611021 9.28239 5.98284 1.99405 14.2882 0.342583C22.5936 -1.30888 30.909 3.13647 34.1491 10.9601C37.3892 18.7837 34.6515 27.8065 27.6104 32.5107C20.5692 37.2149 11.1856 36.2902 5.19818 30.3021C1.86951 26.9731 -0.000339619 22.4581 4.62681e-08 17.7504Z" fill="#D75C00"/>
                                    <path d="M11.0938 16.7505C10.5415 16.7505 10.0938 17.1982 10.0938 17.7505C10.0938 18.3027 10.5415 18.7505 11.0938 18.7505V16.7505ZM17.75 18.7505C18.3022 18.7505 18.75 18.3027 18.75 17.7505C18.75 17.1982 18.3022 16.7505 17.75 16.7505V18.7505ZM17.75 16.7505C17.1977 16.7505 16.75 17.1982 16.75 17.7505C16.75 18.3027 17.1977 18.7505 17.75 18.7505V16.7505ZM24.4062 18.7505C24.9585 18.7505 25.4062 18.3027 25.4062 17.7505C25.4062 17.1982 24.9585 16.7505 24.4062 16.7505V18.7505ZM18.7503 17.7505C18.7503 17.1982 18.3026 16.7505 17.7503 16.7505C17.1981 16.7505 16.7503 17.1982 16.7503 17.7505H18.7503ZM16.7503 24.4067C16.7503 24.959 17.1981 25.4067 17.7503 25.4067C18.3026 25.4067 18.7503 24.959 18.7503 24.4067H16.7503ZM16.7503 17.7504C16.7503 18.3027 17.1981 18.7504 17.7503 18.7504C18.3026 18.7504 18.7503 18.3027 18.7503 17.7504H16.7503ZM18.7503 11.0942C18.7503 10.542 18.3026 10.0942 17.7503 10.0942C17.1981 10.0942 16.7503 10.542 16.7503 11.0942H18.7503ZM11.0938 18.7505H17.75V16.7505H11.0938V18.7505ZM17.75 18.7505H24.4062V16.7505H17.75V18.7505ZM16.7503 17.7505V24.4067H18.7503V17.7505H16.7503ZM18.7503 17.7504V11.0942H16.7503V17.7504H18.7503Z" fill="white"/>
                                </svg>
                            </div>
                            <?php endif; ?>
                            <?php if($item['overlay']) : ?>
                            <div class="bg-sgi-footer overlay-content-wrapper absolute -inset-[1px] flex justify-center items-center px-8 lg:px-16 z-10" data-overlay="<?= $index ?>">
                                <p class="text-white text-sm md:text-base"><?= $item['overlay'] ?></p>
                            </div>
                            <?php endif; ?>
                            <img src="<?= $item['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                        </div>
                        <?php if($item['title']) : ?>
                        <div class="title-wrapper mb-5">
                            <p class="text-2xl"><?= $item['title'] ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($item['description']) : ?>
                        <div class="description-wrapper mb-5">
                            <p class="text-lg"><?= $item['description'] ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div> -->
    
            <div class="grid grid-cols-12 gap-10 overflow-hidden">
                <div class="md:col-span-6 col-span-12 overlay-wrapper">
                    <?php foreach($items as $index => $item) : ?>
                        <?php if($index % 2 == 1) : ?>
                            <div class="overlay-item" data-overlay="<?= $index ?>">
                                <div class="scroll-reveal-image image-wrapper relative pt-[75%] mb-5 overflow-hidden cursor-pointer" data-target="<?= $index ?>">
                                    <?php if($item['overlay']) : ?>
                                    <div class="overlay-button-wrapper absolute bottom-4 right-4 cursor-pointer z-20" data-target="<?= $index ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.62681e-08 17.7504C0.000611021 9.28239 5.98284 1.99405 14.2882 0.342583C22.5936 -1.30888 30.909 3.13647 34.1491 10.9601C37.3892 18.7837 34.6515 27.8065 27.6104 32.5107C20.5692 37.2149 11.1856 36.2902 5.19818 30.3021C1.86951 26.9731 -0.000339619 22.4581 4.62681e-08 17.7504Z" fill="#D75C00"/>
                                            <path d="M11.0938 16.7505C10.5415 16.7505 10.0938 17.1982 10.0938 17.7505C10.0938 18.3027 10.5415 18.7505 11.0938 18.7505V16.7505ZM17.75 18.7505C18.3022 18.7505 18.75 18.3027 18.75 17.7505C18.75 17.1982 18.3022 16.7505 17.75 16.7505V18.7505ZM17.75 16.7505C17.1977 16.7505 16.75 17.1982 16.75 17.7505C16.75 18.3027 17.1977 18.7505 17.75 18.7505V16.7505ZM24.4062 18.7505C24.9585 18.7505 25.4062 18.3027 25.4062 17.7505C25.4062 17.1982 24.9585 16.7505 24.4062 16.7505V18.7505ZM18.7503 17.7505C18.7503 17.1982 18.3026 16.7505 17.7503 16.7505C17.1981 16.7505 16.7503 17.1982 16.7503 17.7505H18.7503ZM16.7503 24.4067C16.7503 24.959 17.1981 25.4067 17.7503 25.4067C18.3026 25.4067 18.7503 24.959 18.7503 24.4067H16.7503ZM16.7503 17.7504C16.7503 18.3027 17.1981 18.7504 17.7503 18.7504C18.3026 18.7504 18.7503 18.3027 18.7503 17.7504H16.7503ZM18.7503 11.0942C18.7503 10.542 18.3026 10.0942 17.7503 10.0942C17.1981 10.0942 16.7503 10.542 16.7503 11.0942H18.7503ZM11.0938 18.7505H17.75V16.7505H11.0938V18.7505ZM17.75 18.7505H24.4062V16.7505H17.75V18.7505ZM16.7503 17.7505V24.4067H18.7503V17.7505H16.7503ZM18.7503 17.7504V11.0942H16.7503V17.7504H18.7503Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($item['overlay']) : ?>
                                    <div class="bg-sgi-footer overlay-content-wrapper absolute -inset-[1px] flex justify-center items-center px-8 lg:px-16 z-10" data-overlay="<?= $index ?>">
                                        <p class="text-white text-sm md:text-base"><?= $item['overlay'] ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <img src="<?= $item['image']['url'] ?>" class="absolute inset-0 w-full h-[calc(100%+60px)] object-cover" alt="">
                                </div>
                                <?php if($item['title']) : ?>
                                <div class="title-wrapper mb-5">
                                    <p class="text-2xl"><?= $item['title'] ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if($item['description']) : ?>
                                <div class="description-wrapper mb-5">
                                    <p class="text-lg"><?= $item['description'] ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="md:col-span-6 col-span-12 overlay-wrapper">
                    <?php foreach($items as $index => $item) : ?>
                        <?php if($index % 2 == 0) : ?>
                            <div class="overlay-item" data-overlay="<?= $index ?>">
                                <div class="scroll-reveal-image image-wrapper relative pt-[75%] mb-5 overflow-hidden cursor-pointer" data-target="<?= $index ?>">
                                    <?php if($item['overlay']) : ?>
                                    <div class="overlay-button-wrapper absolute bottom-4 right-4 cursor-pointer z-20" data-target="<?= $index ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.62681e-08 17.7504C0.000611021 9.28239 5.98284 1.99405 14.2882 0.342583C22.5936 -1.30888 30.909 3.13647 34.1491 10.9601C37.3892 18.7837 34.6515 27.8065 27.6104 32.5107C20.5692 37.2149 11.1856 36.2902 5.19818 30.3021C1.86951 26.9731 -0.000339619 22.4581 4.62681e-08 17.7504Z" fill="#D75C00"/>
                                            <path d="M11.0938 16.7505C10.5415 16.7505 10.0938 17.1982 10.0938 17.7505C10.0938 18.3027 10.5415 18.7505 11.0938 18.7505V16.7505ZM17.75 18.7505C18.3022 18.7505 18.75 18.3027 18.75 17.7505C18.75 17.1982 18.3022 16.7505 17.75 16.7505V18.7505ZM17.75 16.7505C17.1977 16.7505 16.75 17.1982 16.75 17.7505C16.75 18.3027 17.1977 18.7505 17.75 18.7505V16.7505ZM24.4062 18.7505C24.9585 18.7505 25.4062 18.3027 25.4062 17.7505C25.4062 17.1982 24.9585 16.7505 24.4062 16.7505V18.7505ZM18.7503 17.7505C18.7503 17.1982 18.3026 16.7505 17.7503 16.7505C17.1981 16.7505 16.7503 17.1982 16.7503 17.7505H18.7503ZM16.7503 24.4067C16.7503 24.959 17.1981 25.4067 17.7503 25.4067C18.3026 25.4067 18.7503 24.959 18.7503 24.4067H16.7503ZM16.7503 17.7504C16.7503 18.3027 17.1981 18.7504 17.7503 18.7504C18.3026 18.7504 18.7503 18.3027 18.7503 17.7504H16.7503ZM18.7503 11.0942C18.7503 10.542 18.3026 10.0942 17.7503 10.0942C17.1981 10.0942 16.7503 10.542 16.7503 11.0942H18.7503ZM11.0938 18.7505H17.75V16.7505H11.0938V18.7505ZM17.75 18.7505H24.4062V16.7505H17.75V18.7505ZM16.7503 17.7505V24.4067H18.7503V17.7505H16.7503ZM18.7503 17.7504V11.0942H16.7503V17.7504H18.7503Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($item['overlay']) : ?>
                                    <div class="bg-sgi-footer overlay-content-wrapper absolute -inset-[1px] flex justify-center items-center px-8 lg:px-16 z-10" data-overlay="<?= $index ?>">
                                        <p class="text-white text-sm md:text-base"><?= $item['overlay'] ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <img src="<?= $item['image']['url'] ?>" class="absolute inset-0 w-full h-[calc(100%+60px)] object-cover" alt="">
                                </div>
                                <?php if($item['title']) : ?>
                                <div class="title-wrapper mb-5">
                                    <p class="text-2xl"><?= $item['title'] ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if($item['description']) : ?>
                                <div class="description-wrapper mb-5">
                                    <p class="text-lg"><?= $item['description'] ?></p>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>
<?php endif; ?>