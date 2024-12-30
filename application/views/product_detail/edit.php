<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Edit Product Detail</h1>
    <?php echo form_open('product_detail_controller/edit/'.$product_detail['id']); ?>
    <div class="form-group">
        <label for="product_id">Product ID</label>
        <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $product_detail['product_id']; ?>" required>
    </div>
    <div class="form-group">
        <label for="product_code">Product Code</label>
        <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $product_detail['product_code']; ?>" required>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $product_detail['quantity']; ?>" required>
    </div>
    <div class="form-group">
        <label for="extra_discount">Extra Discount</label>
        <input type="number" step="0.01" class="form-control" id="extra_discount" name="extra_discount" value="<?php echo $product_detail['extra_discount']; ?>">
    </div>
    <div class="form-group">
        <label for="tax_rate">Tax Rate</label>
        <input type="number" step="0.01" class="form-control" id="tax_rate" name="tax_rate" value="<?php echo $product_detail['tax_rate']; ?>">
    </div>
    <div class="form-group">
        <label for="sale_price">Sale Price</label>
        <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price" value="<?php echo $product_detail['sale_price']; ?>" required>
    </div>
    <div class="form-group">
        <label for="second_sale_price">Second Sale Price</label>
        <input type="number" step="0.01" class="form-control" id="second_sale_price" name="second_sale_price" value="<?php echo $product_detail['second_sale_price']; ?>">
    </div>
    <div class="form-group">
        <label for="deduct_from_stock">Deduct From Stock</label>
        <input type="checkbox" id="deduct_from_stock" name="deduct_from_stock" value="1" <?php echo $product_detail['deduct_from_stock'] ? 'checked' : ''; ?>>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="checkbox" id="status" name="status" value="1" <?php echo $product_detail['status'] ? 'checked' : ''; ?>>
    </div>
    <div class="form-group">
        <label for="feature_section">Feature Section</label>
        <input type="checkbox" id="feature_section" name="feature_section" value="1" <?php echo $product_detail['feature_section'] ? 'checked' : ''; ?>>
    </div>
    <div class="form-group">
        <label for="new_product_validity">New Product Validity</label>
        <input type="date" class="form-control" id="new_product_validity" name="new_product_validity" value="<?php echo $product_detail['new_product_validity']; ?>">
    </div>
    <div class="form-group">
        <label for="sort_order">Sort Order</label>
        <input type="number" class="form-control" id="sort_order" name="sort_order" value="<?php echo $product_detail['sort_order']; ?>">
    </div>
    <div class="form-group">
        <label for="show_on_homepage">Show on Homepage</label>
        <input type="number" class="form-control" id="show_on_homepage" name="show_on_homepage" value="<?php echo $product_detail['show_on_homepage']; ?>">
    </div>
    <div class="form-group">
        <label for="is_new">Is New</label>
        <input type="checkbox" id="is_new" name="is_new" value="1" <?php echo $product_detail['is_new'] ? 'checked' : ''; ?>>
    </div>
    <div class="form-group">
        <label for="installment">Installment</label>
        <input type="checkbox" id="installment" name="installment" value="1" <?php echo $product_detail['installment'] ? 'checked' : ''; ?>>
    </div>
    <div class="form-group">
        <label for="warranty_period">Warranty Period</label>
        <input type="number" class="form-control" id="warranty_period" name="warranty_period" value="<?php echo $product_detail['warranty_period']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <?php echo form_close(); ?>
</div>
</body>
</html>