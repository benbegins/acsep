<?php 
    $featured_article = get_field('actualite_du_moment');

    if($featured_article):
        $featured_article_id = $featured_article->ID;
        $featured_article_title = get_the_title($featured_article_id);
        $featured_article_link = get_the_permalink($featured_article_id);
        $featured_article_image_id = get_post_thumbnail_id($featured_article_id);
        $featured_article_excerpt = get_the_excerpt($featured_article_id);
?>

<div class="pb-section-mobile lg:pb-section">
    <section class="section-actualite-du-moment relative pb-section-mobile md:pb-0 text-light">
        <div class="container">
            <div class="section-actualite-du-moment__content relative md:grid md:grid-cols-2 md:gap-8 md:rounded-2xl">
                <div class="relative -top-5 rounded-xl md:rounded-2xl overflow-hidden md:left-5"><?php echo wp_get_attachment_image($featured_article_image_id, 'medium_large', false, array('class'=>'w-full md:h-full md:absolute md:object-cover')); ?></div>
                <div class="mt-6 md:mt-0 flex flex-col items-start gap-2 md:py-section md:px-8 xl:w-2/3 xl:mx-auto xl:px-0">
                    <h2 class="lg:text-lg font-extrabold leading-tight"><?php _e('Actualité du moment', 'acsep'); ?></h2>
                    <h3 class="text-xl lg:text-2xl font-extrabold leading-tight"><a href="<?php echo $featured_article_link; ?>"><?php echo $featured_article_title ?></a></h3>
                    <p class="py-2 lg:py-3"><?php echo $featured_article_excerpt ?></p>
                    <a href="<?php echo $featured_article_link; ?>" class="btn-primary white mt-2"><?php _e('Lire la suite', 'acsep'); ?></a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php endif; ?>