<?php

/**
 * Create a Taxonomies Dropdown control
 */
class Theme_Slug_Customize_Taxonomies_Dropdown_Control extends WP_Customize_Control {

  /**
   * Declare the control type.
   *
   * @access public
   * @var string
   */
  public $type = 'dropdown-taxonomies';

  /**
   * Custom arguments to pass into `wp_dropdown_categories()`.
   *
   * @access public
   * @var array
   */
  public $args = array();

  /**
   * Render the control to be displayed in the Customizer.
   */
  public function render_content() {

    $default_args = array(
      'show_option_none'  => ' ',
      'option_none_value' => '0',
      'taxonomy'          => 'category',
    );
    $args = wp_parse_args( $this->args, $default_args );

    $args['name']         = '_customize-dropdown-taxonomy-' . $this->id;
    $args['selected']     = $this->value();
    $args['echo']         = false;
    ?>

    <label>
      <?php if ( ! empty( $this->label ) ) : ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <?php endif;
      if ( ! empty( $this->description ) ) : ?>
        <span class="description customize-control-description"><?php echo $this->description; ?></span>
      <?php endif; ?>
      <?php echo str_replace( '<select', '<select ' . $this->get_link(), wp_dropdown_categories( $args ) ); ?>
    </label>

    <?php
  }

}
