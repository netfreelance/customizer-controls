<?php

/**
 * Create a Dropdown Menu Locations control
 */
class Theme_Slug_Customize_Dropdown_Menu_Locations_Control extends WP_Customize_Control {

  /**
   * Declare the control type.
   *
   * @access public
   * @var string
   */
  public $type = 'dropdown-menu-locations';

  /**
   * Render the control to be displayed in the Customizer.
   */
  public function render_content() {

    $all_menu_locations = get_registered_nav_menus();
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
         <?php if ( ! empty( $all_menu_locations ) ): ?>
           <?php foreach ( $all_menu_locations as $key => $location ): ?>
             <?php
               printf( '<option value="%s" %s>%s</option>', esc_attr( $key ), selected( $this->value(), $key, false ), esc_html( $location ) );
              ?>
           <?php endforeach ?>
        <?php endif ?>
      </select>
    </label>

    <?php
  }

}
