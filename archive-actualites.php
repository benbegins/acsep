<?php 
get_header(); 
?>

    <div class="page-actualites">
        
    
        <?php 
        

        $args = array(
            'slug' => '',
        );

        get_template_part('/template-parts/page-articles', '', $args); 
        
        ?>

        
    </div>

<?php get_footer(); ?>