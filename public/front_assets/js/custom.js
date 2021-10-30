//add to cart code
$(document).ready(function () {
  $('.add_cart').click(function (e) {
    // alert("Hello Add To Cart");
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var product_id = $(this).closest('.product_data').find('.product_id').val();
    var quantity = $(this).closest('.product_data').find('.qty_input').val();

    // alert(product_id);

    $.ajax({
      url:"/add_cart",
      method:"POST",
      data: {
        'product_id':product_id,
        'quantity' : quantity,
      },
      success: function(response){
        alertfy.set('notifyer','position','top-right');
        alertfy.success(response.status);
      },
    });

  });
});