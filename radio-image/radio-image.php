<?php

/**
 * Create a Radio Image control
 */
class Theme_Slug_Customize_Radio_Image_Control extends WP_Customize_Control {

  /**
   * Declare the control type.
   *
   * @access public
   * @var string
   */
  public $type = 'radio-image';

  /**
   * Render the control to be displayed in the Customizer.
   */
  public function render_content() {

    if ( empty( $this->choices ) )
      return;

    $name = '_customize-radio-' . $this->id;
    ?>

      <?php if ( ! empty( $this->label ) ) : ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <?php endif;
      if ( ! empty( $this->description ) ) : ?>
        <span class="description customize-control-description"><?php echo $this->description; ?></span>
      <?php endif; ?>

      <?php
      foreach ( $this->choices as $value => $label ) :
        ?>
        <label>
          <input type="radio" value="<?php echo esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> class="custom-radio-image" name="<?php echo esc_attr( $name ); ?>"/>
            <span><img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" /></span>
        </label>
        <?php
      endforeach;
       ?>


    <?php
  }

}

if ( ! function_exists( 'theme_slug_radio_image_control_css' ) ) {

  /**
   * Add CSS for radio image control
   */
  function theme_slug_radio_image_control_css(){
    ?>
    <style>
      input.custom-radio-image {
        display: none;
      }
      input.custom-radio-image + span {
        margin-right: 10px;
        display: inline-flex;
        padding: 2px!important;
        width: auto;
        height: auto;
        overflow: hidden;
        border: 2px solid #FFFFFF;
      }
      input.custom-radio-image:checked + span {
        border: 2px solid #777777;
      }
      </style>
    <?php
  }

}
add_action( 'customize_controls_print_styles', 'theme_slug_radio_image_control_css' );
