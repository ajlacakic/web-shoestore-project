var token = localStorage.getItem("user") ? JSON.parse(localStorage.getItem("user")).token : null;
$(document).ready(function() {
   
    $.ajax({
        type: 'POST',
        url: 'php/load_favorite.php', 
        headers: {
            "Authorization": token
        },
        success: function(response) {
            console.log('Response from server:', response); 

           
            var responseData = JSON.parse(response);
            console.log('Response from server:', responseData.shoes); 

            if (responseData && responseData.shoes && responseData.shoes.length > 0) {
                displayFavorites(responseData.shoes);
            } else {
                console.error('No favorites found for the user.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching favorites:', error);
        }
    });
});


function displayFavorites(shoes) {
    var subtotal = 0;

    $.each(shoes, function(index, shoe) {
        var imagesHtml = "<img src='" + shoe.image_url1 + "' alt='Product Image'>";
        

        var row = "<tr>" +
            "<td>" +
            "<div class='cart-info'>" +
            imagesHtml +
            "<div>" +
            "<p>" + shoe.name + "</p>" +
            "<small>$" + shoe.price + "</small><br>" +
            "<a class='remove-favorite' data-shoe-id='" + shoe.shoe_id + "'>Remove</a>" +
            "</div></div></td>" +
            "<td><input type='number' value='1' min='1'></td>" +
            "<td>$" + shoe.price + "</td>" +
            "</tr>";
        $("#cart-items").append(row);

        subtotal += parseFloat(shoe.price); 
    });

    $("#subtotal").text("$" + subtotal.toFixed(2)); 

   
    $(".remove-favorite").click(function(event) {
        event.preventDefault(); 
        
        var shoeId = $(this).data('shoe-id');

        
        $.ajax({
            type: 'POST',
            url: 'php/remove_favorite.php', 
            data: { shoe_id: shoeId },
            headers: {
                "Authentication": token
            }, 
            success: function(response) {
                console.log('Favorite removed successfully.');
                
            },
            error: function(xhr, status, error) {
                console.error('Error removing favorite:', error);
            }
        });
    });
}
