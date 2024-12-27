<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Groups</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Customer Groups</h1>
    <a href="<?php echo site_url('customer_group_controller/create'); ?>" class="btn btn-primary">Create New Group</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Group Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customer_groups as $group): ?>
                <tr>
                    <td><?php echo $group['id']; ?></td>
                    <td><?php echo $group['group_name']; ?></td>
                    <td>
                        <a href="<?php echo site_url('customer_group_controller/view/'.$group['id']); ?>" class="btn btn-info">View</a>
                        <a href="<?php echo site_url('customer_group_controller/edit/'.$group['id']); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo site_url('customer_group_controller/delete/'.$group['id']); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>