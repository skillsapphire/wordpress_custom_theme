<?php
/**Template Name: Listing Page Template*/

get_header();

/**
 * Setup query to show the doctor post type with ‘8’ posts.
 * Output the title with an excerpt.
 */

$args = array(  
    'post_type' => 'doctor',
    'post_status' => 'publish',
    'posts_per_page' => 8, 
    'orderby' => 'title', 
    'order' => 'ASC', 
);
$listingloop = new WP_Query( $args );

    if($listingloop->have_posts()):
        while($listingloop->have_posts()): $listingloop->the_post(); 
?>
    <article class="wpct-post">
    <h1>
      <a href="<?php the_permalink() ?>"><?php the_field('first_name'); the_field('last_name'); ?></a>
    </h1>
    </article>
<?php   endwhile;
        wp_reset_postdata();
    else:
        echo "No listing found";

    endif; 
    wpct_pagination();
get_footer();

?>