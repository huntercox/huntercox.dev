(function($) {
  
  /**
   * HEADER
   */ 
    // Hamburger menu
    $('.hamburger--squeeze').on('click', function() {
      $(this).toggleClass('is-active');
      $(this).next('.main-navigation').slideToggle();
    })
  
  
  /**
   * PROJECTS page
   */
    $('.toggler').on('click', function() {
      $(this).next('.toggle-target').slideToggle();
    });

      
  })( jQuery );