( function( $ ) {

  $(document).ready(function(){

    jQuery( '.customize-control-numeric-slider input[type=range]' ).change( function(){
      var $this = $(this);
      $this.siblings( '.range-value' ).text( $this.val() );
    });

  });

} )( jQuery );
