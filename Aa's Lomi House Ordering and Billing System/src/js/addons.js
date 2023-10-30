// Add Ons array that store JSON data
var addOnsJson = [
    { "menu_id" : 16,"menu_name": "Chicharon", "price": 10, "description" : "",  "image_name" : "add_ons1.jpg"},
    { "menu_id" : 17,"menu_name": "Shanghai", "price": 20,  "description" : "", "image_name" : "add_ons2.jpg"},
    { "menu_id" : 18,"menu_name": "Coca Cola", "price": 15,  "description" : "", "image_name" : "add_ons3.jpg"},
    { "menu_id" : 19,"menu_name": "Siomai", "price": 30,  "description" : "", "image_name" : "add_ons4.jpg"},
];
  
// Function to generate HTML content from JSON data
function generateHTML(data2) {
    var html = '';

    // Loop through each object in the JSON data
    for (var i = 0; i < data2.length; i++) {
        var obj2 = data2[i];

        // Add ".00" to the price
        var priceWithDecimal = obj2.price.toFixed(2);

        // Generate HTML content for each object
        html += "<div class='col-lg-3 col-md-3 col-sm-3 d-flex'>";
        html += "<div class='card w-100 my-2 shadow-2-strong'>";
        html += "<a href='menu.html'><img src='src/product_images/" + obj2.image_name + "' class='card-img-top' height='300' width='300'/></a>";
        html += "<div class='card-body d-flex flex-column'>";
        html += "<div class='d-flex flex-row'>";
        html += "<h4 class='mb-1 me-1'><a href='' class='text-dark'";
        html += "style='text-decoration: none;'>" + obj2.menu_name + "</a></h4>";
        html += "</div>";
        html += "<div class='d-flex flex-column mt-1'>";
        html += "<h5 class='mb-1 me-1 text-danger'>₱" + priceWithDecimal + "</h5>";
        html += "</div>";
        html += "<p class='card-text' style='text-align:justify;'>" + obj2.description + "</p>";
        html += "<div class='card-footer d-flex gap-1 align-items-center justify-content-start pt-3 px-0 pb-0 mt-auto'>";

        html += "<input class='form-control' type='hidden' value='" + obj2.menu_id + "' name='menu_id'/>";
        html += "<input class='form-control' type='hidden' value='" + obj2.menu_name + "' name='add_ons_name'/>";
        html += "<input class='form-control' type='hidden' value='" + obj2.price + "' name='price'/>";
        html += "<input class='form-control' type='hidden' value='" + obj2.image_name + "' name='image_name'/>";
        html += "<input type='number' class='form-control' min='1' value='0' name='quantityInput' required id='quantityInput" + obj2.menu_id + "'>";
        html += "<button class='btn btn-primary addToCartButton2' data-image='" + obj2.image_name + "' data-id='" + obj2.menu_id + "' data-name='" + obj2.menu_name + "' data-price='" + priceWithDecimal + "' class='btn btn-primary' id='button1'><i class='fas fa-cart-plus'></i></button>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
    }

    return html;
}

  
  // Get the data container element
  var dataContainer2 = document.getElementById('data-container2');
  
  // Generate HTML content from JSON data
  var htmlContent2 = generateHTML(addOnsJson);
  
  // Set the HTML content in the data container
  dataContainer2.innerHTML = htmlContent2;
  
// Function to add an item to the cart
function addToCart2(productId, productName, productPrice, productImage) {
  // Retrieve the cart items from Session Storage
  var cartItems = JSON.parse(sessionStorage.getItem('cartItems')) || [];
  // Fetch the quantity input field
  var quantityInput = document.getElementById('quantityInput' + productId);

  // Get the value entered by the user
  var productQuantity = parseInt(quantityInput.value);

  // Check if the item is already in the cart
  var existingItem = cartItems.find(function (item) {
    return item.menu_id === productId;
  });

  if (existingItem) {
    // Item already exists in the cart, increase the quantity
    existingItem.quantity += productQuantity;
  } else {
    // Item is not in the cart, add it as a new item
    var newItem = {
      menu_id: productId,
      menu_name: productName,
      price: productPrice,
      quantity: productQuantity,
      image_name: productImage
    };
    cartItems.push(newItem);
  }

  // Update the cart items in Session Storage
  sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
}


//function execute when add to cart button is clicked
var addToCartButtons = document.getElementsByClassName('addToCartButton2');
Array.from(addToCartButtons).forEach(function(button) {
button.addEventListener('click', function() {
  //fetch data from html attribute
  var productId =  parseFloat(button.getAttribute('data-id'));
  var productName = button.getAttribute('data-name');
  var productPrice = parseFloat(button.getAttribute('data-price'));
  var productImage = button.getAttribute('data-image');

  // Add the product to the cart
  addToCart2(productId, productName, productPrice,productImage);
  //show success message if the add to cart function is successful
  document.getElementById('main-page-message2').innerHTML =  "<div class='alert alert-success alert-dismissible fade show' role='alert'>Successfully Added to Cart<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
});
});


