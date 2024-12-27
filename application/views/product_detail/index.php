<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Detail List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Product Detail List</h1>
    <a href="<?php echo site_url('product_detail_controller/create'); ?>" class="btn btn-primary">Add Product Detail</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Product Code</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($product_details as $detail): ?>
            <tr>
                <td><?php echo $detail['id']; ?></td>
                <td><?php echo $detail['product_id']; ?></td>
                <td><?php echo $detail['product_code']; ?></td>
                <td>
                    <a href="<?php echo site_url('product_detail_controller/view/'.$detail['id']); ?>" class="btn btn-info">View</a>
                    <a href="<?php echo site_url('product_detail_controller/edit/'.$detail['id']); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo site_url('product_detail_controller/delete/'.$detail['id']); ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>