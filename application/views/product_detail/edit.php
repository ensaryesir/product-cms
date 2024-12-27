<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Product Detail</h1>
    <?php echo form_open('product_detail_controller/edit/'.$product_detail['id']); ?>
    <div class="form-group">
        <label for="product_id">Product ID</label>
        <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $product_detail['product_id']; ?>">
    </div>
    <div class="form-group">
        <label for="product_code">Product Code</label>
        <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $product_detail['product_code']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>