<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="page-title">
                <?php printf(esc_html__('Search Results for: %s', 'luminus'), '<span>' . get_search_query() . '</span>'); ?>
            </h1>
            <div class="search-results">
                <?php if (have_posts()): ?>

                    <?php
                    while (have_posts()):
                        the_post();

                        // Load the appropriate search card template
                        get_template_part('template-parts/cards/search-card', get_post_type());

                    endwhile;

                    // Pagination.
                    echo '<div class="">';
                    echo do_shortcode('[pagination]');
                    echo '</div>';

                else:
                    // If no content, include the "No posts found" template part.
                    get_template_part('template-parts/cards/search-card', 'none');

                endif;
                ?>
            </div>
        </div>
    </div>
</div>