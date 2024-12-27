<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Create Product Detail</h1>
    <?php echo form_open('product_detail_controller/create'); ?>
    <div class="form-group">
        <label for="product_id">Product ID</label>
        <input type="text" class="form-control" id="product_id" name="product_id">
    </div>
    <div class="form-group">
        <label for="product_code">Product Code</label>
        <input type="text" class="form-control" id="product_code" name="product_code">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>