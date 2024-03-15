<?php
function generate_breadcrumb() {
    $breadcrumb = '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
    $breadcrumb .= '<li class="breadcrumb-item"><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    
    if (is_singular()) {
        $post_id = get_queried_object_id();
        $ancestors = get_ancestors($post_id, 'page');
        $ancestors = array_reverse($ancestors);
        
        foreach ($ancestors as $ancestor) {
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
        }
        
        $breadcrumb .= '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
    } else {
        $breadcrumb .= '<li class="breadcrumb-item active" aria-current="page">' . get_the_archive_title() . '</li>';
    }

    $breadcrumb .= '</ol></nav>';

    return $breadcrumb;
}
add_shortcode('breadcrumb', 'generate_breadcrumb');

