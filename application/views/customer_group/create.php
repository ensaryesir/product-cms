<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Customer Group</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Create Customer Group</h1>
    <?php echo form_open('customer_group_controller/create'); ?>
        <div class="form-group">
            <label for="group_name">Group Name</label>
            <input type="text" class="form-control" id="group_name" name="group_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>