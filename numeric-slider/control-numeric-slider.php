<?php

/**
 * Create a Dropdown Menus control
 */
class Theme_Slug_Customize_Numeric_Slider_Control extends WP_Customize_Control {

  /**
   * Declare the control type.
   *
   * @access public
   * @var string
   */
  public $type = 'numeric-slider';

  /**
   * Load scripts and styles.
   */
  public function enqueue() {

    wp_register_script( 'numeric-slider-control', get_template_directory_uri() . '/inc/customizer-controls/numeric-slider/numeric-slider.js', array( 'jquery', 'customize-controls' ) );
    wp_enqueue_script( 'numeric-slider-control' );

  }

  /**
   * Render the control to be displayed in the Customizer.
   */
  public function render_content() {

    $this->input_attrs = wp_parse_args(
      $this->input_attrs,
      array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
      )
    );
    ?>
    <label>
      <?php if ( ! empty( $this->label ) ) : ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <?php endif;
      if ( ! empty( $this->description ) ) : ?>
        <span class="description customize-control-description"><?php echo $this->description; ?></span>
      <?php endif; ?>
      <span class="range-min"><?php echo esc_attr( $this->input_attrs['min'] ); ?></span>
      <input type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
      <span class="range-max"><?php echo esc_attr( $this->input_attrs['max'] ); ?></span>
      <span class="range-value" style="font-weight:bold;border:1px #555 solid; padding:1px 3px;margin-left:10px;"><?php echo esc_attr( $this->value() ); ?></span>
    </label>
    <?php
  }

}
