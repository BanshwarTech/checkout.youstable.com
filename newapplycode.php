<style>
    .coupon-container {
        display: inline-block;
        position: relative;
    }

    #apply-coupon {
        padding: 5px;
        cursor: pointer;
    }

    #coupon-input {
        margin-top: 5px;
        border: 1px solid black;
        padding: 5px;
        width: 200px;
    }

    .hidden {
        display: none;
    }

    .visible {
        display: inline-block;
    }

    .discount-applied {
        color: green;
    }

    .error-message {
        color: red;
        margin-top: 5px;
    }
</style>
<?php
$price = 4999;
$currency = "₹";
?>

<div class="coupon-container">
    <span id="apply-coupon" onclick="showInput()">Apply coupon code</span>
    <input type="text" id="coupon-input" placeholder="Enter coupon code" class="hidden" oninput="checkCouponCode()" />

    <div id="error-message" class="error-message hidden">Invalid coupon code.</div>
</div>

<div>
    <span class="original-price">Original Price: <?= $currency ?><?= $price ?> </span><br>
    <span class="discount-amount hidden">Discount: $20</span><br>
    <span class="grand-total">Grand Total: <?= $currency ?><?= $price ?></span>
</div>

<script>
    const fixedCouponCode = "SATISHKVIDEOS"; // Predefined coupon code
    const discountAmount = 40; // Discount amount

    function showInput() {
        var couponText = document.getElementById('apply-coupon');
        var couponInput = document.getElementById('coupon-input');
        var applyCouponBtn = document.getElementById('applyCouponBtn');

        // Hide the text and show the input field and button
        couponText.classList.add('hidden');
        couponInput.classList.add('visible');
        applyCouponBtn.classList.add('visible');
        couponInput.focus();
    }

    function checkCouponCode() {
        const couponInput = document.getElementById("coupon-input").value.trim();
        var discountSpan = document.querySelector('.discount-amount');
        var grandTotalSpan = document.querySelector('.grand-total');
        var errorMessage = document.getElementById('error-message');
        var originalPrice = <?= $price ?>; // Original price of the product

        if (couponInput === fixedCouponCode) {
            // If the coupon code matches, apply the discount
            var newTotal = originalPrice - discountAmount;
            discountSpan.textContent = `Discount: ${discountAmount}%`;
            grandTotalSpan.textContent = `Grand Total: ${newTotal}`;

            discountSpan.classList.add('visible');
            grandTotalSpan.classList.add('discount-applied');
            errorMessage.classList.add('hidden'); // Hide error message if valid
        } else if (couponInput.length > 0) {
            // Show error message if the coupon code is invalid and there's input
            errorMessage.classList.remove('hidden');
            discountSpan.classList.remove('visible');
            grandTotalSpan.textContent = `Grand Total: $${originalPrice}`;
            grandTotalSpan.classList.remove('discount-applied');
        } else {
            // Hide the error message if the input is empty
            errorMessage.classList.add('hidden');
            discountSpan.classList.remove('visible');
            grandTotalSpan.textContent = `Grand Total: $${originalPrice}`;
            grandTotalSpan.classList.remove('discount-applied');
        }
    }
</script>