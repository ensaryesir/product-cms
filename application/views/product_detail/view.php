<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>View Product Detail</h1>
    <p><strong>ID:</strong> <?php echo $product_detail['id']; ?></p>
    <p><strong>Product ID:</strong> <?php echo $product_detail['product_id']; ?></p>
    <p><strong>Product Code:</strong> <?php echo $product_detail['product_code']; ?></p>
    <a href="<?php echo site_url('product_detail_controller'); ?>" class="btn btn-primary">Back to List</a>
</div>
</body>
</html>