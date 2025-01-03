<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List All Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>All Data List</h1>

    <h2>Products</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td>
                    <a href="<?php echo site_url('productcontroller/edit/'.$product['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?php echo site_url('productcontroller/delete/'.$product['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Discounts</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Group</th>
                <th>Priority</th>
                <th>Discount Type</th>
                <th>Discount Value</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($discounts as $discount): ?>
            <tr>
                <td><?php echo $discount['id']; ?></td>
                <td><?php echo $discount['customer_group']; ?></td>
                <td><?php echo $discount['priority']; ?></td>
                <td><?php echo $discount['discount_type']; ?></td>
                <td><?php echo $discount['discount_value']; ?></td>
                <td><?php echo $discount['start_date']; ?></td>
                <td><?php echo $discount['end_date']; ?></td>
                <td>
                    <a href="<?php echo site_url('discountcontroller/edit/'.$discount['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?php echo site_url('discountcontroller/delete/'.$discount['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Product Details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Code</th>
                <th>Quantity</th>
                <th>Tax Rate</th>
                <th>Sale Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product_details as $detail): ?>
            <tr>
                <td><?php echo $detail['id']; ?></td>
                <td><?php echo $detail['product_code']; ?></td>
                <td><?php echo $detail['quantity']; ?></td>
                <td><?php echo $detail['tax_rate']; ?></td>
                <td><?php echo $detail['sale_price']; ?></td>
                <td>
                    <a href="<?php echo site_url('productdetailcontroller/edit/'.$detail['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?php echo site_url('productdetailcontroller/delete/'.$detail['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Product Images</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product_images as $image): ?>
            <tr>
                <td><?php echo $image['id']; ?></td>
                <td><img src="<?php echo base_url('uploads/'.$image['file_name']); ?>" alt="Product Image" style="width: 100px; height: 100px;"></td>
                <td>
                    <a href="<?php echo site_url('productimagecontroller/edit/'.$image['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?php echo site_url('productimagecontroller/delete/'.$image['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>