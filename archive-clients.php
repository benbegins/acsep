<?php 
get_header(); 
?>

    <div class="page-clients">
        
    
         <!-- Hero -->
         <section class='pt-section-mobile lg:pt-section relative'>
            <div class="container pt-section-mobile lg:pt-section lg:text-center">
                <h1 class="fade font-extrabold text-xl sm:text-2xl lg:text-3xl" data-translate="2">
                    <?php _e('Nos références', 'acsep') ?>
                </h1>
                <p class="fade" data-translate="2" data-delay="0.1"><?php _e('Nous accompagnons plus de 150 entreprises de tous les secteurs', 'acsep'); ?></p>
            </div>
        </section>

        
        <!-- Liste clients -->
        <section class='fade py-section-mobile lg:py-section' data-delay="0.5">
            <div class="container">
                <?php 
                global $wp_query;
                $clients = $wp_query->posts;
                // var_dump($clients);

                $secteurs = get_terms(array(
                    'taxonomy'      => 'secteurs',
                    // 'hide_empty'    => false,
                ));

                foreach ($secteurs as $secteur):
                    $secteur_name = $secteur->name;
                    $secteur_slug = $secteur->slug;
                ?>

                <h2 class="text-lg lg:text-xl font-extrabold uppercase border-b-8 border-pink leading-none py-3"><?= $secteur_name; ?></h2>
                <ul class="mt-6 pb-section-mobile md:grid md:grid-cols-2">
                    <?php 
                    foreach($clients as $client):
                        $client_secteur = get_the_terms( $client, 'secteurs' );
                        $client_name = $client->post_title;
                        $client_link = get_permalink( $client->ID );
                        $success_story = get_field('success_story', $client->ID);

                        if($client_secteur):
                            if($client_secteur[0]->slug === $secteur_slug):
                    ?>

                    <li class="uppercase py-1">
                        <?php 
                        if($success_story){
                            echo '<a href="' . $client_link . '" class="btn-liste text-pink">' . $client_name . '</a>';
                        } else {
                            echo $client_name;
                        }
                        ?>
                    </li>

                    <?php  
                            endif;
                        endif;
                    endforeach;
                    ?>
                </ul>

                <?php 
                endforeach; 
                ?>
            </div>
        </section>
    </div>

<?php get_footer(); ?>