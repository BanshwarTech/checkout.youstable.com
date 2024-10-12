<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';
$validCouponCode = "";
$discountPercentage = 0;
$_SESSION['select_plan_details'] = [];
$currentDate = new DateTime();


$updateDate = "";

$billingcycle = isset($_GET['billingcycle']) ? $_GET['billingcycle'] : '';
$plangroup = isset($_GET['plangroup']) ? $_GET['plangroup'] : '';
$plan = isset($_GET['plan']) ? $_GET['plan'] : '';
$currency = isset($_GET['currency']) ? $_GET['currency'] : '';

// echo $billingcycle;
if (isset($_SESSION['plan_details'])) {
    $details = $_SESSION['plan_details'];
    // print_r($details);semiannually,monthly,triannually,annually
    if ($billingcycle == "triannually") {
        $validCouponCode = "SATISHKVIDEOS";
        $discountPercentage = 40;
    } elseif ($billingcycle == "annually") {
        $validCouponCode = "SATISHKVIDEOS";
        $discountPercentage = 40;
    } elseif ($billingcycle == "semiannually") {
        $validCouponCode = "SATISHKVIDEOS";
        $discountPercentage = 40;
    } else {
        $validCouponCode = "";
        $discountPercentage = 0;
    }

    $planOptions = [];

    if ($plangroup == 'SHARED HOSTING') {
        $planOptions = [
            'monthly' =>   '1 Month',
            'annually' => '12 Months',
            'triannually' => '36 Months'
        ];
    } elseif ($plangroup == 'VPS HOSTING') {
        $planOptions = [
            'monthly' =>   '1 Month',
            'semiannually' => '6 Months',
            'annually' => '12 Months',
        ];
    } elseif ($plangroup == 'DEDICATED-INDIA') {
        $planOptions = [
            'monthly' =>   '1 Month',
        ];
    }
    if ($plangroup && $plan && $billingcycle) {
        //select data from database 
        $select = " SELECT * from plan_pricing LEFT JOIN plans ON plans.p_id=plan_pricing.plan_id LEFT JOIN plangroup ON plangroup.pg_id=plans.planGroup_id where plangroup.Name='" . $plangroup . "' and plans.name='" . $plan . "' and plan_pricing.billing_cycle='" . $billingcycle . "';";
        // echo $select;
        $result = mysqli_query($con, $select);
        if ($result && mysqli_num_rows($result) > 0) {


            while ($row = mysqli_fetch_assoc($result)) {

                $_SESSION['select_plan_details'] = $row;
            }
        } else {
            echo "No results found.";
        }
    }
} else {
}
?>

<?php
$page = 'Payment-details';
if ($_SESSION["select_plan_details"]["billing_cycle"] == $billingcycle) {
    $adjustedPrice = $_SESSION["select_plan_details"]["price"];
    switch ($billingcycle) {

        case 'triannually':
            $adjustedPrice *= 36;
            $period = "triannually";
            $currentDate->modify('+3 years');
            break;
        case 'annually':
            $adjustedPrice *= 12;
            $period = "annually";
            $currentDate->modify('+1 year');
            break;
        case 'semiannually':
            $adjustedPrice *= 6;
            $period = "semiannually";
            $currentDate->modify('+6 months');
            break;
        case 'monthly':
            $adjustedPrice *= 1;
            $period = "monthly";
            $currentDate->modify('+1 month');
            break;
        default:

            die("Invalid plan type provided.");
    }
}
$updateDate = $currentDate->format('d-m-Y');
$originalPrice = $adjustedPrice ? $adjustedPrice : 0;
$tax = $originalPrice * 0.18; // 18% tax
$gatewayCharges = $originalPrice * 0.02;
$grandTotal = $originalPrice + $tax + $gatewayCharges;
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Dynamic Meta Tags -->
    <title>Order Details</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '& l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM - T7Q6LH2');
    </script>
    <!-- End Google Tag Manager -->


    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1256442398612671');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1256442398612671&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16450759555">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-16450759555');
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <script src="country-state.js"></script>

    <style>
        .detail-head {
            padding: 2px;
            font-family: Open Sans;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 0px;

        }

        .card-header {
            font-size: 22px;
            font-weight: 600;
            padding: 8px 15px;
            font-family: "Open Sans", sans-serif;
        }

        .form-banner {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0px 2px 6px 0px #00000024;


        }

        .billing-form-banner {
            padding: 15px !important;
        }

        .input-header {

            font-size: 12px;
            font-weight: 400;
            color: #828282;
        }

        .input-value {
            border: 1px solid #B2BCCA !important;
            border-radius: 4px !important;
            font-size: 12px !important;
            padding: 10px !important;
            min-height: 44px !important;
            height: 44px !important;
            font-size: 12px;
            font-weight: 400;
            color: #828282;

        }

        .input-value:focus {
            border: 1px solid #270069 !important;
            box-shadow: none !important;
        }

        .form-floating>.input-header {
            top: -12px;
            left: 24px;
            padding: .1rem .4rem;
            height: 20px;
            background-color: #fff;
        }


        .check-terms {
            font-family: Open Sans;
            font-size: 14px;
            font-weight: 400;
            color: #4F4F4F;

        }

        .proceed-btn {
            border-radius: 0px;
            background: #270069;
            border: 1px solid #270069;
            font-weight: 500;
            border-radius: 6px;
            color: #fff;
        }

        .promo-btn {
            padding: 4px 10px;
            width: inherit;
            font-size: 18px;
            font-weight: 500;

        }

        .proceed-btn:hover {
            color: #270069;
            border: 1px solid #270069;
            background-color: #fff;
        }

        .nav-pills .nav-link {
            background-color: #fff;
            color: #000;
            font-size: 14px;
            font-weight: 500;
            padding: 14px 42px;
            border-radius: 0px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #EAF5FF;
            color: #000;
        }

        .payment-icon img {
            width: 17%;
        }

        .paypal {
            width: 3%;
        }

        .payment-opt {
            display: grid !important;
            margin-top: 0px;
        }

        .choose-upi {
            padding: 15px 40px;
            border-radius: 4px;
            border: 1px solid #B2BCCA
        }

        .choose-upi:hover {
            border-width: 0px, 0px, 0px, 0px;
            border-style: solid;
            border-color: #1660CF;
            background-color: #E8F0FB;


        }

        .protect-text {
            font-size: 12px;
            font-weight: 400;
            color: #828282;
            margin: 0px;

        }

        .plan-desc span {
            font-size: 14px;
            font-weight: 400;
            color: #000;
            margin-bottom: 5px;
        }

        .plan-det h3 {
            font-size: 22px;
            font-weight: 400;
            font-family: "Open Sans", sans-serif;
        }

        .plan-det h4 {
            font-size: 20px;
            font-family: "Open Sans", sans-serif;
        }

        small {
            font-size: 12px;
        }

        .plan-det {
            padding: 10px 20px;
        }

        .plan-det p {
            font-size: 14px;
            margin-bottom: 2px;
            font-weight: 400;
            color: blue;
        }

        .total-price h3 {
            font-size: 14px;
            margin-bottom: 0px;
        }

        .total-price {
            font-size: 28px;
            font-weight: 700;
        }

        .price-sum-detail {
            font-size: 13px;
            font-weight: 400;
            color: #4F4F4F;
        }

        .discount-amount {
            font-size: 18px;
            font-weight: 600;
            color: #4F4F4F;
        }

        .grand-total,
        .grand-total1 {
            font-size: 16px;
            font-weight: 700;
            color: #000;
        }

        .conditions {
            color: #4F4F4F;
            font-size: 12px;
            font-weight: 400;
        }

        .payment-btn {
            padding: 4px 10px;
            width: -webkit-fill-available;
            font-size: 18px;
            font-weight: 500;
        }

        .time-period {
            font-size: 14px;
            font-weight: 400;
            color: #4F4F4F;

        }

        .protect-img {
            width: 35px;
            height: 35px;
        }

        button.btn.btn-close {
            width: 1px;
            height: 12px;
        }

        .rotate {
            -moz-transition: all .5s linear;
            -webkit-transition: all .5s linear;
            transition: all .5s linear;
        }

        .rotate.down {
            -moz-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .scrolltopay-btn {
            width: -webkit-fill-available;
        }

        @media(max-width:767px) {
            .plan-det {
                padding: 10px 10px 0px;
            }

            .payment-sec {
                flex-direction: column;
            }

            .pay-opt {
                flex-direction: row !important;
            }

            .text-green {
                color: green;
            }

        }

        .text-green {
            color: green;
        }

        .check-opt {
            height: 20px;
        }

        /* .tooltip-custom {
    border: 1px solid grey;
    background-color: white;
    color: black;
}

.tooltip-inner a {
    color: blue; 
    text-decoration: underline;
}

.tooltip:hover {
    opacity: 1 !important;
} */

        .deal-timer {
            border: 1px solid #fff;
            background-color: #fff;
            font-size: 18px;
            font-weight: 700;
            border-radius: 10px;
            padding: 15px;
        }

        .limited-time {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
        }
    </style>


</head>

<body>

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7Q6LH2" height="0" width=“0”
            style="display:none;visibility:hidden"></iframe></noscript>
    <div id="alertBox" class="alert-box">
        <span id="alertMessage"></span>
    </div>
    <div class="">
        <div class="container-fluid p-3">
            <img src="assets/img/logo_youstable.svg" alt="logo" class="ms-4">
        </div>


        <div class="container">
            <nav class="top-nav p-4 rounded">
                <!-- <button class="btn btn-close  text-white pulse-shrink-on-hover" onclick="closeNav()"></button> -->
                <div class="d-flex justify-content-between   top-nav-items">
                    <div class="d-flex gap-2 grab-heading" style="align-items: baseline;">
                        <div>
                            <p class="youstable-offer m-0 text-white offer-off " style="text-align: center;padding-left: 8px;"><strong>Customize Your Server to Fit Your Needs</strong></p>
                        </div>
                        <div>
                            <a href="" class="button-deal"><button>Grab deal</button></a>
                        </div>

                    </div>
                    <div class="timer d-flex align-items-center">
                        <p class="limited-time me-3 mb-0">Limited Time Deal! 😋</p>
                        <div class="deal-timer">
                            <span id="hours">00</span> :
                            <span id="minutes">00</span> :
                            <span id="seconds">00</span>

                        </div>
                    </div>

                    <!-- <div class="d-flex gap-5 align-items-center position-relative">
                        <div>
                            <a href="/contact-us" class="text-white phone-1">Contact Us</a>
                        </div>

                        <div>
                            <a href="https://www.youstable.com/blog/" class="text-white phone-1">Blog</a>
                        </div>
                    </div> -->


                </div>
            </nav>
        </div>

    </div>

    <div id="alertBox" class="alert-box">
        <span id="alertMessage"></span>
    </div>

    <section>
        <div class="container mt-5">

            <div class="row mt-2">
                <div class="col-12 col-md-8">
                    <div class="mb-4 form-banner p-4">

                        <h3 class="detail-head">Billing Address</h3>

                        <div class="row g-3">
                            <input type="hidden" name="planName" id="planName" value="<?= $_SESSION["select_plan_details"]['name'] ?>">
                            <input type="hidden" name="planPrice" id="planPrice" value="<?= $_SESSION["select_plan_details"]['price'] ?>">
                            <input type="hidden" name="planId" id="planId" value="<?php echo $_SESSION["select_plan_details"]['p_id']; ?>">

                            <div class="row g-4">
                                <div class="col-md-6 form-floating">
                                    <label for="fname" class="form-label input-header">First Name</label>
                                    <input type="text" class="form-control input-value" name="fname" id="fname" placeholder="Enter first name" required autofocus>
                                    <span id="error-fname" class="text-danger " style="font-size:12px;"></span>
                                </div>

                                <div class="col-md-6 form-floating">
                                    <label for="lname" class="form-label input-header">Last Name</label>
                                    <input type="text" class="form-control input-value" name="lname" id="lname" placeholder="Enter last name" required>
                                    <span id="error-lname" class="text-danger " style="font-size:12px;"></span>
                                </div>

                                <div class="col-md-6 form-floating">
                                    <label for="email" class="form-label input-header">Email</label>
                                    <input type="email" class="form-control input-value" name="email" id="email" placeholder="Enter email" required>
                                    <span id="error-email" class="text-danger " style="font-size:12px;"></span>
                                </div>
                                <div class="col-md-6 form-floating">
                                    <label for="phone" class="form-label input-header">Phone Number</label>
                                    <input type="text" class="form-control input-value" name="phone" id="phone" minlength="10" maxlength="10" placeholder="Enter Phone Number" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    <span id="error-phone" class="text-danger " style="font-size:12px;"></span>
                                </div>
                                <div class="col-md-6 ">
                                    <div class=" form-floating">
                                        <label for="postcode" class="form-label input-header">Use Exisiting Domain</label>
                                        <input type="text" class="form-control input-value" name="domain" id="domain" placeholder="Enter Domain" required>
                                        <span id="error-domain" class="text-danger " style="font-size:12px;"></span>
                                        <p></p>
                                    </div>

                                </div>
                                <!-- <div class="col-md-6">
    <div class="input-group form-floating">
        <label for="postcode" class="form-label input-header">Use Existing Domain</label>
        <input type="text" class="form-control input-value" name="domain" id="domain" placeholder="Enter Domain" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
        <span class="input-group-text" id="basic-addon2" data-bs-toggle="tooltip" title='<a href="https://youstable.in/domain-registration" target="_blank">Click here for more info</a>'><i class="fa-light fa-circle-info"></i></span>
        <span id="error-domain" class="text-danger " style="font-size:12px;"></span>
    </div>
</div> -->



                                <div class="col-md-6 form-floating">
                                    <label for="gst" class="form-label input-header">GST</label>
                                    <input type="text" class="form-control input-value" name="gst" id="gst" placeholder="Enter GST" required>
                                </div>

                                <div class="col-md-12 form-floating">
                                    <label for="address" class="form-label input-header">Address</label>
                                    <textarea class="form-control input-value" name="address" id="address" placeholder="Enter Address"></textarea>
                                    <span id="error-address" class="text-danger " style="font-size:12px;"></span>
                                </div>

                                <div class="col-md-6 form-floating">
                                    <label for="country" class="form-label input-header">Country</label>
                                    <select class="form-select input-value" name="country" id="country" required>
                                        <option value="">Select Country</option>
                                    </select>
                                    <span id="error-country" class="text-danger " style="font-size:12px;"></span>
                                </div>

                                <div class="col-md-6 form-floating">
                                    <label for="state" class="form-label input-header">State/Provience</label>
                                    <select class="form-select input-value" name="state" id="state" required>
                                        <option value="">Select State</option>
                                    </select>
                                    <span id="error-state" class="text-danger " style="font-size:12px;"></span>
                                </div>


                                <div class="col-md-6 form-floating">
                                    <label for="city" class="form-label input-header">City</label>
                                    <input type="text" class="form-control input-value" name="city" id="city" placeholder="Enter City" required>
                                    <span id="error-city" class="text-danger " style="font-size:12px;"></span>
                                </div>

                                <div class="col-md-6 form-floating">
                                    <label for="postcode" class="form-label input-header">Postcode</label>
                                    <input type="text" class="form-control input-value" name="postcode" id="postcode" minlength="6" maxlength="6" placeholder="Enter Postcode" required>
                                    <span id="error-postcode" class="text-danger " style="font-size:12px;"></span>
                                </div>



                            </div>

                        </div>
                    </div>

                    <div class="mb-4 form-banner p-4">

                        <h3 class="detail-head mb-3">Payment Method</h3>

                        <div class="payment-opt">
                            <div class="form-check choose-upi mb-2">
                                <input class="form-check-input" type="radio" name="paymentType" id="razerpay"
                                    value="RazerPay" checked>
                                <label class="form-check-label d-block" for="paytmcheck">
                                    <div class="payment-icon d-flex justify-content-sm-between">
                                        <p class="mb-0 ms-2">Pay with Razorpay/UPI/Card</p><img
                                            src="https://upload.wikimedia.org/wikipedia/commons/8/89/Razorpay_logo.svg" alt="paytm" class="float-end">
                                    </div>

                                </label>
                            </div>
                            <div class="form-check choose-upi mb-3">
                                <input class="form-check-input" type="radio" name="paymentType" id="paypal"
                                    value="PayPal">
                                <label class="form-check-label d-block" for="phonePayCheck">
                                    <p class="mb-0 ms-2">Pay With Paypal <img src="assets/img/PayPal.png" alt="payPal"
                                            class="float-end paypal" width="8%"></p>

                                </label>
                            </div>

                            <div class="d-flex align-items-center"><img src="assets/img/icons/protect.png" alt="protect-icon" class="protect-img">
                                <p class="protect-text ms-2">We protect your payment information using encryption to provide bank-level security.</p>
                            </div>

                        </div>


                    </div>
                </div>

                <div class="col-12 col-md-4">



                    <div class="mb-3 form-banner billing-form-banner p-3">
                        <div class="top-header mb-2 d-flex justify-content-between align-items-center">
                            <h3 class="detail-head">Select Period</h3>

                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#timePeriod" aria-expanded="true" aria-controls="timePeriod">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                        </div>
                        <div class="show" id="timePeriod">
                            <div class="row d-flex align-items-center" id="">
                                <div class="col-md-12 form-floating mb-2">
                                    <label for="state" class="form-label input-header">Period</label>
                                    <select name="period" id="period" class="form-select input-value">
                                        <option value="">Select Plan Period</option>
                                        <?php foreach ($planOptions as $key => $value) {
                                            $query = 'billingcycle=' . htmlspecialchars($key) . '&plangroup=' . htmlspecialchars($plangroup) . '&plan=' . htmlspecialchars($plan) . '&currency=' . htmlspecialchars($details['currency']);
                                            $isSelected = (isset($_GET['billingcycle']) && $_GET['billingcycle'] == $key) ? ' selected' : ''; ?>

                                            <option value="<?= $query; ?>" <?= $isSelected ?>><?= htmlspecialchars($value) ?></option>

                                        <?php } ?>
                                    </select>
                                    <script>
                                        document.getElementById('period').addEventListener('change', function() {
                                            var selectedValue = this.value;
                                            if (selectedValue) {
                                                // Redirect the user to the new URL
                                                window.location.href = "?" + selectedValue;
                                            }
                                        });
                                    </script>
                                    <span id="" class="text-danger"></span>
                                </div>
                                <p class="time-period mb-0">Renews at <span class="time-period-price fw-none"><?php echo $details["currency"] ?><?php echo number_format($grandTotal, 2); ?></span> on <?php echo $updateDate; ?>.
                                    30 Days Refund!</p>
                            </div>

                            <!-- <div id="result" class="mt-3"></div> -->
                        </div>
                    </div>

                    <div class="mb-3 form-banner billing-form-banner p-3" id="payment-section">
                        <div class="top-header mb-1 mb-1 d-flex justify-content-between align-items-center">
                            <h3 class="detail-head">Billing Summary</h3>
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#billing" aria-expanded="true" aria-controls="billing">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                        </div>

                        <div class="show" id="billing">
                            <div class="price-summry">
                                <div class="d-flex  justify-content-between mb-2 ">
                                    <span class="price-sum-detail">Sub Amount</span>
                                    <span class="original-price"><?php echo $details['currency']; ?><?php echo number_format($originalPrice, 2); ?></span>
                                </div>
                                <div class="dis d-flex justify-content-between mb-2">
                                    <span class="price-sum-detail">Discount (0%)</span> <!-- This will be updated -->
                                    <span class="discount-amount" style="font-size:16px;">0</span>
                                </div>

                            </div>
                            <!-- <div class="d-flex justify-content-between mb-2">
                                <span class="price-sum-detail">After Discount </span>
                                <span class="after-discount">0</span>
                            </div> -->
                            <div class="d-flex justify-content-between mb-2">
                                <span class="price-sum-detail">Tax(18%)</span>
                                <span class=""><?= $details["currency"]; ?><?= $tax; ?></span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="price-sum-detail">Gateway Charges(2%)</span>
                                <span class=""><?= $details["currency"]; ?><?= $gatewayCharges; ?></span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="grand-total1">Grand Total</span>
                                <span class="grand-total"><?php echo $details['currency'] ?><?php echo number_format($grandTotal, 2); ?></span>
                            </div>

                            <!-- <div class="col-12 form-floating mb-4">
                                <label class="form-label input-header">Order Comment</label>
                                <input type="text" class="form-control input-value" id="" name="" placeholder="Type Here...">
                                <span id="error-message" class="text-danger"></span>
                                <span id="success-message" class="text-success fw-bold"></span>
                            </div> -->

                            <div class="row g-2 py-3 d-flex align-items-center" id="couponForm">
                                <div class="col-8 form-floating">
                                    <label class="form-label input-header">Enter Coupon</label>
                                    <input type="text" class="form-control input-value" id="couponCode" name="couponCode" placeholder="Coupon Code">

                                </div>
                                <div class="col-4 p-2 d-flex align-items-end justify-content-center">
                                    <a href="#payment-section" class="scrolltopay-btn"><button type="button" id="applyCouponBtn" class="btn btn-primary proceed-btn p-2 promo-btn applyCouponBtn" onclick="checkCouponCode()">Apply</button></a>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input check-opt" type="checkbox" id="checkbox" checked required>
                                <label class="form-check-label conditions mb-2" for="terms">
                                    Please check to acknowledge our
                                    <a href="https://www.youstable.com/terms-condition"> Privacy & Terms Policy</a>
                                </label><br>
                                <span id="terms" class="text-danger" style="font-size:12px;"></span>
                            </div>

                            <div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-primary proceed-btn payment-btn"
                                    id="PayNow">Pay <?php echo $details['currency']; ?><span class="price1"><?php echo number_format($grandTotal, 2); ?></span></button><br>
                                <input type="hidden" name="payAmount" id="payAmount" class="payAmount"
                                    value="<?php echo $grandTotal; ?>">
                            </div>
                            <div class="text-center">
                                <img src="/assets/img/icons/norton-Icon.png" alt="scurity">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 form-banner billing-form-banner p-3">
                        <div class="top-header d-flex justify-content-between align-items-center">
                            <h3 class="detail-head">Order Review</h3>
                            <!-- Arrow button for toggling -->
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#orderDetails" aria-expanded="false" aria-controls="orderDetails">
                                <i class="bi bi-chevron-down"></i>
                            </button>
                        </div>

                        <!-- Collapsible section -->
                        <div class="collapse" id="orderDetails">
                            <div class="plan-det ">
                                <h4>
                                    <span class="fw-bold"><?= $_SESSION["select_plan_details"]['name'] ?></span>
                                    <small>Plan</small>
                                </h4>
                                <!-- Display plan features directly in the toggle section -->
                                <ul class="list-unstyled">
                                    <?= $_SESSION["select_plan_details"]['details'] ?>
                                </ul>

                            </div>
                        </div>
                    </div>



                    <!-- <div class="mb-3 form-banner billing-form-banner p-3">
                        <div class="top-header d-flex justify-content-between align-items-center">
                            <h3 class="detail-head">Discount Codes</h3>
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#promoCode" aria-expanded="false" aria-controls="promoCode">
                                <i class="bi bi-chevron-down rotate"></i>
                            </button>
                        </div>
                        <div class="collapse" id="promoCode">
                            <div class="row g-3 p-3 d-flex align-items-center" id="couponForm">
                                <div class="col-12 form-floating">
                                    <label class="form-label input-header">Enter Coupon</label>
                                    <input type="text" class="form-control input-value" id="couponCode" name="couponCode" placeholder="Coupon Code">
                                
                                </div>
                                <div class="col-12 d-flex align-items-end justify-content-center">
                                    <a href="#payment-section" class="scrolltopay-btn"><button type="button" id="applyCouponBtn" class="btn btn-primary proceed-btn promo-btn applyCouponBtn" onclick="checkCouponCode()">Apply Coupon</button></a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>

            </div>

        </div>

        </div>
    </section>
    <!-- Footer -->
    <footer class=" footer" style="padding: 20px 0px 0px 0px;">
        <div class="text-center pb-3">
            <p class="footer-end-texts text-center text-white mb-1">© 2015 - 2024 QLOUDIN Technologies Pvt Ltd. All Rights
                Reserved</p>
            <p class="affiliated text-white m-0"> <a href="accept-usage-policy.php" class="affiliated text-white m-0">Acceptable
                    Usage Policy</a> | <a href="affiliate-terms.php" class="affiliated text-white m-0">Affiliate Terms and
                    Conditions</a> </p>
        </div>
    </footer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Set the countdown time to 15 minutes (in seconds)
        let countdownTime = 15 * 60;

        // Function to update the timer
        function updateTimer() {
            let hours = Math.floor(countdownTime / 3600);
            let minutes = Math.floor((countdownTime % 3600) / 60);
            let seconds = countdownTime % 60;

            // Update the HTML with the new time values
            document.getElementById('hours').innerText = hours.toString().padStart(2, '0');
            document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');

            // Decrease countdown time by 1 second
            countdownTime--;

            // Stop the timer when it reaches zero
            if (countdownTime < 0) {
                clearInterval(timerInterval);
            }
        }

        // Start the countdown and update every second
        let timerInterval = setInterval(updateTimer, 1000);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    html: true,
                    customClass: 'tooltip-custom', // Apply custom tooltip class
                    trigger: 'hover' // Enable hover trigger
                })
            });
        });
    </script>

    <script>
        $(".rotate").click(function() {
            $(this).toggleClass("down");
        })
    </script>

    <!-- validate fields  -->
    <script>
        $(document).ready(function() {
            $('#PayNow').click(function(e) {
                e.preventDefault();

                // Clear existing error messages
                clearErrors();

                // Validate form fields
                let isValid = true;

                const fname = $('#fname').val().trim();
                const lname = $('#lname').val().trim();
                const email = $('#email').val().trim();
                const phone = $('#phone').val().trim();
                const domain = $('#domain').val().trim();
                const country = $('#country').val();
                const state = $('#state').val();
                const city = $('#city').val().trim();
                const postcode = $('#postcode').val().trim();
                const address = $('#address').val().trim();
                const terms = $('#terms').is(':checked');

                if (fname === '') {
                    showError('error-fname', 'First name is required');
                    isValid = false;
                }
                if (lname === '') {
                    showError('error-lname', 'Last name is required');
                    isValid = false;
                }
                if (email === '' || !validateEmail(email)) {
                    showError('error-email', 'Valid email is required');
                    isValid = false;
                }
                if (phone.length !== 10) {
                    showError('error-phone', 'Phone number must be 10 digits.');
                    isValid = false;
                }
                if (domain === '') {
                    showError('error-domain', 'Domain name is required');
                    isValid = false;
                } else if (domain.includes(' ')) {
                    showError('error-domain', 'Domain name cannot contain spaces');
                    isValid = false;
                }
                if (country === '') {
                    showError('error-country', 'Country is required');
                    isValid = false;
                }
                if (state === '') {
                    showError('error-state', 'State is required');
                    isValid = false;
                }
                if (city === '') {
                    showError('error-city', 'City is required');
                    isValid = false;
                }
                const postcodeRegex = /^[0-9]{6}$/;
                if (!postcodeRegex.test(postcode)) {
                    showError('error-postcode', 'Postcode must be a 6-digit number');
                    isValid = false;
                }
                if (address === '') {
                    showError('error-address', 'Address is required');
                    isValid = false;
                }
                if (!terms) {
                    showError('error-terms', 'You must accept the terms and conditions');
                    isValid = false;
                }

                if (isValid) {
                    alert('Form is valid and ready for submission.');
                }

                addInputListeners();
            });
        });

        function showError(elementId, message) {
            $('#' + elementId).text(message);
        }

        function clearErrors() {
            const errorIds = [
                'error-fname', 'error-lname', 'error-email', 'error-phone',
                'error-domain', 'error-country', 'error-state', 'error-city',
                'error-postcode', 'error-address', 'error-terms'
            ];
            errorIds.forEach(id => $('#' + id).text(''));
        }

        function validateEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        function addInputListeners() {
            const fields = [
                'fname', 'lname', 'email', 'phone', 'domain',
                'country', 'state', 'city', 'postcode', 'address'
            ];

            fields.forEach(field => {
                $('#' + field).on('input', function() {
                    clearError('error-' + field);
                });
            });

            $('#terms').change(function() {
                clearError('error-terms');
            });
        }

        function clearError(elementId) {
            $('#' + elementId).text('');
        }
    </script>
    <!-- add cooupon -->
    <?php
    $_SESSION["code"] = $validCouponCode ? $validCouponCode : "";
    ?>
    <script>
        function checkCouponCode() {
            const couponInput = document.getElementById("couponCode").value.toUpperCase();
            const validCouponCode = <?= '"' . $_SESSION["code"] . '"' ?>;
            const originalPrice = parseFloat(<?php echo $originalPrice ? $originalPrice : '0'; ?>);
            const currency = `<?php echo $details['currency']; ?>`;

            // alert("validCouponCode : ".validCouponCode);
            if (isNaN(originalPrice) || originalPrice < 0) {
                console.error("Invalid original price");
                return;
            }

            const discountPercentage = <?php echo isset($discountPercentage) ? $discountPercentage : '0'; ?>; // Fixed discount percentage
            const discountAmount = originalPrice * (discountPercentage / 100);
            const afterDiscountPrice = originalPrice - discountAmount;

            // Calculate 18% tax and 2% gateway charges on the discounted total
            const tax = originalPrice * 0.18;
            const gatewayCharges = originalPrice * 0.02;

            // Grand total including tax and gateway charges
            const grandTotal = afterDiscountPrice + tax + gatewayCharges;

            const discountElement = document.querySelector(".discount-amount");
            const originalPriceElement = document.querySelector(".original-price");
            const applyCouponBtn = document.getElementById("applyCouponBtn");

            if (couponInput === validCouponCode) {
                // Display discount amount
                discountElement.textContent = `${currency}${discountAmount.toFixed(2)}`;
                discountElement.classList.add('text-green');
                discountElement.classList.remove('text-red');

                // Format grand total and display the amounts
                const formattedGrandTotal = grandTotal.toFixed(2);
                document.querySelector(".price1").textContent = `${grandTotal.toFixed(2)}`;
                document.querySelector(".payAmount").textContent = `${currency}${grandTotal.toFixed(2)}`;
                document.querySelector(".grand-total").textContent = `${currency}${grandTotal.toFixed(2)}`;
                document.querySelector(".time-period-price").textContent = `${currency}${formattedGrandTotal}`;
                document.getElementById("payAmount").value = grandTotal.toFixed(2);
                // document.querySelector(".after-discount").textContent = `${currency}${afterDiscountPrice.toFixed(2)}`;

                // Display original price with a strikethrough
                originalPriceElement.innerHTML = `<del>${currency}${originalPrice.toFixed(2)}</del>`;
                document.querySelector('.dis span:first-child').textContent = `Discount(${discountPercentage}%)`;

                // Show success message and update button state
                toastr.success("Your coupon has been applied.", "Success", {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 5000
                });

                // Change button color to red after applying the coupon
                applyCouponBtn.textContent = "Remove";
                applyCouponBtn.classList.remove('btn-primary');
                applyCouponBtn.classList.add('btn-danger');
                applyCouponBtn.setAttribute('onclick', 'removeCouponCode()');

            } else {
                // Reset discount and display error message if coupon is invalid
                discountElement.classList.remove('text-green');
                discountElement.classList.add('text-red');
                discountElement.textContent = "0";

                toastr.error("Invalid Coupon Code.", "Error", {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 5000
                });
            }
        }




        function removeCouponCode() {
            const applyCouponBtn = document.getElementById("applyCouponBtn");
            const discountElement = document.querySelector(".discount-amount");
            const originalPriceElement = document.querySelector(".original-price");
            const currency = `<?php echo $details['currency']; ?>`;

            // Reset the discount element
            discountElement.textContent = "0";
            discountElement.classList.remove('text-green');
            discountElement.classList.add('text-red');

            const originalPrice = parseFloat(<?php echo isset($details["price"]) ? $details["price"] : '0'; ?>);

            if (isNaN(originalPrice) || originalPrice < 0) {
                console.error("Invalid original price");
                return;
            }

            // Recalculate tax and gateway charges based on the original price
            const tax = originalPrice * 0.18;
            const gatewayCharges = originalPrice * 0.02;

            // Grand total including tax and gateway charges (without discount)
            const grandTotal = originalPrice + tax + gatewayCharges;

            const formattedOriginalPrice = originalPrice.toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            const formattedGrandTotal = grandTotal.toFixed(2);

            // Reset the price display
            document.querySelector(".price1").textContent = `${formattedGrandTotal}`;
            document.querySelector(".payAmount").textContent = `${currency}${formattedGrandTotal}`;
            document.querySelector(".grand-total").textContent = `${currency}${formattedGrandTotal}`;
            document.getElementById("payAmount").value = grandTotal.toFixed(2);
            document.querySelector(".time-period-price").textContent = `${currency}${formattedGrandTotal}`;
            // Reset original price with no strikethrough
            originalPriceElement.innerHTML = `${currency}${formattedOriginalPrice}`;

            // Reset discount label
            document.querySelector('.dis span:first-child').textContent = `Discount(0%)`;

            // Show a message indicating the coupon was removed
            toastr.info("Coupon has been removed.", "Info", {
                closeButton: true,
                progressBar: true,
                timeOut: 5000
            });

            // Change button back to "Apply Coupon"
            applyCouponBtn.textContent = "Apply";
            applyCouponBtn.classList.remove('btn-danger');
            applyCouponBtn.classList.add('btn-primary');
            applyCouponBtn.setAttribute('onclick', 'checkCouponCode()');

            // Clear the coupon code input field
            document.getElementById("couponCode").value = "";
        }
    </script>
    <style>
        .btn-green {
            background-color: red;
        }
    </style>
    <script>
        function closeNav() {
            var topNav = document.querySelector('.top-nav');
            if (topNav.style.display !== 'none') {
                topNav.style.display = 'none';
                localStorage.setItem('topNavVisibility', 'hidden');
            }
        }
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#PayNow').click(function(e) {
                e.preventDefault();
                var originalPriceText = $('.original-price').text();


                var currency = originalPriceText.match(/[^\d.,]/g).join('').trim();
                var price = parseFloat(originalPriceText.replace(/[^0-9.-]+/g, ''));


                var paymentOption = '';

                let fname = $('#fname').val();
                let lname = $('#lname').val();
                let email = $('#email').val();
                let phone = $('#phone').val();
                let address = $('#address').val();
                let gst = $('#gst').val();
                let domain = $('#domain').val();
                let city = $('#city').val();
                let state = $('#state').val();
                let postcode = $('#postcode').val();
                let country = $('#country').val();
                let planName = $('#planName').val();
                let planPrice = $('#planPrice').val();
                let planId = $('#planId').val();
                let payAmount = $('#payAmount').val();
                let paymentType = $('input[name="paymentType"]:checked').val();
                var paymentOption = "Card";
                var request_url = "submit-payment.php";


                if (!fname || !lname || !email || !phone || !address || !city || !state || !postcode || !country || !planName || !planPrice || !payAmount) {
                    // alert("Please fill out all required fields.");
                    return;
                }

                if (!paymentType) {
                    alert("Please select a valid payment option.");
                    return;
                }


                var formData = {
                    fname: fname,
                    lname: lname,
                    email: email,
                    phone: phone,
                    address: address,
                    gst: gst,
                    domain: domain,
                    city: city,
                    state: state,
                    postcode: postcode,
                    country: country,
                    paymentOption: paymentOption,
                    payAmount: payAmount,
                    planName: planName,
                    planPrice: planPrice,
                    action: 'payOrder'
                };

                if (paymentType === "RazerPay") {

                    $.ajax({
                        type: 'POST',
                        url: request_url,
                        data: formData,
                        dataType: 'json',
                        encode: true,
                    }).done(function(data) {
                        if (data.res == 'success') {
                            var orderID = data.order_number;
                            var options = {
                                "key": data.razorpay_key,
                                "amount": data.userData.amount,
                                "currency": "INR",
                                "name": "YouStable.com",
                                "description": data.userData.description,
                                "image": "https://www.youstable.com/assets/img/logo_youstable.svg",
                                "order_id": data.userData.rpay_order_id,
                                "handler": function(response) {
                                    window.location.replace("https://checkout.youstable.com/payment-success.php?oid=" + orderID + "&rp_payment_id=" + response.razorpay_payment_id + "&rp_signature=" + response.razorpay_signature + "&rp_order_id=" + response.razorpay_order_id);
                                },
                                "modal": {
                                    "ondismiss": function() {
                                        toastr.warning('Your Payment has been cancelled...', 'Warning', {
                                            closeButton: true,
                                            progressBar: true,
                                            timeOut: 5000
                                        });
                                    }
                                },
                                "prefill": {
                                    "name": fname + ' ' + lname,
                                    "email": email,
                                    "contact": phone
                                },
                                "notes": {
                                    "address": "GoogieHostUpi"
                                },
                                "config": {
                                    "display": {
                                        "blocks": {
                                            "banks": {
                                                "name": 'Pay using ' + paymentOption,
                                                "instruments": [{
                                                    "method": paymentOption
                                                }, ],
                                            },
                                        },
                                        "sequence": ['block.banks'],
                                        "preferences": {
                                            "show_default_blocks": true,
                                        },
                                    },
                                },
                                "theme": {
                                    "color": "#3399cc"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.on('payment.failed', function(response) {
                                if (!paymentRetryAttempted) {
                                    alert("Payment failed. Please retry.");
                                    paymentRetryAttempted = true;
                                    rzp1.open();
                                } else {
                                    window.location.href = "https://checkout.youstable.com/payment-failed.php?oid=" + orderID;
                                }
                            });

                            rzp1.open();
                            e.preventDefault();
                        }
                    });
                } else if (paymentType === "PayPal") {
                    console.log("PayPal");

                } else {
                    alert("Please select a valid payment option.");
                }
            });
        });
    </script>

</body>

</html>