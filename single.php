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

<article id="article-<?= get_the_id(); ?>" class="container text-white">
    <div class="inner pt-28 grid grid-cols-12">
        <div class="md:col-start-2 md:col-span-7 col-span-12 article-wrapper">
            <?= get_the_content(); ?>
        </div>
        <div class="md:col-start-10 md:col-span-3 col-span-12">
            <div class="newsletter-wrapper newsletter mb-16">
                <div class="inner bg-sgi-footer py-6 px-5">
                    <div class="title-wrapper mb-3">
                        <p class="text-4xl font-montserrat">
                            Join our newsletter!
                        </p>
                    </div>
                    <div class="form-wrapper mb-4">
                        <form action="#" method="POST">
                            <div class="input-wrapper mb-6">
                                <input type="text" name="email-newsletter" placeholder="Your Email" id="email-newsletter" class="w-full input-newsletter">
                            </div>
                            <div class="input-wrapper">
                                <input type="submit" class="w-full py-4 text-xs bg-sgi-orange" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="title-wrapper mb-6">
                <p class="text-4xl font-montserrat font-semibold">Popular Article</p>
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
                                <a href="<?= get_the_permalink() ?>">
                                    <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'full') ?>" class="absolute inset-0 object-cover h-full w-full" alt="">
                                </a>
                            </div>
                            <div class="title-wrapper mb-2">
                                <a href="<?= get_the_permalink() ?>">
                                    <p class="text-xl font-semibold"><?= get_the_title() ?></p>
                                </a>
                            </div>
                            <div class="description-wrapper">
                                <a href="<?= get_the_permalink() ?>">
                                    <p class="text-lg"><?= get_field('short_description', get_the_id()); ?></p>
                                </a>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>

<?php get_footer(); ?>