
//Cart Array
var cartJson =  JSON.parse(sessionStorage.getItem('cartItems')) || [];
// Get references to the radio buttons and the input number
const codRadio = document.getElementById("flexRadioDefault1");
const ewalletRadio = document.getElementById("flexRadioDefault2");
const inputNumber = document.getElementById("inputNumber");
const ammountLabel = document.getElementById('ammountLabel');

//innitialize sub total price
var subtotalPrice = 0;

// Function to generate HTML content from JSON data
function generateHTML3(data) {
    var html = '';

    // Loop through each object in the JSON data
    for (var i = 0; i < data.length; i++) {
        var obj = data[i];

        // Generate HTML content for each object
        html += "<div class='card mb-3'>";
        html += "<div class='card-body'>";
        html += "<div class='d-flex justify-content-between'>";
        html += "<div class='d-flex flex-row align-items-center'>";
        html += "<div>";
        html += "<img ";
        html += "src='src/product_images/"+obj.image_name+"'";
        html += "class='img-fluid rounded-3' alt='Shopping item' style='width: 65px;'>";
        html += " </div>";
        html += "<div class='ms-3'>";
        html += "<h5>"+obj.menu_name+"</h5>";
        html += "</div>";
        html += "</div>";
        html += "<div class='d-flex flex-row align-items-center'>";
        html += "<div style='width: 50px;'>";

        html += "<h5 class='fw-normal mb-0'>"+obj.quantity+"</h5>";
        html += "</div>";
        html += "<div style='width: 80px;'>";
        var price = obj.quantity * obj.price;
        html += "<h5 class='mb-0'>₱"+price+"</h5>";
        html += "</div>";
        html += "<button class='btn btn-danger deleteButtons' data-product-id='"+ i +"'><i class='fas fa-times'></i></button>"
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        subtotalPrice = price + subtotalPrice;
        price = 0;
    }

    return html;
}


// Get the data container element
var dataContainer3 = document.getElementById('data-container3');
var subtotal = document.getElementById('subtotal');
var shipping = document.getElementById('shipping');
var total = document.getElementById('total');

// Generate HTML content from JSON data
var htmlContent3 = generateHTML3(cartJson);

// Set the HTML content in the data container
subtotal.innerHTML = "₱ "+ subtotalPrice;
shipping.innerHTML = "₱ "+ 38;
var totalPrice = 38 + subtotalPrice;
total.innerHTML = "₱ "+ totalPrice;
dataContainer3.innerHTML = htmlContent3;


// Function to delete a cart item
function deleteCartItem(index) {
  cartJson.splice(index, 1);
  // Update the cart items in Session Storage
  sessionStorage.setItem('cartItems', JSON.stringify(cartJson));
}

//Code execute when form is submitted
document.getElementById('myForm3').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting normally
    // Show success message
    document.getElementById("success-message").innerHTML = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Order Placed<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";

    const selectedPaymentMethod = document.querySelector('input[name="flexRadioDefault"]:checked').id;
    const amount = parseFloat(inputNumber.value);
    const change = selectedPaymentMethod === 'flexRadioDefault2' ? amount - totalPrice : 0;
    console.log("Change: ", change);

    if (totalPrice > amount) {
        alert("Entered amount must be higher than the total price");
        return;
    }

    document.getElementById("change").innerHTML = "₱" + change;

    // Clear cart items
    cartJson = [];
    // Update the cart items in Session Storage
    sessionStorage.setItem('cartItems', JSON.stringify(cartJson));

    // Redirect user to trackorder.html after 3 seconds
    setTimeout(function () {
        // Code to be executed after 5 seconds
        window.location.href = "trackorder.html";
    }, 5000); // 5 seconds
});

let deleteButtons = document.querySelectorAll(".deleteButtons");
deleteButtons.forEach((deleteButton) => {
  deleteButton.addEventListener('click', () => {
    const deleteId = deleteButton.dataset.productId;
    console.log(deleteButton.dataset);
    cartJson.splice(deleteId, 1);

    // Update the dataset index of the remaining delete buttons
    // Update the cart items in Session Storage
    sessionStorage.setItem('cartItems', JSON.stringify(cartJson));
    cartJson = JSON.parse(sessionStorage.getItem('cartItems')) || [];

   
    window.location.href = "cart.html";
  });
});



// Add change event listener to the radio buttons
codRadio.addEventListener("change", function() {
  // If COD is selected, hide the input number
  inputNumber.style.display = "none";
  ammountLabel.style.display = "none";
  inputNumber.removeAttribute("required");
  document.querySelector('.changeLabel').style.display = "none";
  document.querySelector('.changeTotal').style.display = "none";
});

ewalletRadio.addEventListener("change", function() {
  // If E-Wallet is selected, show the input number
  inputNumber.style.display = "block";
  ammountLabel.style.display = "block";
  inputNumber.setAttribute("required", "required");
  document.querySelector('.changeLabel').style.display = "block";
  document.querySelector('.changeTotal').style.display = "block";
});