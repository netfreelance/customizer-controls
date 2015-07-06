<?php

/**
 * Create a Dropdown Sidebars control
 */
class Theme_Slug_Customize_Dropdown_Sidebars_Control extends WP_Customize_Control {

  /**
   * Declare the control type.
   *
   * @access public
   * @var string
   */
  public $type = 'dropdown-sidebars';

  /**
   * Render the control to be displayed in the Customizer.
   */
  public function render_content() {

    global $wp_registered_sidebars;

    $all_sidebars = $wp_registered_sidebars;
    ?>

    <label>
      <?php if ( ! empty( $this->label ) ) : ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <?php endif;
      if ( ! empty( $this->description ) ) : ?>
        <span class="description customize-control-description"><?php echo $this->description; ?></span>
      <?php endif; ?>
      <select <?php echo $this->link(); ?>>
         <?php
           printf( '<option value="%s" %s>%s</option>', '', selected( $this->value(), '', false ), ' ' );
          ?>
         <?php if ( ! empty( $all_sidebars ) ): ?>
           <?php foreach ( $all_sidebars as $key => $sidebar ): ?>
             <?php
               printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), selected( $this->value(), $key, false ), esc_html( $sidebar['name'] ) );
              ?>
           <?php endforeach ?>
        <?php endif ?>
      </select>
    </label>

    <?php
  }

}
