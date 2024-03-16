<?php
function generate_pagination() {
    global $wp_query;
    $output = '';
    $big = 999999999; // need an unlikely integer

    $paginate_links = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('Previous', 'textdomain'),
        'next_text' => __('Next', 'textdomain'),
        'type' => 'array',
        'end_size' => 2,
        'mid_size' => 2,
    ));

    $pagination_array = array();
    if ($paginate_links) {
        foreach ($paginate_links as $link) {
            // Get the page number from the link
            preg_match('/<a\s+(?:[^>]*?\s+)?href=([\'"])(.*?)\1/', $link, $matches);
            $page_number = isset($matches[2]) ? $matches[2] : '';

            // Store the page number and its corresponding link in the array
            $pagination_array[] = array(
                'page_number' => $page_number,
                'link' => $link
            );
        }
    }

    if ($pagination_array) {
        $output .= '<nav aria-label="...">';
        $output .= '<ul class="pagination">';
        
        foreach ($pagination_array as $pagination_item) {
            $output .= '<li class="page-item' . ($pagination_item['page_number'] == get_query_var('paged') ? ' active' : '') . '">';
            $output .=  '<a class="page-link" href="#">'.$pagination_item['link'].'</a>';
            $output .= '</li>';
        }
        $output .= '</ul>';
        $output .= '</nav>';
    }

    return $output;
}
add_shortcode('pagination', 'generate_pagination');


