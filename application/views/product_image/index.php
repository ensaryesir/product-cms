<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Image List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Product Image List</h1>
    <a href="<?php echo site_url('product_image_controller/create'); ?>" class="btn btn-primary">Add Product Image</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Image Type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($product_images as $image): ?>
            <tr>
                <td><?php echo $image['id']; ?></td>
                <td><?php echo $image['product_id']; ?></td>
                <td><?php echo $image['image_type']; ?></td>
                <td>
                    <a href="<?php echo site_url('product_image_controller/view/'.$image['id']); ?>" class="btn btn-info">View</a>
                    <a href="<?php echo site_url('product_image_controller/edit/'.$image['id']); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo site_url('product_image_controller/delete/'.$image['id']); ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>