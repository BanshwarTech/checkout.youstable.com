 // print_r($planDetail);
 if ($planDetail["billing_cycle"] == $billingcycle) {

 $adjustedPrice = $planDetail["price"];
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
 echo $updateDate;
 $originalPrice = isset($planDetail["price"]) ? $planDetail["price"] : 0;
 $tax = $originalPrice * 0.18; // 18% tax
 $gatewayCharges = $originalPrice * 0.02;
 $grandTotal = $originalPrice + $tax + $gatewayCharges;