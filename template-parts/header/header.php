<?php
function luminus_site_logo()
{
    $logo = get_theme_mod('custom_logo');
    $logo_url = wp_get_attachment_image_url($logo, 'full');

    if (!empty($logo_url)) {
        echo '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '" width="30" height="24" class="d-inline-block align-text-top">';
    }
    
}
?>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <?= luminus_site_logo() . bloginfo('name') ?>
    </a>
  </div>
</nav>