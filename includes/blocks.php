<?php

/**
 * Register blocks
 */
add_action('init', function () {
    $dir = get_template_directory();

    /** SGI Blocks */
    register_block_type($dir . '/blocks/sgi-home');
    register_block_type($dir . '/blocks/sgi-about-section');
    register_block_type($dir . '/blocks/sgi-header-unit');
    register_block_type($dir . '/blocks/sgi-slider-unit');
    register_block_type($dir . '/blocks/sgi-cta');
    register_block_type($dir . '/blocks/sgi-our-fleet');
    register_block_type($dir . '/blocks/sgi-image-overlay');
    register_block_type($dir . '/blocks/sgi-logo-list');
    register_block_type($dir . '/blocks/sgi-image-text');
    register_block_type($dir . '/blocks/sgi-about-team');
    register_block_type($dir . '/blocks/sgi-slider-fleet');
    register_block_type($dir . '/blocks/sgi-contact');
    register_block_type($dir . '/blocks/sgi-gallery');
    register_block_type($dir . '/blocks/sgi-blog');
    // register_block_type($dir . '/blocks/sgi-about-logo');
}, 5);

/**
 * Set allowed blocks
 */
add_filter('allowed_block_types_all', function($allowed_blocks, $editor_context) {
    switch ($editor_context->post->post_type) {
        case 'page':
            $allowed_blocks = [
                'acf/sgi-home',
                'acf/sgi-about-section',
                'acf/sgi-header-unit',
                'acf/sgi-slider-unit',
                'acf/sgi-cta',
                'acf/sgi-our-fleet',
                'acf/sgi-image-overlay',
                'acf/sgi-logo-list',
                'acf/sgi-image-text',
                'acf/sgi-about-team',
                'acf/sgi-slider-fleet',
                'acf/sgi-contact',
                'acf/sgi-gallery',
                'acf/sgi-blog',
                // 'acf/sgi-about-logo',
            ];
            break;
    }

    return $allowed_blocks;
}, 10, 2);
