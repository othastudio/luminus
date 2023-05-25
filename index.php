<?php
/**
 * The main template file
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();

        // Display the post content
        the_content();

        // If comments are open or there are comments, display the comment section
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    endwhile;
else :
    // If no posts are found, display a message
    echo '<p>' . esc_html__( 'No posts found.', 'my-minimal-theme' ) . '</p>';
endif;

get_footer();