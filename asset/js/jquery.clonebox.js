(function($) {
	$.fn.clonebox = function() {

      var i = 0;
      $('document').ready(function () {

        $('#form').append('<a style=" border:1px solid; margin-right:5px; padding:5px; font-size:12px;" class="remove" href="#">Remove </a>');
        $('#form').append('<a style="border:1px solid; padding:5px;font-size:12px;" class="clickme" href="#">Add  </a>');
        
          $('.remove').click(function () {
           
            i--;
            $(this).closest('#form').remove();

          });
  
        $('.clickme').click(function () {
          if (i < 5) {
            i++;
            $("#form").last().clone(true, true).appendTo("body");
          } else {
            $("#form")
          }
        });
      });
    

	}
})(jQuery);


