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
    register_block_type($dir . '/blocks/sgi-our-fleet');
    register_block_type($dir . '/blocks/sgi-cta-v2');
    register_block_type($dir . '/blocks/sgi-image-overlay');
    register_block_type($dir . '/blocks/sgi-logo-list');
    register_block_type($dir . '/blocks/sgi-image-text');
    register_block_type($dir . '/blocks/sgi-image-title');
    register_block_type($dir . '/blocks/sgi-about-team');
    register_block_type($dir . '/blocks/sgi-slider-fleet');
    register_block_type($dir . '/blocks/sgi-contact');
    register_block_type($dir . '/blocks/sgi-gallery');
    register_block_type($dir . '/blocks/sgi-blog');
    register_block_type($dir . '/blocks/sgi-about-logo');
    register_block_type($dir . '/blocks/sgi-icare');
    register_block_type($dir . '/blocks/sgi-icare-v2');
    register_block_type($dir . '/blocks/sgi-spacer');
    register_block_type($dir . '/blocks/sgi-number-counter');
    register_block_type($dir . '/blocks/sgi-button-hover');
    register_block_type($dir . '/blocks/sgi-scope');
    register_block_type($dir . '/blocks/sgi-scope-v2');
    register_block_type($dir . '/blocks/sgi-scope-v3');
    register_block_type($dir . '/blocks/sgi-capability');
    register_block_type($dir . '/blocks/sgi-introduction');
    register_block_type($dir . '/blocks/sgi-icon-highlight');
    register_block_type($dir . '/blocks/sgi-service-excellence');
    register_block_type($dir . '/blocks/sgi-vertical-timeline');
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
                'acf/sgi-our-fleet',
                'acf/sgi-cta-v2',
                'acf/sgi-image-overlay',
                'acf/sgi-logo-list',
                'acf/sgi-image-text',
                'acf/sgi-image-title',
                'acf/sgi-about-team',
                'acf/sgi-slider-fleet',
                'acf/sgi-contact',
                'acf/sgi-gallery',
                'acf/sgi-blog',
                'acf/sgi-about-logo',
                'acf/sgi-icare',
                'acf/sgi-icare-v2',
                'acf/sgi-spacer',
                'acf/sgi-number-counter',
                'acf/sgi-button-hover',
                'acf/sgi-scope',
                'acf/sgi-scope-v2',
                'acf/sgi-scope-v3',
                'acf/sgi-capability',
                'acf/sgi-introduction',
                'acf/sgi-icon-highlight',
                'acf/sgi-service-excellence',
                'acf/sgi-vertical-timeline',
            ];
            break;
    }

    return $allowed_blocks;
}, 10, 2);
