<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>View Product</h1>
    <p><strong>ID:</strong> <?php echo $product['id']; ?></p>
    <p><strong>Title:</strong> <?php echo $product['product_title']; ?></p>
    <p><strong>Description:</strong> <?php echo $product['product_description']; ?></p>
    <a href="<?php echo site_url('product_controller'); ?>" class="btn btn-primary">Back to List</a>
</div>
</body>
</html>