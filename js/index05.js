// Document ready
$(function(){

  $(".js-increase-cart").on("click", function(e){
    let cart_amount = $(".cart-amount").html();
    $(".cart-amount").html(++cart_amount);
  })

})






    

    