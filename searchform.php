<?php
/**
 * The template for displaying search forms in britstrap
 *
 * @package britstrap
 */
?>
<form role="search" method="get" class="search-form navbar-form navbar-left" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
    <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'britstrap' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'britstrap' ); ?>">
  </div>
  <button type="submit" class="search-submit btn btn-default"><?php echo esc_attr_x( 'Search', 'submit button', 'britstrap' ); ?></button>
</form>
