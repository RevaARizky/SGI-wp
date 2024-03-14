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
<main id="primary" class="font-sans">
    <div id="smooth-wrapper">
        <div id="smooth-content" class="bg-gray-theme">

        <header id="header" class="absolute top-0 left-0 right-0 md:pt-[40px] pt-[20px]">
            <div class="container">
                <div class="flex justify-between items-center">
                    <div class="logo-wrapper z-40">
                        <a href="/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="asd" width="118" height="63" viewBox="0 0 118 63" fill="none">
                                <g>
                                    <path d="M76.2942 40.0622C75.3373 40.5091 74.1252 40.4453 73.4873 39.8069C72.7856 39.1685 73.0408 38.3387 73.8063 37.7641C96.4524 20.0813 103.406 -0.21875 103.406 -0.21875C107.042 8.78223 113.612 23.5924 76.2942 40.0622Z" fill="white"/>
                                    <path d="M73.8063 47.4042C72.7218 47.468 71.6374 47.2127 71.2546 46.4466C70.9356 45.6806 71.5736 44.9784 72.5304 44.5953C87.075 39.2331 94.0921 35.8497 104.107 27.8701C101.492 42.1696 83.5026 47.085 73.8063 47.4042Z" fill="white"/>
                                    <path d="M70.5528 53.2134C69.4683 53.0857 68.5115 52.575 68.5115 51.7451C68.5115 50.9153 69.4046 50.2769 70.5528 50.2769C80.6319 50.1492 88.4145 48.7448 93.9006 46.8936C88.9886 51.4898 83.9491 54.8093 70.5528 53.2134Z" fill="white"/>
                                    <path d="M1.53101 51.6811L2.48788 49.766C4.21026 51.4258 7.20848 52.6387 10.3343 52.6387C14.7997 52.6387 16.7135 50.7874 16.7135 48.4254C16.7135 41.8502 2.04134 45.872 2.04134 37.0625C2.04134 33.5515 4.78439 30.4873 10.8446 30.4873C13.5239 30.4873 16.3307 31.2533 18.2445 32.5939L17.4152 34.6367C15.3738 33.2961 13.0135 32.6578 10.8446 32.6578C6.50677 32.6578 4.52922 34.5729 4.52922 36.9987C4.52922 43.5738 19.2013 39.616 19.2013 48.2978C19.2013 51.8088 16.3945 54.8091 10.3343 54.8091C6.82573 54.8091 3.31718 53.5324 1.53101 51.6811Z" fill="white"/>
                                    <path d="M41.5931 42.6794H44.0172V51.8081C41.7844 53.8508 38.5949 54.8722 35.2777 54.8722C28.0054 54.8722 22.7107 49.7015 22.7107 42.7432C22.7107 35.785 28.0054 30.6143 35.3415 30.6143C38.9776 30.6143 42.1034 31.7633 44.2085 34.0614L42.6137 35.6574C40.5724 33.6784 38.2121 32.8485 35.4053 32.8485C29.5364 32.8485 25.1986 37.0618 25.1986 42.7432C25.1986 48.4247 29.5364 52.6379 35.4053 52.6379C37.7018 52.6379 39.8069 52.1272 41.6569 50.7867V42.6794H41.5931Z" fill="white"/>
                                    <path d="M49.7575 30.9341C49.7575 29.7212 50.7144 28.7637 51.9902 28.7637C53.2661 28.7637 54.2229 29.6574 54.2229 30.8703C54.2229 32.0832 53.3298 33.0407 51.9902 33.0407C50.7144 33.0407 49.7575 32.147 49.7575 30.9341ZM50.3316 36.5518H53.585V54.6176H50.3316V36.5518Z" fill="#D75C00"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="menu-wrapper cursor-pointer relative w-[88px] h-[28px] overflow-hidden">
                        <div class="hamburger-menu flex items-center absolute top-0 left-0 z-[60]">
                            <span class="text-white text-[8px] md:text-sm mr-3.5 font-sans font-medium">MENU</span>
                            <div class="hamburger-wrapper">
                                <span class="hamburger block w-8 mb-1.5 md:h-1 h-[2px] bg-white rounded-2xl"></span>
                                <span class="hamburger block w-8 mb-1.5 md:h-1 h-[2px] bg-white rounded-2xl"></span>
                                <span class="hamburger block w-8 md:h-1 h-[2px] bg-white rounded-2xl"></span>
                            </div>
                        </div>
                        <div class="close-menu absolute left-0 top-0 flex items-center cursor-pointer z-[60]">
                            <span class="text-white text-[8px] md:text-sm mr-3.5 font-sans font-medium">CLOSE</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                <path d="M0.762563 24.7626C0.0791457 25.446 0.0791457 26.554 0.762563 27.2374C1.44598 27.9209 2.55402 27.9209 3.23744 27.2374L0.762563 24.7626ZM15.2374 15.2374C15.9209 14.554 15.9209 13.446 15.2374 12.7626C14.554 12.0791 13.446 12.0791 12.7626 12.7626L15.2374 15.2374ZM12.7626 12.7626C12.0791 13.446 12.0791 14.554 12.7626 15.2374C13.446 15.9209 14.554 15.9209 15.2374 15.2374L12.7626 12.7626ZM27.2374 3.23744C27.9209 2.55402 27.9209 1.44598 27.2374 0.762563C26.554 0.0791457 25.446 0.0791457 24.7626 0.762563L27.2374 3.23744ZM15.2374 12.7626C14.554 12.0791 13.446 12.0791 12.7626 12.7626C12.0791 13.446 12.0791 14.554 12.7626 15.2374L15.2374 12.7626ZM24.7626 27.2374C25.446 27.9209 26.554 27.9209 27.2374 27.2374C27.9209 26.554 27.9209 25.446 27.2374 24.7626L24.7626 27.2374ZM12.7626 15.2374C13.446 15.9209 14.554 15.9209 15.2374 15.2374C15.9209 14.554 15.9209 13.446 15.2374 12.7626L12.7626 15.2374ZM3.23744 0.762563C2.55402 0.0791457 1.44598 0.0791457 0.762563 0.762563C0.0791457 1.44598 0.0791457 2.55402 0.762563 3.23744L3.23744 0.762563ZM3.23744 27.2374L15.2374 15.2374L12.7626 12.7626L0.762563 24.7626L3.23744 27.2374ZM15.2374 15.2374L27.2374 3.23744L24.7626 0.762563L12.7626 12.7626L15.2374 15.2374ZM12.7626 15.2374L24.7626 27.2374L27.2374 24.7626L15.2374 12.7626L12.7626 15.2374ZM15.2374 12.7626L3.23744 0.762563L0.762563 3.23744L12.7626 15.2374L15.2374 12.7626Z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </header>