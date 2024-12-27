<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Discount</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>View Discount</h1>
    <p><strong>ID:</strong> <?php echo $discount['id']; ?></p>
    <p><strong>Customer Group ID:</strong> <?php echo $discount['customer_group_id']; ?></p>
    <p><strong>Discount Type:</strong> <?php echo $discount['discount_type']; ?></p>
    <p><strong>Discount Value:</strong> <?php echo $discount['discount_value']; ?></p>
    <p><strong>Currency:</strong> <?php echo $discount['currency']; ?></p>
    <p><strong>Start Date:</strong> <?php echo $discount['start_date']; ?></p>
    <p><strong>End Date:</strong> <?php echo $discount['end_date']; ?></p>
    <a href="<?php echo site_url('discount_controller'); ?>" class="btn btn-secondary">Back</a>
</div>
</body>
</html>