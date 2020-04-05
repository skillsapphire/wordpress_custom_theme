<?php
get_header();

    if(have_posts()):
        while(have_posts()): the_post(); 
?>
    <article class="wpct-post">
    <h1>
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h1>
    <p><?php the_content(); ?></p>
    </article>
<?php   endwhile;
    else:
        echo "No posts found";

    endif;
    wpct_pagination();
get_footer();
?>

    