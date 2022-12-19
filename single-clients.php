<?php 
get_header(); 
$content = get_field('success_story_content');

if(get_field('success_story')){
?>

    <div class="page-clients">
        
    
         <!-- Hero -->
         <section class='py-section-mobile lg:py-section relative'>
            <div class="container pt-section-mobile lg:pt-section">
                <div class="lg:w-2/3 lg:mx-auto">

                    <?php 
                    $secteurs = get_the_terms( $post->ID, 'secteurs' );
                    if($secteurs):
                    ?>
                    <div class="fade bg-light-pink inline-block text-pink rounded px-2 py-1 text-sm" data-translate="2"><?= $secteurs[0]->name; ?></div>
                    <?php endif; ?>

                    <h1 class="fade font-extrabold text-2xl lg:text-3xl lg:w-2/3 xxl:w-1/2" data-translate="2" data-delay="0.1">
                        <?php the_title(); ?>
                    </h1>

                    <?php 
                    if(isset($content['introduction'])){
                        echo '<p class="fade text-lg mt-6" data-translate="2" data-delay="0.2">' . $content['introduction'] . '</p>';
                    }
                    ?>
                </div>
            </div>
        </section>
        

        <!-- Citation -->
        <?php 
        $citation = $content['citation'];
        $temoignage = $citation['temoignage'];
        $auteur = $citation['auteur'];
        $poste = $citation['poste'];
        $photo = $citation['photo'];
        $logo = get_field('logo');
        ?>
        <section class='fade bg-light-beige pb-section-mobile lg:py-section relative'>
            <div class="img-container relative w-full h-0 pb-[75%] md:pb-[50%] lg:absolute lg:w-1/2 lg:h-full lg:pb-0 lg:top-0 lg:left-0">
                <?= wp_get_attachment_image($photo, 'large', '', array("class" => "absolute w-full h-full object-cover")); ?>
            </div>
            <div class="container pt-section-mobile lg:grid lg:grid-cols-2 lg:pt-0">
                <div class="lg:col-start-2 lg:w-5/6 lg:ml-auto">
                    <div class="text-3xl font-extrabold text-pink leading-none -mb-3">“</div>
                    <div class="text-pink">
                        <?= $temoignage; ?>
                    </div>
                    <div class="text-right mt-6">
                        <p class="font-extrabold"><?= $auteur; ?></p>
                        <p class="text-sm opacity-50"><?= $poste; ?></p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section Bloc Text -->
        <?php 
        if($content['contenu']):
            foreach($content['contenu'] as $key=>$bloc):
                $title = $bloc['contenu_titre'];
                $texte = $bloc['contenu_texte'];
        ?>
        <section class='<?php if($key === 0){echo 'py-section-mobile lg:py-section';}else{echo 'pb-section-mobile lg:pb-section';} ?>'>
            <div class="container">
                <h2 class="section-title-sm"><?= $title; ?></h2>
                <div class="lg:grid grid-cols-6">
                    <div class="texte-enrichi mt-6 lg:mt-8 lg:col-span-3 lg:col-start-3">
                        <?= $texte; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php 
            endforeach;
        endif; 
        ?>


        <!-- Présentation -->
        <?php 
        if($content['presentation_de_la_societe']):
        ?>
        <section class='pb-section-mobile lg:pb-section'>
            <div class="container">
                <div class="border-t border-gray pt-6 lg:w-2/3 lg:mx-auto">
                    <div class="italic opacity-50"><?= $content['presentation_de_la_societe']; ?></div>
                </div>
            </div>
        </section>
        <?php endif; ?>


        <!-- Contact -->
        <?php 
        get_template_part( 'template-parts/section-contact-sm' );
        ?>

    </div>

<?php 
} else {
?>
    
    <div class="page-clients">
        
        <!-- Hero -->
        <section class='py-section-mobile lg:py-section relative'>
           <div class="container pt-section-mobile lg:pt-section">
               <div class="lg:w-2/3 lg:mx-auto">
                   <?php 
                   $secteurs = get_the_terms( $post->ID, 'secteurs' );
                   if($secteurs):
                   ?>
                   <div class="bg-light-pink inline-block text-pink rounded px-2 py-1 text-sm"><?= $secteurs[0]->name; ?></div>
                   <?php endif; ?>

                   <h1 class="font-extrabold text-2xl lg:text-3xl lg:w-2/3 xxl:w-1/2">
                       <?php the_title(); ?>
                   </h1>
               </div>
           </div>
       </section>

    </div>

<?php
}
get_footer(); ?>