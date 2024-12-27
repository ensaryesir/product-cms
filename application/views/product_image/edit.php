<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product Image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Product Image</h1>
    <?php echo form_open_multipart('product_image_controller/edit/'.$product_image['id']); ?>
    <div class="form-group">
        <label for="product_id">Product ID</label>
        <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $product_image['product_id']; ?>">
    </div>
    <div class="form-group">
        <label for="image_type">Image Type</label>
        <input type="text" class="form-control" id="image_type" name="image_type" value="<?php echo $product_image['image_type']; ?>">
    </div>
    <div class="form-group">
        <label for="image_data">Image</label>
        <input type="file" class="form-control" id="image_data" name="image_data">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>