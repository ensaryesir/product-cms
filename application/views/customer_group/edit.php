<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer Group</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Customer Group</h1>
    <?php echo form_open('customer_group_controller/edit/'.$customer_group['id']); ?>
        <div class="form-group">
            <label for="group_name">Group Name</label>
            <input type="text" class="form-control" id="group_name" name="group_name" value="<?php echo $customer_group['group_name']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>