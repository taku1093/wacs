$(function(){
  $('.follow_button').on('click', function(event){
      event.preventDefault();
      $(this).toggleClass('active');
  });
});

$(function(){
  $(".more").on("click", function() {
    $(this).toggleClass("on-click");
    $(".txt-hide").slideToggle(1000);
  });
}); 