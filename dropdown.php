<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';
// Fetch all plan groups
$planGroups = $con->query("SELECT * FROM plangroup")->fetch_all(MYSQLI_ASSOC);

// Fetch all plans
$plans = $con->query("SELECT * FROM plans")->fetch_all(MYSQLI_ASSOC);

// Fetch all pricing and billing cycles
$pricing = $con->query("SELECT * FROM plan_pricing")->fetch_all(MYSQLI_ASSOC);
?>
<form action="includes/code.php?msg=addCoupon" method="post">
    <div class="row">
        <!-- Plan Group Dropdown -->
        <div class="col-6 form-group">
            <label for="planGroup" class="form-label">Plan Group</label>
            <select name="planGroup" id="planGroup" class="form-select">
                <option value="">Select Plan Group</option>
                <?php foreach ($planGroups as $group): ?>
                    <option value="<?php echo $group['pg_id']; ?>" <?php echo (isset($coupon) && $coupon['plangroup_name'] == $group['pg_id']) ? 'selected' : ''; ?>>
                        <?php echo $group['Name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Plan Name Dropdown -->
        <div class="col-6 form-group">
            <label for="planName" class="form-label">Plan Name</label>
            <select name="planName" id="planName" class="form-select">
                <option value="">Select Plan Name</option>
                <?php
                $selectedPlanGroup = isset($coupon) ? $coupon['plangroup_name'] : null;
                foreach ($plans as $plan):
                    if ($selectedPlanGroup == null || $plan['planGroup_id'] == $selectedPlanGroup): ?>
                        <option value="<?php echo $plan['p_id']; ?>" <?php echo (isset($coupon) && $coupon['plan_name'] == $plan['p_id']) ? 'selected' : ''; ?>>
                            <?php echo $plan['name']; ?>
                        </option>
                <?php endif;
                endforeach;
                ?>
            </select>
        </div>

        <!-- Billing Cycle Dropdown -->
        <div class="col-6 form-group">
            <label for="billingCycle" class="form-label">Billing Cycle</label>
            <select name="billingCycle" id="billingCycle" class="form-select">
                <option value="">Select Billing Cycle</option>
                <?php
                $selectedPlanName = isset($coupon) ? $coupon['plan_name'] : null;
                foreach ($pricing as $price):
                    if ($selectedPlanName == null || $price['plan_id'] == $selectedPlanName): ?>
                        <option value="<?php echo $price['billing_cycle']; ?>" <?php echo (isset($coupon) && $coupon['billing_cycle'] == $price['billing_cycle']) ? 'selected' : ''; ?>>
                            <?php echo $price['billing_cycle']; ?>
                        </option>
                <?php endif;
                endforeach;
                ?>
            </select>
        </div>

        <!-- Other fields -->
        <div class="col-6 form-group">
            <label for="code" class="form-label">Coupon Code</label>
            <input type="text" name="code" class="form-control" placeholder="Enter Coupon Code" value="<?php echo isset($coupon) ? $coupon['coupon_code'] : ''; ?>">
        </div>

        <div class="col-6 form-group">
            <label for="type" class="form-label">Coupon Type</label>
            <select name="type" class="form-select">
                <option value="Percentage" <?php echo (isset($coupon) && $coupon['coupon_type'] == 'Percentage') ? 'selected' : ''; ?>>Percentage</option>
                <option value="Fixed" <?php echo (isset($coupon) && $coupon['coupon_type'] == 'Fixed') ? 'selected' : ''; ?>>Fixed</option>
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="value" class="form-label">Coupon Value</label>
            <input type="text" name="value" class="form-control" placeholder="Enter Coupon Value" value="<?php echo isset($coupon) ? $coupon['coupon_value'] : ''; ?>">
        </div>

        <div class="form-group mt-2">
            <!-- Hidden input for coupon id (only visible when editing) -->
            <?php if (isset($coupon)): ?>
                <input type="hidden" name="coupon_id" value="<?php echo $coupon['id']; ?>">
            <?php endif; ?>
            <input type="submit" class="btn btn-primary" value="<?php echo isset($coupon) ? 'Update' : 'Add'; ?>">
            <input type="reset" class="btn btn-secondary">
        </div>
    </div>
</form>