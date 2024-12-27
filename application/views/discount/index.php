<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Discounts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Discounts</h1>
    <a href="<?php echo site_url('discount_controller/create'); ?>" class="btn btn-primary">Create New Discount</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Group ID</th>
                <th>Discount Type</th>
                <th>Discount Value</th>
                <th>Currency</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($discounts as $discount): ?>
                <tr>
                    <td><?php echo $discount['id']; ?></td>
                    <td><?php echo $discount['customer_group_id']; ?></td>
                    <td><?php echo $discount['discount_type']; ?></td>
                    <td><?php echo $discount['discount_value']; ?></td>
                    <td><?php echo $discount['currency']; ?></td>
                    <td><?php echo $discount['start_date']; ?></td>
                    <td><?php echo $discount['end_date']; ?></td>
                    <td>
                        <a href="<?php echo site_url('discount_controller/view/'.$discount['id']); ?>" class="btn btn-info">View</a>
                        <a href="<?php echo site_url('discount_controller/edit/'.$discount['id']); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo site_url('discount_controller/delete/'.$discount['id']); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>