<?php 
get_header(); 
$term = $wp_query->queried_object;
?>

    <div class="page-actualites">
        
        <?php 

        $args = array(
            'slug' => $term->slug,
        );

        get_template_part('/template-parts/page-articles', '', $args); 

        ?>
        
    </div>

<?php get_footer(); ?>