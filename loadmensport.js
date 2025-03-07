var token = localStorage.getItem("user") ? JSON.parse(localStorage.getItem("user")).token : null;
console.log('LOADING');



if (!window.productListMen) {
    var productListMen = document.getElementById('productListMen');
}


if (productListMen) {
    productListMen.innerHTML = '';
}
if (!window.productListMen2) {
    var productListMen2 = document.getElementById('productListMen2');
}

// Check if productList exists and reset its value if needed
if (productListMen2) {
    productListMen2.innerHTML = ''; // Clear the content inside productList
}



$.ajax({
    url: 'php/load_menshoes.php',
    type: 'GET',
    dataType: 'json',
    headers: {
        'Authorization': token 
    },
    success: function(data) {
        if (data && data.shoes && data.shoes.length > 0) {
            data.shoes.forEach(shoe => {
                console.log('Sizes:', shoe.size); 
                const shoeDiv = document.createElement('div');
                shoeDiv.classList.add('col-md-3', 'col-sm-6', 'mb-4');

                shoeDiv.innerHTML = `
                    <div class="product-grid3">
                        <div class="product-image3">
                            <a href="item.html?id=${shoe.shoe_id}">
                                <img class="pic-1" src="${shoe.image_url1}">
                                <img class="pic-2" src="${shoe.image_url2}">
                            </a>
                            <button class="btn social addToFavBtn" 
                                type="button" data-item-id="${shoe.shoe_id}">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">${shoe.name}</a></h3>
                            <div class="price">
                                $${parseFloat(shoe.price).toFixed(2)}
                            </div>
                            <div class="sizes">
                                Sizes: ${getSizes(shoe.size)}
                            </div>
                        </div>
                    </div>
                `;
                productListMen.appendChild(shoeDiv);
            });
        } else {
            console.error('No shoe data found or invalid data format.');
        }
        
        productListMen.addEventListener('click', function(event) {
            if (event.target.classList.contains('addToFavBtn')) {
                const itemId = event.target.getAttribute('data-item-id');
                const selectedItem = data.shoes.find(item => item.shoe_id == itemId);
                if (selectedItem) {
                    addToFav(selectedItem);
                }
            }
        });
    },
    error: function(xhr, status, error) {
        console.error('Error fetching data:', error);
    }
});

    
    function addToFav(item) {
        
        console.log('Adding item to favourites:', item);
        
    }

    
    $(document).on('click', '.addToFavBtn', function() {
        var shoeId = $(this).data('item-id');
        var jwt = JSON.parse(localStorage.getItem('user')).token; 
    
        console.log(shoeId)
        console.log(jwt)
    
        $.ajax({
            url: 'php/get_user_id.php',
            type: 'GET',
            // dataType: 'json',
            headers: {
                'Authorization': jwt  
            },
            success: function(data) {
                var loggedInUserId = data.user_id;
                addFavorite(loggedInUserId, shoeId);
            },
            error: function(xhr, status, error) {
                console.log(status)
                console.log(xhr)
                console.error('Error fetching user ID:', error);
            }
        });
    });
    
    
    function addFavorite(userId, shoeId) {
        var jwt = JSON.parse(localStorage.getItem('user')).token;
        
        $.ajax({
            type: 'POST',
            url: 'php/add_favorite.php',
            data: { user_id: userId, shoe_id: shoeId },
            headers: {
                'Authorization': jwt  // Set Authorization header with JWT
            },
            success: function(response) {
                console.log('Favorite added successfully.');
            },
            error: function(xhr, status, error) {
                console.error('Error adding favorite:', error);
            }
        });
    }
    function getSizes(size) {
        if (!size) {
            return 'Sizes not available';
        } else if (typeof size === 'string') {
            return size;
        } else if (Array.isArray(size) && size.length > 0) {
            return size.join(', ');
        } else {
            return 'Sizes not available';
        }
    }