<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Welcome to Product CMS</h1>
    <div class="list-group">
        <a href="<?php echo site_url('productcontroller/save'); ?>" class="list-group-item list-group-item-action">Create Product</a>
        <a href="<?php echo site_url('productcontroller/index'); ?>" class="list-group-item list-group-item-action">List Products (devre disi)</a>
    </div>
</div>
</body>
</html>