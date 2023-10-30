

// JSON data
var menusJson = [
    { "menu_id": 1, "menu_name": "Lomi", "price": 55, "description": "Aa's Lomi consists of variety of toppings such as Rebusado, Atay, Kikiam, Pupor and two piece of itlog pugo", "image_name": "menu1.jpg" },

    { "menu_id": 2, "menu_name": "Bihon", "price": 75, "description": "Bihon consists of noodles, sliced pork, vegies, fish balls and Kikiam", "image_name": "menu2.jpg" },

    { "menu_id": 3, "menu_name": "Pancit Canton", "price": 75, "description": "Canton Bihon consist of fish balls, and kikiam, and here we used rice noodles instead of the rehular noodles", "image_name": "menu3.jpg" },

    { "menu_id": 4, "menu_name": "Canton Bihon", "price": 50, "description": "The same with Canton Bihon, we also used rice noodles here with the toppings of some vegetables, Kikiam, and fish balls", "image_name": "menu4.jpg" },

    { "menu_id": 5, "menu_name": "Guisado", "price": 60, "description": "The same with Canton Bihon, we also used rice noodles here with the toppings of some vegetables, Kikiam, and fish balls", "image_name": "menu5.jpg" },

    { "menu_id": 6, "menu_name": "Pancit Bilao (Large)", "price": 750, "description": "What makes our Pancit Bilao large special, is that it is full of toppings, which inludes, 10 half eggs, 2 packs of Kikiam and Fishballs, crushed chicharon, fried lechon, atay, and Onions ", "image_name": "menu6.jpg" },

    { "menu_id": 7, "menu_name": "Lechon Lomi", "price": 115, "description": "Lechon Lomi is a another version of our Lomi but the toppings includes Fried Lechon, Itlog Pugo, and Chicharon", "image_name": "menu7.jpg" },

    { "menu_id": 8, "menu_name": "Lomi Jumbo", "price": 85, "description":  " Our Lomi Jumbo includes added toppings such as 3 itlog pugo, and fried Lechon", "image_name": "menu8.jpg" },

    { "menu_id": 9, "menu_name": "Lomi Regular", "price": 55, "description": "Lomi regular, includes the regualr toppings such as 2 itlog pugo and chicharon",  "image_name": "menu9.jpg" },

    { "menu_id": 10, "menu_name": "Lomi Double (spicy)", "price": 60, "description": "What makes our Lomi double (spicy) special out of other Lomi is that it includes, Chicharin and Lechon as the toppings and some chilli", "image_name": "menu10.jpg" },

    { "menu_id": 11, "menu_name": "Lomi Special", "price": 65, "description":  "Our Lomi Special includes the topping of chicharon, atay, lechon and itlog pugo", "image_name": "menu11.jpg" },
    
    { "menu_id": 12, "menu_name": "Lomi Double special", "price": 75, "description": "Lomi Double special is served in a double sized bowl, that includes the toppings of chiharon, 3 eggs, kikiam and fish balls", "image_name": "menu12.jpg" },
    
    { "menu_id": 13, "menu_name": "Pancit bilao medium", "price": 550, "description": " Pancit bilao medium includes the same toppings as the large one the only difference is the size of the bilao", "image_name": "menu13.jpg" },
    
    { "menu_id": 14, "menu_name": "Pancit Miki Bihon", "price": 70, "description": "Our Miki Bihon includes the topping of some vegetables, kikiams, and fishballs", "image_name": "menu14.jpg" },
    
    { "menu_id": 15, "menu_name": "Volcanic Lomi", "price": 90, "description": "Volcanic Lomi is the upgraded version of out Lomi Spicy, which is a more chilli one", "image_name": "menu15.jpg" },
];

// Function to generate HTML content from JSON data
function generateHTML(data) {
    var html = '';

    // Loop through each object in the JSON data
    for (var i = 0; i < data.length; i++) {
        var obj = data[i];

        // Add ".00" to the price
        var priceWithDecimal = obj.price.toFixed(2);

        // Generate HTML content for each object
        html += "<div class='col-lg-3 col-md-3 col-sm-3 d-flex'>";
        html += "<div class='card w-100 my-2 shadow-2-strong'>";
        html += "<a href=''menu.html'><img src='src/product_images/" + obj.image_name + "' class='card-img-top' height='300' width='300'/></a>";
        html += "<div class='card-body d-flex flex-column'>";
        html += "<div class='d-flex flex-row'>";
        html += "<h4 class='mb-1 me-1'><a href='' class='text-dark'";
        html += "style='text-decoration: none;'>" + obj.menu_name + "</a></h4>";
        html += "</div>";
        html += "<div class='d-flex flex-column mt-1'>";
        html += "<h5 class='mb-1 me-1 text-danger'>₱" + priceWithDecimal + "</h5>";
        html += "</div>";
        html += "<p class='card-text' style='text-align:justify;'>" + obj.description + "</p>";
        html += "<div class='card-footer d-flex gap-1 align-items-center justify-content-end pt-3 px-0 pb-0 mt-auto'>";
        html += "<input type='number' class='form-control' required min='1' value='0' name='quantityInput' id='quantityInput" + obj.menu_id + "'>";
        html += "<button class='btn btn-primary addToCartButton1' data-image='" + obj.image_name + "' data-id='" + obj.menu_id + "' data-name='" + obj.menu_name + "' data-price='" + priceWithDecimal + "' class='btn btn-primary' id='button1'><i class='fas fa-cart-plus'></i></button>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
    }

    return html;
}


// Get the data container element
var dataContainer = document.getElementById('data-container');

// Generate HTML content from JSON data
var htmlContent = generateHTML(menusJson);

// Set the HTML content in the data container
dataContainer.innerHTML = htmlContent;



// Function to add an item to the cart
function addToCart1(productId, productName, productPrice, productImage) {
    // Retrieve the cart items from Session Storage
    var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
    // Fetch the quantity input field
    var quantityInput = document.getElementById('quantityInput' + productId);

    // Get the value entered by the user
    var productQuantity = parseInt(quantityInput.value);


    // Check if the item is already in the cart
    var existingItem = cartItems.find(function(item) {
      return item.menu_id === productId;
    });
  
    if (existingItem) {
      // Item already exists in the cart, increase the quantity
      //existingItem.quantity++;
      existingItem.quantity += productQuantity;
    } else {
      // Item is not in the cart, add it as a new item
      var newItem = {
        menu_id: productId,
        menu_name: productName,
        price: productPrice,
        //quantity: 1,
        quantity: productQuantity,
        image_name : productImage
      };
      cartItems.push(newItem);
    }
  
    // Update the cart items in Session Storage
    sessionStorage.setItem('cartItems', JSON.stringify(cartItems));

}

//Code Execute when add to cart button is clicked
var addToCartButtons = document.getElementsByClassName('addToCartButton1');
Array.from(addToCartButtons).forEach(function(button) {
  button.addEventListener('click', function() {
    //get data from html attribute
    var productId =  parseFloat(button.getAttribute('data-id'));
    var productName = button.getAttribute('data-name');
    var productPrice = parseFloat(button.getAttribute('data-price'));
    var productImage = button.getAttribute('data-image');

    
    // Add the product to the cart
    addToCart1(productId, productName, productPrice,productImage);
    //Show success message
    document.getElementById('main-page-message1').innerHTML =  "<div class='alert alert-success alert-dismissible fade show' role='alert'>Successfully Added to Cart<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
  });
});



  

  
