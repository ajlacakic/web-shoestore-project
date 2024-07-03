console.log('LOADING');

const searchBar = document.getElementById('searchBar');
const searchQuery = searchBar.value.trim(); 
console.log("i can print here", searchQuery)

if (!window.productCard) {
    var productCard = document.getElementById('productCard');
}


if (productCard) {
  productCard.innerHTML = ''; 
}


function checkForSearch(shoe) {
  return shoe.name.toLowerCase().includes(searchQuery);
}


fetch('database/allproducts.json')
    .then(response => response.json())
    .then(data => {
        
        data.shoes.forEach(shoe => {
            console.log(data);
            if (checkForSearch(shoe)) {
                           
              const shoeDiv = document.createElement('div');
              shoeDiv.classList.add('col-md-3', 'col-sm-6', 'mb-4');

              
              shoeDiv.innerHTML = `
                  <div class="product-grid3">
                      <div class="product-image3">
                      <a href="item.html?id=${shoe.id}">
                              <img class="pic-1" src="${shoe.images[0]}">
                              <img class="pic-2" src="${shoe.images[1]}">
                          </a>
                          <button class="btn social addToFavBtn" 
                              type="button" data-item-id="${shoe.id}">
                              <i class="fa fa-heart"></i>
                          
                          </button>
                      </div>
                      <div class="product-content">
                          <h3 class="title"><a href="#">${shoe.name}</a></h3>
                          <div class="price">
                              $${shoe.price.toFixed(2)}
                          </div>
                          <div class="sizes">
                              Sizes: ${shoe.sizes.join(', ')}
                          </div>
                      </div>
                  </div>
              `;

            
            productCard.appendChild(shoeDiv);
             
            } else {
              console.log(`Shoe with ID ${shoe.id} does not contain the name.`);
            
            }

        });
        productCard.addEventListener('click', function(event) {
            if (event.target.classList.contains('addToFavBtn')) {
                const itemId = event.target.getAttribute('data-item-id');
                const selectedItem = data.shoes.find(item => item.id == itemId);
                if (selectedItem) {
                    addToFav(selectedItem);
                }
            }
        });
    })
    
fetch('database/womensport.json')
.then(response => response.json())
.then(data => {
    
    data.shoes.forEach(shoe => {
       
        const shoeDiv = document.createElement('div');
        shoeDiv.classList.add('col-md-3', 'col-sm-6', 'mb-4');

        
        shoeDiv.innerHTML = `
            <div class="product-grid3">
                <div class="product-image3">
                    <a href="item.html?id=${shoe.id}">
                        <img class="pic-1" src="${shoe.images[0]}">
                        <img class="pic-2" src="${shoe.images[1]}">
                    </a>
                    <button class="btn social addToFavBtn" 
                            type="button" data-item-id="${shoe.id}">
                            <i class="fa fa-heart"></i>
                        
                        </button>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">${shoe.name}</a></h3>
                    <div class="price">
                        $${shoe.price.toFixed(2)}
                    </div>
                    <div class="sizes">
                        Sizes: ${shoe.sizes.join(', ')}
                    </div>
                </div>
            </div>
        `;



       
        
    });

})


.catch(error => {
    console.error('Error fetching data:', error);
});
function addToFav(item) {
    
    console.log('Adding item to favourites:', item);
   
}

