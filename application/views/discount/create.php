<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Discount</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Create Discount</h1>
    <?php echo form_open('discount_controller/create'); ?>
        <div class="form-group">
            <label for="customer_group_id">Customer Group ID</label>
            <input type="number" class="form-control" id="customer_group_id" name="customer_group_id" required>
        </div>
        <div class="form-group">
            <label for="discount_type">Discount Type</label>
            <select class="form-control" id="discount_type" name="discount_type" required>
                <option value="percentage">Percentage</option>
                <option value="fixed">Fixed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="discount_value">Discount Value</label>
            <input type="number" step="0.01" class="form-control" id="discount_value" name="discount_value" required>
        </div>
        <div class="form-group">
            <label for="currency">Currency</label>
            <select class="form-control" id="currency" name="currency">
                <option value="TL">TL</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>