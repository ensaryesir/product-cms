<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Welcome to Product CMS</h1>
    <div class="list-group">
        <a href="<?php echo site_url('customer_group_controller'); ?>" class="list-group-item list-group-item-action">Manage Customer Groups</a>
        <a href="<?php echo site_url('discount_controller'); ?>" class="list-group-item list-group-item-action">Manage Discounts</a>
        <a href="<?php echo site_url('product_controller'); ?>" class="list-group-item list-group-item-action">Manage Products</a>
        <a href="<?php echo site_url('product_detail_controller'); ?>" class="list-group-item list-group-item-action">Manage Product Details</a>
        <a href="<?php echo site_url('product_image_controller'); ?>" class="list-group-item list-group-item-action">Manage Product Images</a>
    </div>
</div>
</body>
</html>