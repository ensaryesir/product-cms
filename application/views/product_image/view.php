<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product Image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>View Product Image</h1>
    <p><strong>ID:</strong> <?php echo $product_image['id']; ?></p>
    <p><strong>Product ID:</strong> <?php echo $product_image['product_id']; ?></p>
    <p><strong>Image Type:</strong> <?php echo $product_image['image_type']; ?></p>
    <a href="<?php echo site_url('product_image_controller'); ?>" class="btn btn-primary">Back to List</a>
</div>
</body>
</html>