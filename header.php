<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<style>
    #loading-screen {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #636569;
        z-index: 90;
    }
    #loading-screen .logo-anim {
        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    #loading-screen .logo-wrapper {
        margin-bottom: 78px;
    }
    .loading-bar {
        width: 450px;
        position: relative;
        margin-bottom: 55px;
    }
    .loading-bar::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #fff;
        z-index: 0;
    }
    .loading-bar::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 98%;
        height: 4px;
        background-color: #D75C00;
        z-index: 40;
    }
    #loading-screen .text-wrapper {
        color: #fff;
        font-size: 26px;
        letter-spacing: .15px;
    }
</style>


<body <?php body_class('antialiased font-sgi'); ?>>

<!-- <div id="loading-screen">
    <div class="logo-anim">
        <div class="logo-wrapper">
            <img src="<?= assets_url('/dist/images/loading.gif') ?>" width="300" alt="">
        </div>
        <div class="loading-bar"></div>
        <div class="text-wrapper">
            <p class="font-montserrat">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
    </div>
</div> -->





<?php get_template_part('parts/header'); ?>
<main id="primary" class="font-sans bg-gray-theme">