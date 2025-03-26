$(document).ready(function () {
    let loggedInUser = $("#logged-in-user").data("user");
    if (!loggedInUser) {
        window.location.href = "/";
        return;
    }

    loadCart();

    function loadCart() {
        $.ajax({
            url: "/cart/items",
            type: "GET",
            success: function (data) {
                let cartItems = data.cart;
                renderCart(cartItems);
                calculateTotal(cartItems);
            },
            error: function () {
                console.error("Error fetching cart items.");
            }
        });
    }

    function renderCart(cartItems) {
        $("#itemParent").empty();

        if (cartItems.length === 0) {
            $("#itemParent").html("<h1>The Cart is empty!</h1>");
            return;
        }

        cartItems.forEach(item => {
            let cartItem = $(`
                <section class="cartItem">
                    <img src="${item.image}" alt="${item.name}">
                    <section><p>${item.name}</p></section>
                    <div>
                        <h2>Quantity</h2>
                        <button class="decrease" data-id="${item.id}">-</button>
                        <input type="number" value="${item.quantity}" min="1" class="quantity" data-id="${item.id}">
                        <button class="increase" data-id="${item.id}">+</button>
                    </div>
                    <div>
                        <h2>Price</h2>
                        <span class="price" data-id="${item.id}">$${item.price}</span>
                    </div>
                    <button class="remove" data-id="${item.id}">REMOVE</button>
                </section>
            `);
            $("#itemParent").append(cartItem);
        });
    }

    function calculateTotal(cartItems) {
        let total = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        $("#total-text").text(`Total: $${total}`);
    }

    $(document).on("click", ".increase", function () {
        updateQuantity($(this).data("id"), 1);
    });

    $(document).on("click", ".decrease", function () {
        updateQuantity($(this).data("id"), -1);
    });

    $(document).on("change", ".quantity", function () {
        let newQuantity = parseInt($(this).val());
        if (isNaN(newQuantity) || newQuantity < 1) newQuantity = 1;
        updateQuantity($(this).data("id"), newQuantity, true);
    });

    function updateQuantity(id, amount, setExact = false) {
        $.ajax({
            url: "/cart/update",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: id,
                amount: amount,
                setExact: setExact
            },
            success: function (data) {
                renderCart(data.cart);
                calculateTotal(data.cart);
            },
            error: function () {
                console.error("Error updating cart.");
            }
        });
    }

    $(document).on("click", ".remove", function () {
        let id = $(this).data("id");
        $.ajax({
            url: "/cart/remove",
            type: "POST",
            data: { _token: $('meta[name="csrf-token"]').attr("content"), id: id },
            success: function (data) {
                renderCart(data.cart);
                calculateTotal(data.cart);
            },
            error: function () {
                console.error("Error removing item.");
            }
        });
    });

    $("#pay-button").click(function () {
        let paymentData = {
            cardNumber: $("#card-number").val().trim(),
            cardHolder: $("#card-holder").val().trim(),
            expiryDate: $("#expiry-date").val().trim(),
            cvv: $("#cvv").val().trim(),
            _token: $('meta[name="csrf-token"]').attr("content")
        };

        $.ajax({
            url: "/cart/pay",
            type: "POST",
            data: paymentData,
            success: function (response) {
                if (response.success) {
                    $("#paymentText").text("Payment successful!").addClass("succeed");
                    setTimeout(() => location.reload(), 1000);
                } else {
                    $("#paymentText").text(response.message).addClass("fail");
                    setTimeout(() => $("#paymentText").removeClass("fail"), 2000);
                }
            },
            error: function () {
                $("#paymentText").text("Payment failed. Try again.").addClass("fail");
                setTimeout(() => $("#paymentText").removeClass("fail"), 2000);
            }
        });
    });
});
