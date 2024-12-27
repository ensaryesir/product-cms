<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Discount</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Discount</h1>
    <?php echo form_open('discount_controller/edit/'.$discount['id']); ?>
        <div class="form-group">
            <label for="customer_group_id">Customer Group ID</label>
            <input type="number" class="form-control" id="customer_group_id" name="customer_group_id" value="<?php echo $discount['customer_group_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="discount_type">Discount Type</label>
            <select class="form-control" id="discount_type" name="discount_type" required>
                <option value="percentage" <?php echo $discount['discount_type'] == 'percentage' ? 'selected' : ''; ?>>Percentage</option>
                <option value="fixed" <?php echo $discount['discount_type'] == 'fixed' ? 'selected' : ''; ?>>Fixed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="discount_value">Discount Value</label>
            <input type="number" step="0.01" class="form-control" id="discount_value" name="discount_value" value="<?php echo $discount['discount_value']; ?>" required>
        </div>
        <div class="form-group">
            <label for="currency">Currency</label>
            <select class="form-control" id="currency" name="currency">
                <option value="TL" <?php echo $discount['currency'] == 'TL' ? 'selected' : ''; ?>>TL</option>
                <option value="USD" <?php echo $discount['currency'] == 'USD' ? 'selected' : ''; ?>>USD</option>
                <option value="EUR" <?php echo $discount['currency'] == 'EUR' ? 'selected' : ''; ?>>EUR</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $discount['start_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $discount['end_date']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>