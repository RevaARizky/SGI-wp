<?php get_header(); ?>

<style>
    .article-wrapper h1, .article-wrapper h2, .article-wrapper h3, .article-wrapper h4, .article-wrapper h5, .article-wrapper h6 {
        font-family: "Montserrat", sans-serif;
        font-size: 24px;
    }
    .article-wrapper p {
        font-size: 14px;
    }
    @media(min-width: 1024px) {
        .article-wrapper h1, .article-wrapper h2, .article-wrapper h3, .article-wrapper h4, .article-wrapper h5, .article-wrapper h6 {
            font-size: 54px;
        }
        .article-wrapper p {
            padding-left: 85px;
            font-size: 18px;
        }
    }
</style>

<article id="article-<?= get_the_id(); ?>" class="grid grid-cols-12">
    <div class="md:col-span-8 col-span-12 article-wrapper">
        <?php get_the_content(); ?>
    </div>
    <div class="md:col-span-4 col-span-12">
        <div class="title-wrapper mb-6">
            <p class="font-2xl font-semibold">Popular Article</p>
        </div>
        <div class="related-wrapper">
            <?php $loop = new WP_Query(array(
                'post_type' => 'post',
                'post__not_in' => array(get_the_ID()),
                'posts_per_page' => 3,
            ));
            if($loop->have_posts()) :
                while($loop->have_posts()) :
                    $loop->the_post(); ?>

                    <div class="article mb-10">
                        <div class="image-wrapper relative pt-[200px] mb-4">
                            <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'full') ?>" class="absolute inset-0 object-cover h-full w-full" alt="">
                        </div>
                        <div class="title-wrapper mb-2">
                            <p class="text-xl font-semibold"><?= get_the_title() ?></p>
                        </div>
                        <div class="description-wrapper">
                            <p class="text-lg"><?= get_field('short_description', get_the_id()); ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</article>

<?php get_footer(); ?>