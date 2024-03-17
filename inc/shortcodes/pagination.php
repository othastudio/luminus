<?php
function generate_pagination() {
    global $wp_query;

    $big = 999999999; // An unlikely integer

    $paginate_links = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_next' => false
    ));
    if(!$paginate_links){
        return;
    }
    ob_start();
    ?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="<?php echo esc_url(get_pagenum_link(get_query_var('paged') - 1)); ?>" aria-label="Previous">
                    <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                    <span class="visually-hidden">Previous</span>
                </a>
            </li>
            <?php if ($paginate_links) :
                foreach ($paginate_links as $page_link) :
                    // Check if this page link is the current page represented by a span element with class 'current'
                    $is_current_page_span = strpos($page_link, 'aria-current="page"') !== false && strpos($page_link, 'current') !== false;
                
                    // Check if this page link is the current page not represented by a span element with class 'current'
                    $is_current_page = strpos($page_link, 'current') !== false;
                
                    // Add 'active' class if this is the current page
                    $page_link_with_class = '';
                    if ($is_current_page_span) {
                        // Replace the span element with a link element with the 'active' class
                        $page_link_with_class = str_replace('<span', '<a class="page-link active"', $page_link);
                        $page_link_with_class = str_replace('</span>', '</a>', $page_link_with_class);
                    } elseif ($is_current_page) {
                        // Add 'active' class to the existing link
                        $page_link_with_class = str_replace('<a class="page-numbers"', '<a class="page-link active"', $page_link);
                    } else {
                        // Regular link without 'active' class
                        $page_link_with_class = str_replace('<a class="page-numbers"', '<a class="page-link"', $page_link);
                    }
                
                    // Output the pagination link
                    ?>
                    <li class="page-item <?=  $is_current_page ? 'active' : '' ?>"><?php echo $page_link_with_class; ?></li>
                <?php endforeach;
            endif; ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo esc_url(get_pagenum_link(get_query_var('paged') + 1)); ?>" aria-label="Next">
                    <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php
    return ob_get_clean();
}
add_shortcode('pagination', 'generate_pagination');



