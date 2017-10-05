<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

<div id="secondary" class="widget-area" role="complementary">
  <div id="featured_header">
    <div id="featured_icon"><img src="<?php echo get_template_directory_uri(); ?>/images/on_the_spot.png"/></div>
    <h2>Success Stories</h2>
  </div>
  <div id="widget_container">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div>
</div>
<!-- #secondary -->
<?php endif; ?>
