<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Customer Group</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>View Customer Group</h1>
    <p><strong>ID:</strong> <?php echo $customer_group['id']; ?></p>
    <p><strong>Group Name:</strong> <?php echo $customer_group['group_name']; ?></p>
    <a href="<?php echo site_url('customer_group_controller'); ?>" class="btn btn-secondary">Back</a>
</div>
</body>
</html>