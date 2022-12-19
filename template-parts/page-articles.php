<!-- Hero -->
<section class='py-section-mobile lg:py-section relative'>
    <div class="container pt-section-mobile lg:pt-section">
        <h1 class="fade font-extrabold text-xl sm:text-2xl lg:text-3xl" data-translate="2">
            <?php _e('Actualités & événements', 'acsep') ?>
        </h1>
        <p class="fade text-lg mt-6" data-translate="2" data-delay="0.1"><?php _e('Découvrez les dernières tendances de l’industrie.', 'acsep'); ?></p>
    </div>
</section>


<!-- Categories -->
<section>
    <div class="fade container" data-delay="0.25" data-translate="2">
        <ul class="flex flex-wrap">
            <li>
                <a href="<?php echo get_post_type_archive_link( 'actualites' ); ?>" class="btn-tertiary mr-8 my-2<?php if($args['slug'] === 'all'){echo ' active';} ?>"><?php _e('Toutes les catégories', 'acsep'); ?></a>
            </li>
            <?php 
            $categories = get_terms( array(
                'taxonomy' => 'types_actualites',
                'hide_empty' => false
            ));

            

            
            foreach($categories as $category):     
                $name = $category->name;        
                $link = get_term_link( $category->term_id);
            ?>

            <li>
                <a href="<?= $link; ?>" class="btn-tertiary mr-8 my-2<?php if($args['slug'] === $category->slug){echo ' active';} ?>">
                    <?= $name; ?>
                </a>
            </li>
            
            <?php
            endforeach; 
            ?>
        </ul>
    </div>
</section>


<!-- Liste articles -->
<section class='py-section-mobile lg:py-section'>
    <div class="container">
        <ul class="list-articles grid md:gap-x-6 md:grid-cols-2 lg:grid-cols-4 lg:gap-x-8">
        <?php 
        if(have_posts()):
            $index = 0;

            while(have_posts()):
                $index++;
                the_post();

                if($index === 1):
        ?>

            <li class="first-article md:col-span-2 lg:col-span-4 mb-12 lg:mb-24" data-delay="0.25" data-duration="2">
                <article class="item-actualite lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                    <a href="<?php the_permalink() ?>">
                        <div class="img img-transition">
                            <?php
                            if(has_post_thumbnail()) {
                                the_post_thumbnail( 'medium_large');
                            } else {
                                echo '<img src="' . get_template_directory_uri() . '/src/img/illus/visuel-actualite.png" alt=""/>';
                            }
                            ?>
                        </div>
                    </a>
                    <div class="lg:w-5/6 lg:ml-auto">
                        <div class="mt-6 lg:mt-0 mb-2">
                            <?php
                            $categories = get_the_terms($post->ID, 'types_actualites');
                            $cat_name = __('Actualités', 'acsep');
                            $cat_link = get_post_type_archive_link( 'actualites' );
                            if($categories){
                                $cat_name = $categories[0]->name;
                                $cat_link = get_term_link( $categories[0]->term_id);
                            }
                            ?>
                            <a class="text-sm text-beige bg-light-beige px-2 py-1 rounded-md hover:text-dark" href="<?= $cat_link; ?>"><?= $cat_name; ?></a>
                        </div>
                        <h3 class="text-xl font-extrabold mt-6">
                            <a href="<?php the_permalink() ?>" class="inline-block hover:text-pink"><?= get_the_title(); ?></a>
                        </h3>
                        <div class="my-6">
                            <?php the_excerpt(); ?>
                        </div>
                        <div>
                            <a href="<?php the_permalink(); ?>" class="btn-primary"><?php _e('Lire la suite', 'acsep'); ?></a>
                        </div>
                    </div>
                </article>
            </li>

            

            <?php 
                else: 
            ?>

            
            <li  class="mb-12 lg:mb-16">
                <?php get_template_part( '/template-parts/item-actualite' ); ?>
            </li>
            

        <?php 
                endif;
            endwhile;
        endif;
        
        ?>    
        </ul>

        <div class="pagination">
            <?php 
            $args = array(
                'prev_next'=> false,
                'mid_size'=> 4,
            );

            the_posts_pagination($args); 
            ?>
        </div>
    </div>
</section>



<!-- Contact -->
<?php 
get_template_part( 'template-parts/section-contact-sm' );
?>