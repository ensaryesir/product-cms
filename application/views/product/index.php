<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Product List</h1>
    <a href="<?php echo site_url('product_controller/create'); ?>" class="btn btn-primary">Add Product</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['product_title']; ?></td>
                <td>
                    <a href="<?php echo site_url('product_controller/view/'.$product['id']); ?>" class="btn btn-info">View</a>
                    <a href="<?php echo site_url('product_controller/edit/'.$product['id']); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo site_url('product_controller/delete/'.$product['id']); ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>