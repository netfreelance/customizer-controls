<?php

/**
 * Customize Control for Radio Image
 */
class NS_Customize_Radio_Image_Control extends WP_Customize_Control {

  public $type = 'radio-image';

  public function render_content() {

    if ( empty( $this->choices ) )
      return;

    $name = '_customize-radio-' . $this->id;

    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

      <?php
      foreach ( $this->choices as $value => $label ) :
        ?>
        <label>
          <input type="radio" value="<?php echo esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> class="stylish-radio-image" name="<?php echo esc_attr( $name ); ?>"/>
            <span><img src="<?php echo esc_url($label); ?>" alt="<?php echo esc_attr( $value ); ?>" /></span>
        </label>
        <?php
      endforeach;
       ?>

    </label>
    <?php
  }

}
