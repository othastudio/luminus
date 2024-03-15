<?php
function generate_social_share_buttons() {
    // Get the current page URL
    $page_url = esc_url(get_permalink());

    // Generate the social media share buttons
    $output = '<div class="social-share-buttons">';
    $output .= '<a class="btn bg-primary" href="https://www.facebook.com/sharer/sharer.php?u=' . $page_url . '" target="_blank" rel="nofollow"> <i class="fa-brands fa-square-facebook me-2"></i>Facebook</a>';
    $output .= '<a class="btn bg-primary" href="https://twitter.com/intent/tweet?url=' . $page_url . '" target="_blank" rel="nofollow"><i class="fa-brands fa-square-x-twitter me-2"></i> Twitter</a>';
    $output .= '<a class="btn bg-primary" href="https://www.linkedin.com/shareArticle?url=' . $page_url . '" target="_blank" rel="nofollow"><i class="fa-brands fa-linkedin me-2"></i> LinkedIn</a>';
    $output .= '<a class="btn bg-primary" href="https://pinterest.com/pin/create/button/?url=' . $page_url . '" target="_blank" rel="nofollow"><i class="fa-brands fa-square-pinterest me-2"></i> Pinterest</a>';
    $output .= '<a class="btn bg-primary" href="https://api.whatsapp.com/send?text=' . $page_url . '" target="_blank" rel="nofollow"><i class="fa-brands fa-square-whatsapp me-2"></i> Whatsapp</a>';
    $output .= '<a class="btn bg-primary" href="mailto:?body=' . $page_url . '"><i class="fa-solid fa-envelope-open-text me-2"></i> Email</a>';
    $output .= '</div>';

    return $output;
}
add_shortcode('social_share_buttons', 'generate_social_share_buttons');
