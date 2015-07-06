<?php

/**
 * Create a Dropdown Menus control
 */
class Theme_Slug_Customize_Dropdown_Menus_Control extends WP_Customize_Control {

  /**
   * Declare the control type.
   *
   * @access public
   * @var string
   */
  public $type = 'dropdown-menus';

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

    $all_menus = wp_get_nav_menus();
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
           printf('<option value="%s" %s>%s</option>', 0, selected($this->value(), 0, false), ' ' );
          ?>
         <?php if ( ! empty( $all_menus ) ): ?>
           <?php foreach ( $all_menus as $key => $menu ): ?>
             <?php
               printf('<option value="%s" %s>%s</option>', $menu->term_id, selected($this->value(), $menu->term_id, false), $menu->name );
              ?>
           <?php endforeach ?>
        <?php endif ?>
      </select>
    </label>
    <?php
  }

}
