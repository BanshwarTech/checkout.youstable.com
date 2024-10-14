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
</script>