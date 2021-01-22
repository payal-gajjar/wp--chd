jQuery(document).ready(function($) {

    // Main Navigation
    $( '.hamburger-menu' ).on( 'click', function() {
        $(this).toggleClass('open');
        $('.site-navigation').toggleClass('show');
    });

    //  Client Slider
    $('.logo-slider').slick({
      slidesToShow: 6,
      infinite: true,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      dots: false,
      prevArrow: false,
      nextArrow: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2
          }
        }
      ]
    });

   
// load more portfolio 
   $(".loadmores").click(function(){ 
    var currClass = $(this).attr('class');   
    var offset = $(this).attr('data-offset');     
    jQuery.ajax({
        url: object.ajax_url,
        type: 'POST',     
        data: {'action':'get_list_data','offset' : offset},
        success: function(response) {
          var response = JSON.parse(response);
          if (response.count == 0) {  
          $('.loadmores').attr('data-offset', 4);       
            $('.loadmores').hide();              
          } else {
            $('.loadmores').show();
          }
          if (currClass == 'loadmores') {
            $('.more-list-blocks').append(response.html);
            $('.loadmores').attr('data-offset', 4 + parseInt(offset));
          } else {
            $('.more-list-blocks').html(response.html); 
            $('.loadmores').attr('data-offset', 4);         
          }
        },       
    });
  });
  
	
});