<?php

/**Template Name: Custom Page Template*/

get_header();

    if(have_posts()):
        while(have_posts()): the_post(); 
?>
    <article class="wpct-post">
    <h1>
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h1>
    <?php the_content(); ?>
    </article>
<?php   endwhile;
    else:
        echo "No page found";

    endif;
    wpct_pagination();
get_footer();
?>

    