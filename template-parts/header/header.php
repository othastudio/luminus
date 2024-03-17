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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?= luminus_site_logo() . bloginfo('name') ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?= luminus_display_header_menu(); ?>
      </ul>
      <form class="d-flex search-form"  role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" class="form-control me-2" aria-label="Search" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'luminus' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button class="btn btn-outline-dark" type="submit" class="search-submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>