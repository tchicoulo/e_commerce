// AJAX CODE FOR CART UPDATE
//Ajouter un produit au panier
// $(".form-product").submit(function(e){ //user clicks form submit button
//     var form_data = $(this).serialize(); //prepare form data for Ajax post
//     var button_content = $(this).find('button[type=submit]'); //get clicked button info
//     button_content.html('Ajout...'); //Loading button text //change button text
//
//     $.ajax({ //make ajax request to cart_process.php
//         url: "../controllers/cart.php",
//         type: "POST",
//         dataType:"json", //expect json value from server
//         data: form_data
//     }).done(function(data){ //on Ajax success
//         $("#essenceCartBtn").html(data.items); //total items count fetch in cart-info element
//         button_content.html('Ajouter au panier'); //reset button text to original text
//         alert("Article ajouté au panier!"); //alert user
//         //if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
//             //$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
//         //}
//     })
//     e.preventDefault();
// });
//
// //Show Items in Cart
// $( ".cart-button").click(function(e) { //when user clicks on cart box
//     e.preventDefault();
//     $(".shopping-cart-box").fadeIn(); //display cart box
//     $("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
//     $("#shopping-cart-results" ).load( "../controllers/cart.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
// });


