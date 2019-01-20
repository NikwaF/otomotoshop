$(document).ready(function(){
  function sihiy(searchvalue) {
    $("#search").val(searchvalue);
    $("#listsearch").empty();
  }

  $("#search").on('keyup', function(){
    var tosearchval = $("#search").val();
    if (tosearchval == ''){
      $("#listsearch").empty();
    } else {
      $.ajax({
        url: 'http://localhost/otomotoshop/home/search',
        type: 'POST',
        data: {searchval: tosearchval},
        success : function(res) {
          $("#listsearch").html(res);
        }
      });
    }
  });

  $("#addtocart").click(function() {
    var id_products = $("#id_products").val();
    var nama_products = $("#nama_products").val();
    var harga_products = $("#harga_products").val();
    var quantity = $("#quantity").val();
    var gambar = $("#gambar_products").val();

    $.ajax({
      url: "http://localhost/otomotoshop/home/add_cart",
      type: "POST",
      data: {
        id_products: id_products,
        nama_products: nama_products,
        harga_products: harga_products,
        quantity: quantity,
        gambar: gambar
      }, 
      success: function(res){
        console.log(res);
        $("#jmlcart").html(res);
//        console.log(res);
//        console.log('nama product :'+nama_products+' harganya :' +harga_products+' idnya :'+ id_products+' quantity : '+quantity);
        console.log(res);
      }
    });
  });
});
