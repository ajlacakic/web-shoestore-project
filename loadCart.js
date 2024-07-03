var token = localStorage.getItem("user") ? JSON.parse(localStorage.getItem("user")).token : null;
$(document).ready(function() {
    
    
    
    $.ajax({
        type: 'POST',
        url: 'php/load_cart.php', 
        headers: {
            "Authentication": token
        },
        success: function(response) {
            console.log('Response from server:', response); 

            
            var responseData = JSON.parse(response);
            console.log('Response from server:', responseData.cart_items); 

            if (responseData && responseData.cart_items && responseData.cart_items.length > 0) {
                displayCart(responseData.cart_items);
            } else {
                console.error('No items found in the cart.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching cart items:', error);
        }
    });
});

function displayCart(cartItems) {
    var subtotal = 0;

    $.each(cartItems, function(index, item) {
        var imagesHtml = "<img src='" + item.image_url1 + "' alt='Product Image'>";

        var row = "<tr>" +
            "<td>" +
            "<div class='cart-info'>" +
            imagesHtml +
            "<div>" +
            "<p>" + item.name + "</p>" +
            "<small>$" + item.price + "</small><br>" +
            "<button class='remove-from-cart' data-shoe-id='" + item.shoe_id + "'>Remove</button>" +
            "</div></div></td>" +
            "<td><input type='number' value='" + item.quantity + "' min='1'></td>" +
            "<td>$" + item.price + "</td>" +
           // "<td>$" + (item.price * item.quantity).toFixed(2) + "</td>" +
            "</tr>";
        $("#cart-items").append(row);

        subtotal += item.price * item.quantity; 
    });

    $("#subtotal").text("$" + subtotal.toFixed(2)); 

    
    $(".remove-from-cart").click(function(event) {
        event.preventDefault(); 

       
        var shoeId = $(this).data('shoe-id');
        console.log("item id to be deleted", shoeId)

       
        if (!shoeId) {
            console.error("Shoe ID is missing or invalid!");
            return; 
        }
        $.ajax({
            type: 'POST',
            url: 'php/remove_from_cart.php',
            headers: {
                "Authentication": token
            }, 
            data: { shoe_id: shoeId }, 
            success: function(response) {
                console.log('Item removed from cart successfully.');
                loadCartItems();
               
            },
            error: function(xhr, status, error) {
                console.error('Error removing item from cart:', error);
            }
        });
    });
}
