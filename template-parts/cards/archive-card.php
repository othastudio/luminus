<?php
/**
 * Template part for displaying a full card layout.
 *
 * @package luminus
 */
?>
<div id="post-<?php the_ID(); ?>" class="card mb-3">
  <div class="card-body">
    <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    <p class="card-text"><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
  </div>
</div>
