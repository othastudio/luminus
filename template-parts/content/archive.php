<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="page-title">
                <?php
                // Check if this is a category archive
                if (is_category()) {
                    single_cat_title();
                }
                // Check if this is a tag archive
                elseif (is_tag()) {
                    single_tag_title();
                }
                // Check if this is a author archive
                elseif (is_author()) {
                    the_post();
                    echo 'Author Archives: ' . get_the_author();
                    rewind_posts();
                }
                // Check if this is a date archive
                elseif (is_date()) {
                    if (is_day()) {
                        echo 'Daily Archives: ' . get_the_date();
                    } elseif (is_month()) {
                        echo 'Monthly Archives: ' . get_the_date('F Y');
                    } elseif (is_year()) {
                        echo 'Yearly Archives: ' . get_the_date('Y');
                    }
                }
                // Check if this is a custom post type archive
                elseif (is_post_type_archive()) {
                    post_type_archive_title();
                }
                // Check if this is a custom taxonomy archive
                elseif (is_tax()) {
                    single_term_title();
                }
                // Default fallback for other archive types
                else {
                    echo 'Archives';
                }
                ?>
            </h1>
            <div class="archive-results">
                <div class="row">
                <?php if (have_posts()) : ?>
                    <?php
                    while (have_posts()) :
                        the_post();

                        get_template_part('template-parts/cards/archive-card', get_post_type());

                    endwhile;

                    // Pagination.
                    echo '<div class="">';
                    echo do_shortcode('[pagination]');
                    echo '</div>';

                else :
                    // If no content, include the "No posts found" template part.
                    get_template_part('template-parts/cards/archive-card', 'none');

                endif;
                ?>
                </div>
            </div>
        </div>
    </div>
</div>