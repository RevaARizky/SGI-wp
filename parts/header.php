<aside id="nav" class="fixed inset-0 bg-gray-theme z-50">
    <div class="container grid grid-cols-12 md:py-28 py-16 h-full relative">
        <div class="image-wrapper col-span-12 hidden lg:block md:col-span-5 relative overflow-hidden">
            <img src="/wp-content/uploads/2023/10/nav.jpg" class="absolute inset-0 w-full h-full object-cover" alt="">
        </div>
        <div class="link-wrapper col-span-12 lg:col-start-7 lg:col-span-5 relative">
            <div class="link-list flex flex-col md:justify-between justify-center text-center md:text-left h-full">
                <?php foreach(wp_get_menu_array(get_field('header_id', 'option')) as $menu) : ?>
                <div class="link md:mb-0 mb-8">
                    <a href="<?= $menu['url'] ?>" class="<?= $menu['children'] ? ' dropdown flex items-center gap-x-2 md:justify-start justify-center' : '' ?>">
                    <span class="text-white md:text-3xl text-xl font-montserrat font-semibold<?= $menu['children'] ? '' : ' animate-hover-link' ?>">
                        <?= $menu['title'] ?>
                    </span>
                    <?php if($menu['children']) : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 57 57" fill="none">
                        <g clip-path="url(#clip0_914_218)">
                            <path d="M23.75 40.375L35.625 28.5L23.75 16.625L23.75 40.375Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_914_218">
                            <rect width="57" height="57" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <?php endif; ?>
                    </a>
                    <?php if($menu['children']) : ?>
                        <div class="link-dropdown pl-8 pt-2">
                            <?php foreach($menu['children'] as $children) : ?>
                                <div class="link-mb-2">
                                    <a href="<?= $children['url'] ?>" class="text-white">
                                        <?= $children['title'] ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</aside>

