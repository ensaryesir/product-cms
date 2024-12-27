<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Product</h1>
    <?php echo form_open('product_controller/edit/'.$product['id']); ?>
    <div class="form-group">
        <label for="product_title">Title</label>
        <input type="text" class="form-control" id="product_title" name="product_title" value="<?php echo $product['product_title']; ?>">
    </div>
    <div class="form-group">
        <label for="product_description">Description</label>
        <textarea class="form-control" id="product_description" name="product_description"><?php echo $product['product_description']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>