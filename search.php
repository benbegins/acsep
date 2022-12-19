<?php 
get_header(); 

$args = array(
    'post_type' => array('services', 'solutions', 'actualites'),
    'posts_per_page' => -1,
    "s" => get_search_query(),

);
$search_results = new WP_Query($args);

$resultats = $search_results->posts;
?>

    <div class="page-texte">

        <section class='py-section-mobile lg:py-section'>
            <div class="container pt-section-mobile lg:pt-section">
                <div class="lg:w-2/3 lg:mx-auto">
                    <form action="/" method="get" class="form-search">
                        <div class="input-container"><input type="text" placeholder="" name="s" value="<?php the_search_query(); ?>" /></div>
                        <div class="submit-container"><input type="submit" value="Rechercher"></div>
                    </form>
                    <?php 
                    $count = count($resultats);
                    ?>
                    <p class="text-2xl font-extrabold mt-6">
                        <?php 
                        echo $count . ' ';
                        if($count < 2){
                            echo __('résultat pour', 'acsep');
                        } else {
                            echo __('résultats pour', 'acsep');
                        }
                        echo ' "' . get_search_query() . '"';
                        ?>
                    </p>
                </div>
            </div>
        </section>
        
        <?php 
        



        $services = array();
        $solutions = array();
        $actualites = array();

        foreach ($resultats as $resultat){
            switch ($resultat->post_type){
                case 'services':
                    array_push($services, $resultat);
                    break;
                case 'solutions':
                    array_push($solutions, $resultat);
                    break;
                case 'actualites':
                    array_push($actualites, $resultat);
                    break;
            }
        }

        if($resultats): 
        ?>
        <section class='pb-section-mobile lg:pb-section relative'>
            <div class="container">
                <div class="lg:w-2/3 lg:mx-auto divide-y divide-gray">
                    
                    <?php if($services): ?>
                    <div class="mt-12 pt-12 lg:flex lg:mt-0">
                        <div class="lg:w-1/4">
                            <h2 class="text-xl font-extrabold mb-6"><?php _e('Services', 'acsep'); ?></h2>
                        </div>
                        <ul class="lg:w-3/4">
                            <?php
                            foreach($services as $service):
                                $title = $service->post_title;
                                $link = get_permalink( $service->ID );
                                $description = get_field('description', $service->ID);
                            ?>
                            <li class="mb-6 lg:mb-12">
                                <h3 class="text-lg font-extrabold text-pink hover:text-dark"><a href="<?= $link; ?>"><?= $title; ?></a></h3>
                                <p><?= $description; ?></p>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    
                    <?php if($solutions): ?>
                    <div class="mt-12 pt-12 lg:flex lg:mt-0">
                        <div class="lg:w-1/4">
                            <h2 class="text-xl font-extrabold mb-6"><?php _e('Solutions', 'acsep'); ?></h2>
                        </div>
                        <ul class="lg:w-3/4">
                            <?php
                            foreach($solutions as $solution):
                                $title = $solution->post_title;
                                $link = get_permalink( $solution->ID );
                                $description = get_field('description', $solution->ID);
                            ?>
                            <li class="mb-6 lg:mb-12">
                                <h3 class="text-lg font-extrabold text-pink hover:text-dark"><a href="<?= $link; ?>"><?= $title; ?></a></h3>
                                <p><?= $description; ?></p>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                    
                    <?php if($actualites): ?>
                    <div class="mt-12 pt-12 lg:flex lg:mt-0">
                        <div class="lg:w-1/4">
                            <h2 class="text-xl font-extrabold mb-6"><?php _e('Articles', 'acsep'); ?></h2>
                        </div>
                        <ul class="lg:w-3/4">
                            <?php
                            foreach($actualites as $actualite):
                                $title = $actualite->post_title;
                                $link = get_permalink( $actualite->ID );
                                $description = get_the_excerpt( $actualite->ID );
                            ?>
                            <li class="mb-6 lg:mb-12">
                                <h3 class="text-lg font-extrabold text-pink hover:text-dark"><a href="<?= $link; ?>"><?= $title; ?></a></h3>
                                <p><?= $description; ?></p>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </section>

        <?php else: ?>
        <section class='pb-section-mobile lg:pb-section relative'>
            <div class="container">
                <div class="lg:w-2/3 lg:mx-auto">
                    <p><?php _e('Désolé, mais rien ne correspond à vos termes de recherche. Veuillez réessayer avec d’autres mots-clés.', 'acsep'); ?></p>
                    <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-primary mt-6"><?php _e('Parlez à un expert', 'acsep'); ?></a>
                </div>
            </div>
        </section>


        <?php endif; ?>
        <!-- Contact -->
        <?php 
        get_template_part( 'template-parts/section-contact-sm' );
        ?>
        
    </div>

<?php get_footer(); ?>