<?php 
get_header(); 
$categories = get_the_terms($post->ID, 'types_actualites');
?>

    <div class="page-single-actualites">
        
    
        <section class='py-section-mobile lg:py-section relative'>
            <div class="container pt-12 lg:pt-16">

               


                <div class="lg:w-1/2 lg:mx-auto">
                    <div class="fade lg:text-center">
                        <?php 
                        if($categories):
                            $cat_name = $categories[0]->name;
                            $cat_link = get_term_link( $categories[0]->term_id);
                        ?>
                        <a class="inline-block mr-3 text-sm text-beige bg-light-beige px-2 py-1 rounded-md hover:text-dark" href="<?= $cat_link; ?>"><?= $cat_name; ?></a>
                        <?php endif; ?>

                        <span class="text-sm opacity-50"><?php the_date('d.m.Y'); ?></span>
                    </div>
                    <h1 class="fade text-2xl font-extrabold mb-6 mt-4 lg:text-center"><?php the_title(); ?></h1>

                     <?php if(has_post_thumbnail()) : ?>
                    <div class="fade lg:w-3/4 lg:mx-auto" data-duration="2">
                        <div class="rounded-xl overflow-hidden my-12">
                            <?php
                                the_post_thumbnail( 'medium_large', array(
                                    'class' => 'w-full',
                                ));
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="fade texte-enrichi accroche">
                        <?php
                        the_content();
                        ?>
                    </div>
                </div>


            </div>
        </section>


        <!-- A LIRE AUSSI -->
        <?php 
        $current_article_id = $post->ID;
        // Si l'article a au moins une catégorie, on affiche les articles de la même catégorie
        if($categories){
            $args = array(
                'post_type' => 'actualites',
                'posts_per_page' => 3,
                'post__not_in' => array($current_article_id),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'types_actualites',
                        'field'    => 'slug',
                        'terms'    => $categories[0]->slug,
                    ),
                ),
            );
            $articles = new WP_Query($args);
        // Sinon on affiche les derniers articles
        } else {
            $args = array(
                'post_type' => 'actualites',
                'posts_per_page' => 3,
                'post__not_in' => array($current_article_id),
            );
            $articles = new WP_Query($args);
        }

        // Liste les posts de la requete principale
        $actual_posts = array();
        foreach($articles->posts as $article){
            array_push($actual_posts, $article->ID);
            array_push($actual_posts, $current_article_id);
        }
        
        ?>
        <section class='bg-light-beige py-section-mobile lg:py-section'>
            <div class="container">
                <h2 class="text-2xl font-extrabold text-center"><?php _e('À lire aussi', 'acsep'); ?></h2>
                <ul class="md:grid md:grid-cols-3 md:gap-8 lg:w-3/4 lg:mx-auto">
                    <?php 
                    if($articles->have_posts()){
                        while($articles->have_posts()):
                            $articles->the_post();
                            echo '<li class="mt-8">';
                            get_template_part( '/template-parts/item-actualite' );
                            echo '</li>';
                        endwhile;    
                    }
                    wp_reset_postdata();


                    
                    
                    // On check s'il y a bien 3 posts
                    // sinon on complète la requête avec d'autres articles
                    $remaining_posts = 3 - $articles->found_posts;
                    if($remaining_posts > 0){
                        $args = array(
                            'post_type' => 'actualites',
                            'posts_per_page' => $remaining_posts,
                            'post__not_in' => $actual_posts,
                        );
                        $articles = new WP_Query($args);

                        if($articles->have_posts()){
                            while($articles->have_posts()):
                                $articles->the_post();
                                echo '<li class="mt-8">';
                                get_template_part( '/template-parts/item-actualite' );
                                echo '</li>';
                            endwhile;    
                        }
                        wp_reset_postdata();
                    }


                    ?>
                </ul>
                <div class="text-center mt-8">
                    <a href="<?php echo get_post_type_archive_link( 'actualites' ); ?>" class="btn-primary"><?php _e('Tous nos événements & actus', 'acsep'); ?></a>
                </div>
            </div>
        </section>

        <!-- Contact -->
        <?php 
        get_template_part( 'template-parts/section-contact-sm' );
        ?>
        
    </div>

<?php get_footer(); ?>