<?php
/**Template Name: Listing Page Template*/

get_header();

/**
 * Setup query to show the ‘services’ post type with ‘8’ posts.
 * Output the title with an excerpt.
 */
$args = array(  
    'post_type' => 'doctor',
    'post_status' => 'publish',
    'posts_per_page' => 8, 
    'orderby' => 'title', 
    'order' => 'ASC', 
);
$loop = new WP_Query( $args );

    if($loop->have_posts()):
        while(have_posts()): $loop->the_post(); 
?>
    <article class="wpct-post">
    <h1>
      <a href="<?php the_permalink() ?>"><?php the_field('first_name'); the_field('last_name'); ?></a>
    </h1>
    </article>
<?php   endwhile;
    else:
        echo "No listing found";

    endif;
    wpct_pagination();
get_footer();

?>